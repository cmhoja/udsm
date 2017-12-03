<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_menu_item".
 *
 * @property integer $Id
 * @property integer $MenuID
 * @property string $ItemNameEn
 * @property string $ItemNameSw
 * @property string $LinkUrl
 * @property integer $ParentItemID
 * @property integer $ListOrder
 * @property integer $SectionID
 *
 * @property TblMenu $menu
 * @property TblSections $section
 */
class MenuItem extends \yii\db\ActiveRecord {

    public $UnitID;

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    ////target Url Types
    const URL_TYPE_INTERNAL = 0;
    const URL_TYPE_EXTERNAL = 1;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_menu_item';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['MenuID', 'ItemNameEn', 'LinkUrl', 'ListOrder', 'UrlType'], 'required'],
            [['MenuID', 'ParentItemID', 'ListOrder', 'SectionID', 'UrlType'], 'integer'],
            [['menuClasses', 'UnitID'], 'safe'],
            [['ItemNameEn', 'ItemNameSw'], 'string', 'max' => 250],
            [['LinkUrl'], 'string', 'max' => 250],
            [['menu'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['MenuID' => 'Id']],
            [['SectionID'], 'exist', 'skipOnError' => true, 'targetClass' => Sections::className(), 'targetAttribute' => ['SectionID' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'Id' => 'ID',
            'MenuID' => 'Menu ID',
            'menuClasses' => 'Menu Classes',
            'ItemNameEn' => 'Item Name En',
            'ItemNameSw' => 'Item Name Sw',
            'LinkUrl' => 'Link Url (Target Url)',
            'UrlType' => 'Target Url Type',
            'ParentItemID' => 'Parent Item ID',
            'ListOrder' => 'List Order',
            'SectionID' => 'Section ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenu() {
        return $this->hasOne(Menu::className(), ['Id' => 'MenuID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSection() {
        return $this->hasOne(Sections::className(), ['Id' => 'SectionID']);
    }

    static function recurseMenu1($parent_menu) {
        $ret = '<ul id="menu_tree">';
        if ($parent_menu) {
            foreach ($parent_menu as $key => $menu) {
                $ret .= '<li class="parent"><p>' . $menu->ItemNameEn . '=' . $menu->Id . '</p></a>';
                $submenus = self::find()->where(array('ParentItemID' => $menu->Id))->all();
//submenu level1
                if ($submenus) {
                    $ret .= '<ul class="submenu">';
                    foreach ($submenus as $submenu) {
                        $ret .= '<li><p>' . $submenu->ItemNameEn . '</p></a>';
/////submenu level2
                        $submenus2 = self::find()->where(array('ParentItemID' => $submenu->Id))->all();

                        if ($submenus2) {
                            $ret .= '<ul class="submenu">';
                            foreach ($submenus2 as $submenu2) {
                                $ret .= '<li><p>' . $submenu2->ItemNameEn . '</p></a>';
                            }
                            $ret .= '</ul>';
                        }
//end dubmenu level2
                    }
                    $ret .= '</ul>';
                }
//end submenu level1
                $ret .= '</li>';
            }
        }
        return $ret . '</ul>';
    }

    static function recurseMenu($parent_menu) {
        $ret = '<ul id="menu_tree">';
        if ($parent_menu) {
            foreach ($parent_menu as $key => $menu) {
                $ret .= '<li style="border-bottom:1px solid gray"><p><a href="' . self::getUrl($menu->Id) . '">' . $menu->ItemNameEn . ' / ' . $menu->ItemNameSw . '</a> ';
                $ret .= '<span>' . yii\helpers\Html::a('Delete', ['delete-item', 'id' => $menu->Id], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?')]) . ' ';
                $ret .= yii\helpers\Html::a('Edit', ['edit-item', 'id' => $menu->Id], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to Edit this item?')]) . '</span></p>';

                $submenus = self::find()->where(array('ParentItemID' => $menu->Id))->orderBy('ListOrder ASC, ItemNameEn ASC')->all();
//submenu level1
                if ($submenus) {
                    $ret .= self::recurseMenu($submenus);
                }
//end submenu level1
                $ret .= '</li>';
            }
        }
        return $ret . '</ul>';
    }

    static function getUrl($Id) {
        $menu = self::find()->where(array('Id' => $Id))->one();
        $basePath = \yii\helpers\Url::home();
        if ($menu) {
            switch ($menu->LinkUrl) {
                case '<front>':
                    return $basePath;
                    break;
                case '<front/>':
                    return $basePath;
                    break;

                case '':
                    return $basePath;

                    break;

                default:
                    return $basePath . '/' . $menu->LinkUrl;
                    break;
            }
        }
        return NULL;
    }

    static function getLinkUrlByItemId($Id) {
        $menu = self::find()->where(array('Id' => $Id))->one();
        if ($menu) {
            return $menu->LinkUrl;
        }
        return NULL;
    }

    static function generateUrl($LinkUrl) {
        $basePath = \yii\helpers\Url::home();
        if ($LinkUrl) {
            switch ($LinkUrl) {
                case '<front>':
                    return $basePath;
                    break;
                case '<front/>':
                    return $basePath;
                    break;
                case '':
                    return $basePath;

                    break;

                default:
                    return $basePath . $LinkUrl;
                    break;
            }
        }
        return NULL;
    }

    static function getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID($MenuType, $MenuPlacementAreaRegion, $UnitID = NULL, $ShowOnPage = 0) {
        $condition = array();
        $filter = NULL;
        $condition['tbl_menu.Status'] = Menu::STATUS_PUBLISHED;
        $condition['tbl_menu_item.Status'] = self::STATUS_ENABLED;
        if ($ShowOnPage == 0) {
            $condition['tbl_menu.ShowOnPage'] = 0;
        }
        if ($UnitID) {
            $condition['UnitID'] = $UnitID;
        } else {
            $condition['UnitID'] = NULL;
        }
        $condition['MenuType'] = $MenuType;
        $condition['MenuPlacementAreaRegion'] = $MenuPlacementAreaRegion;

        return self::find()
                        ->innerJoin('tbl_menu', 'tbl_menu_item.MenuID=tbl_menu.Id')
                        ->select('MenuID,menuClasses,ItemNameEn,ItemNameSw,LinkUrl,ParentItemID,ListOrder')
                        ->where($condition)
                        ->andFilterWhere(['like', 'ShowOnPage', $ShowOnPage])
                        ->orderBy('MenuID ASC,ParentItemID ASC,ListOrder ASC')
                        ->all();
    }

    static function getActiveParentMenuItemsByMenuTypeRegionAndTemplateByUnitID($MenuType, $MenuPlacementAreaRegion, $UnitID = NULL, $ShowOnPage = 0) {
        $condition = array();
        $condition['tbl_menu.Status'] = Menu::STATUS_PUBLISHED;
        $condition['tbl_menu_item.Status'] = self::STATUS_ENABLED;
        if ($ShowOnPage != 0) {
            $condition['tbl_menu.ShowOnPage'] = $ShowOnPage;
        } else {
            $condition['tbl_menu.ShowOnPage'] = 0;
        }
        if ($UnitID) {
            $condition['UnitID'] = $UnitID;
        } else {
            $condition['UnitID'] = NULL;
        }
        $condition['tbl_menu.MenuType'] = $MenuType;
        $condition['ParentItemID'] = 0;
        $condition['tbl_menu.MenuPlacementAreaRegion'] = $MenuPlacementAreaRegion;
        return self::find()
                        ->innerJoin('tbl_menu', 'tbl_menu_item.MenuID=tbl_menu.Id')
                        ->select('tbl_menu_item.Id AS Id, MenuID,menuClasses,ItemNameEn,ItemNameSw,LinkUrl,ParentItemID,ListOrder')
                        ->where($condition)
                        ->orderBy('MenuID ASC,ParentItemID ASC,ListOrder ASC')
                        ->all();
    }

    static function getActiveParentMenuItemsByMenuId($MenuID) {
        $condition = array('ParentItemID' => 0, 'MenuID' => $MenuID);
        return self::find()
                        ->select('Id, MenuID,menuClasses,ItemNameEn,ItemNameSw,LinkUrl,ParentItemID,ListOrder')
                        ->where($condition)
                        ->orderBy('ParentItemID ASC,ListOrder ASC')
                        ->all();
    }

    static function getSubmenusByMenuItemId($Id) {

        if ($Id) {
            $submenus = self::find()->where(array('ParentItemID' => $Id, 'Status' => self::STATUS_ENABLED))->orderBy('ListOrder ASC')->all();
            if ($submenus) {
                return $submenus;
            }
            return NULL;
        }
    }

    static function getSubmenusByMenuId($Id) {

        if ($Id) {
            return self::find()->where(array('MenuID' => $Id, 'Status' => self::STATUS_ENABLED))->orderBy('ListOrder ASC')->all();
        }
        return NULL;
    }

    static function getActiveMainMenuParentSectionsByUnitID($UnitID) {
        $condition = array();
        $UnitID = htmlspecialchars($UnitID);
        $condition['UnitID'] = NULL;
        if (!empty($UnitID) && $UnitID > 0) {
            $condition['UnitID'] = $UnitID;
        }
        $condition['tbl_menu.Status'] = Menu::STATUS_PUBLISHED;
        $condition['tbl_menu_item.Status'] = self::STATUS_ENABLED;
        //$condition['tbl_menu.ShowOnPage'] = 0;
        $condition['tbl_menu.MenuType'] = Menu::MENU_TYPE_MAIN_MENU;
        $condition['ParentItemID'] = 0;
        //$condition['tbl_menu.MenuPlacementAreaRegion'] = \app\components\SiteRegions::MAIN_TEMPLATE_HEADER_MAIN_MENU;
        return self::find()
                        ->innerJoin('tbl_menu', 'tbl_menu_item.MenuID=tbl_menu.Id')
                        ->select('UnitID,tbl_menu_item.Id AS Id, MenuID,menuClasses,ItemNameEn,ItemNameSw,LinkUrl,ParentItemID,ListOrder')
                        ->where($condition)
                        ->orderBy('MenuID ASC,ParentItemID ASC,ListOrder ASC')
                        ->all();
    }

    static function getActiveMainMenuSectionsByUnitID($UnitID = NULL) {
        $condition = array();
        if (!empty($UnitID) && $UnitID > 0) {
            $condition['UnitID'] = $UnitID;
        }
        $condition['tbl_menu.Status'] = Menu::STATUS_PUBLISHED;
        $condition['tbl_menu_item.Status'] = self::STATUS_ENABLED;
        $condition['tbl_menu.MenuType'] = Menu::MENU_TYPE_MAIN_MENU;
        ///$condition['ParentItemID'] = 0;
        //$condition['tbl_menu.MenuPlacementAreaRegion'] = \app\components\SiteRegions::MAIN_TEMPLATE_HEADER_MAIN_MENU;
        return self::find()
                        ->innerJoin('tbl_menu', 'tbl_menu_item.MenuID=tbl_menu.Id')
                        ->select('UnitID,tbl_menu_item.Id AS Id, MenuID,menuClasses,ItemNameEn,ItemNameSw,LinkUrl,ParentItemID,ListOrder')
                        ->where($condition)
                        ->orderBy('UnitID ASC, MenuID ASC,ParentItemID ASC')
                        ->all();
    }

    static function getParentUrlbyId($Id) {
        if ($Id) {
            $menus = self::find()->where(array('Id' => $Id, 'Status' => self::STATUS_ENABLED))->one();
            if ($menus) {
                return $menus->LinkUrl;
            }
            return NULL;
        }
    }

    static function getItemDetailsById($Id) {
        if ($Id) {
            return self::find()->where(array('Id' => $Id))->one();
        }
        return NULL;
    }

    static function getMenuItemsByMenuGroupIDAndStatus($Id, $Status = NULL) {
        if ($Id && $Id > 0) {
            $condition = array('MenuID' => $Id);
            if (!empty($Status)) {
                $condition['Status'] = $Status;
            }
            return self::find()->select('Id,menuClasses,ItemNameEn,ItemNameSw,LinkUrl')->where($condition)->orderBy('ParentItemID ASC, ListOrder ASC')->all();
        }
        return NULL;
    }

    static function getTargetUrlTypes() {
        return [
            self::URL_TYPE_INTERNAL => 'Internal Url/Within CMS',
            self::URL_TYPE_EXTERNAL => 'External Url/External Website'
        ];
    }

    static function getTargetUrlTypeNameByValue($value) {
        $urlTypes = self::getTargetUrlTypes();
        if ($value && isset($urlTypes[$value])) {
            return $urlTypes[$value];
        }
        return NULL;
    }

}
