<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\AcademicAdministrativeUnit;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */

$this->params['breadcrumbs'][] = ['label' => 'Manage Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Menu Details';
?>
<div class="menu-view">

    <p>
        <?php if ($model->Status != app\models\Menu::STATUS_PUBLISHED) { ?>
            <?= Html::a('Update', ['update', 'id' => $model->Id], ['class' => 'btn btn-primary'])
            ?>
            <?=
            Html::a('Delete', ['delete', 'id' => $model->Id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]);
            ?>
        <?php } ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'MenuName',
            [
                'attribute' => 'MenuType',
                'value' => function($model) {
                    return $model->getMenuTypeName();
                }
            ],
            'DisplayNameEn', 'DisplayNameSw',
            'Description',
            [
                'attribute' => 'UnitID',
                'value' => function($model) {
                    return app\models\AcademicAdministrativeUnit::getUnitNameById($model->Id);
                }
            ],
            [
                'attribute' => 'MenuPlacementAreaRegion',
                'value' => function($model) {
                    return $model->getRegionName();
                }
            ],
            'ShowOnPage',
            ['attribute' => 'Status',
                'value' => function($model) {
                    return $model->getStatusName();
                }
            ]
        ],
    ])
    ?>

</div>
<p>
    <?php if ($model->Status != app\models\Menu::STATUS_PUBLISHED) { ?>
        <?= Html::a('Publish', ['publish', 'id' => $model->Id], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to this?')])
        ?>


    <?php } ?>

    <?php if ($model->Status == app\models\Menu::STATUS_PUBLISHED) { ?>
        <?= Html::a('Un Publish', ['unpublish', 'id' => $model->Id], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to Do this?')])
        ?>
    <?php } ?>
    <?= Html::a('AddItem', ['add-item', 'id' => $model->Id], ['class' => 'btn btn-primary']) ?>
</p>

<h5 style="clear: both;float: left;">Menu Structure</h5>
<div style="clear: both;position: relative;float: left; height: 425px; padding: 0.4%;margin-bottom: 4%;">
    <?php
    echo $this->render('//menu/_menu_items', array('menu_items' => $menu_items));
    ?>
</div>