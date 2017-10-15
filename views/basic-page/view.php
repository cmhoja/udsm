<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BasicPage */

$this->params['breadcrumbs'][] = ['label' => 'Manage Basic Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Page Details';
?>
<div class="basic-page-view">

    <?php if ($model->Status != \app\models\BasicPage::STATUS_PUBLISHED) { ?>

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->PageId], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Delete', ['delete', 'id' => $model->PageId], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]);
            ?>
        </p>
    <?php } ?>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            array(
                'attribute' => 'UnitID',
                'value' => function($model) {
                    return \app\models\AcademicAdministrativeUnit::getUnitNameById($model->UnitID);
                }
            ),
            ///'PageId',
            'PageTitleEn',
            'PageTitleSw',
            'DescriptionEn:ntext',
            'DescriptionSw:ntext',
            'Attachment',
            'EmbededVideo',
            'PageSeoUrl:url',
            array(
                'attribute' => 'PageSeoUrl',
                'label' => 'Page Preview link',
                'value' => function($model) {
                    return \yii\helpers\Url::toRoute($model->PageSeoUrl, true);
                }
            ),
            'DateCreated',
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
<p>
    <?php if ($model->Status != \app\models\BasicPage::STATUS_PUBLISHED) { ?>
        <?= Html::a('Publish', ['publish', 'id' => $model->PageId], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to publish this news?')])
        ?>

    <?php } ?>
    <?php if ($model->Status == \app\models\BasicPage::STATUS_PUBLISHED) { ?>
        <?= Html::a('Un Publish', ['unpublish', 'id' => $model->PageId], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to Do this?')])
        ?>
    <?php } ?>
</p>
