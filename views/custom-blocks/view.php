<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CustomBlocks */

$this->title = $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Custom Blocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Details';
?>
<div class="custom-blocks-view">

    <p>
        <?php if ($model->Status != \app\models\CustomBlocks::STATUS_PUBLISHED) { ?>
            <?= Html::a('Edit', ['update', 'id' => $model->Id], ['class' => 'btn btn-warning'])
            ?>

        <?php } ?>

        <?php if ($model->Status != \app\models\CustomBlocks::STATUS_PUBLISHED) { ?>
            <?= Html::a('Publish', ['publish', 'id' => $model->Id], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to do this?')])
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

        <?php if ($model->Status == \app\models\CustomBlocks::STATUS_PUBLISHED) { ?>
            <?= Html::a('Un Publish', ['unpublish', 'id' => $model->Id], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to Do this?')])
            ?>
        <?php } ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'BlockName',
            'BlockTitleEn',
            'BlockTitleSw',
            'BlockDetailsEn',
            'BlockDetailsSw:ntext',
            array(
                'attribute' => 'BlockUnitID',
                'value' => function($model) {
                    return \app\models\AcademicAdministrativeUnit::getUnitNameById($model->BlockUnitID);
                }
            ),
            array(
                'attribute' => 'BlockType',
                'value' => function($model) {
                    return $model->getBlockTypeName();
                }
            ),
            array(
                'attribute' => 'BlockIconPicture',
                'attribute' => 'Icon Picture Preview:',
                'value' => function($model) {
                    return ($model->BlockIconPicture) ? '<img style="width:200px" class="" src="' . Yii::$app->getUrlManager()->getBaseUrl() . '/../' . ($model->BlockUnitID) ? Yii::$app->params['file_upload_units_site'] : Yii::$app->params['file_upload_main_site'] . '/' . $model->BlockIconPicture . '">' : 'Not set';
                },
                'format' => 'html'
            ),
            'BlockIconVideo',
            'BlockIconCSSClass',
            'LinkToPage',
            array(
                'attribute' => 'BlockPlacementAreaRegion',
                'value' => function($model) {
                    return $model->getRegionName();
                }
            ),
            'ShowOnPage',
            array(
                'attribute' => 'Status',
                'value' => function($model) {
                    return $model->getStatusName();
                }
            ),
        ],
    ])
    ?>

</div>
