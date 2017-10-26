<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Announcement */

$this->title = 'Details';
$this->params['breadcrumbs'][] = ['label' => 'Announcements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="announcement-view">
    <?php if ($model->Status != \app\models\Announcement::STATUS_PUBLISHED) { ?>
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->Id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Delete', ['delete', 'id' => $model->Id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
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
                    return app\models\AcademicAdministrativeUnit::getUnitNameById($model->UnitID);
                },
                'format' => 'html'
            ),
            'TitleEn',
            'TitleSw',
            'DetailsEn:ntext',
            'DetailsSw:ntext',
            array(
                'attribute' => 'Attachment',
                'value' => function($model) {
                    return ($model->Attachment) ? '<a target="_blank" href= "' . Yii::$app->getUrlManager()->getBaseUrl() . '/../' . (Yii::$app->params['file_upload_main_site'] . '/' . $model->Attachment) . '">Download here to Preview </a>' : '';
                },
                'format' => 'html'
            ),
            'DatePosted',
            'LinkUrl',
            array(
                'attribute' => 'Status',
                'value' => function($model) {
                    return $model->getStatusName();
                }
            ),
        ],
    ])
    ?>
    <p>
        <?php if ($model->Status != \app\models\Announcement::STATUS_PUBLISHED) { ?>
            <?= Html::a('Publish', ['publish', 'id' => $model->Id], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to publish this Item?')])
            ?>

        <?php } ?>
        <?php if ($model->Status == \app\models\Announcement::STATUS_PUBLISHED) { ?>
            <?= Html::a('Un Publish', ['unpublish', 'id' => $model->Id], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to Do this?')])
            ?>

        <?php } ?>
    </p>
</div>
