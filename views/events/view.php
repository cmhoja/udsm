<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Events;

/* @var $this yii\web\View */
/* @var $model app\models\Events */

$this->title = 'Update';
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-view">

    <p>
        <?php if ($model->Status != Events::EVENT_STATUS_PUBLISHED) { ?>
            <?= Html::a('Update', ['update', 'id' => $model->Id], ['class' => 'btn btn-warning'])
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
      
            <?= Html::a('Publish', ['publish', 'id' => $model->Id], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to do this?')])
            ?>

        <?php } ?>

        <?php if ($model->Status == Events::EVENT_STATUS_PUBLISHED) { ?>
            <?= Html::a('Un Publish', ['unpublish', 'id' => $model->Id], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to Do this?')])
            ?>
        <?php } ?>
    </p>


    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'DateCreated',
            'EventUrl:url',
            'EventTitleEn',
            'EventTitleSw',
            'DescriptionEn:html',
            'DescriptionSw:html',
            'StartDate',
            'EndDate',
            array(
                'attribute' => 'UnitID',
                'value' => function($model) {
                    return \app\models\AcademicAdministrativeUnit::getUnitNameById($model->UnitID);
                }
            ),
            array(
                'attribute' => 'Attachment',
                'value' => function($model) {
                    return ($model->Attachment) ? '<a target="_blank" href= "' . Yii::$app->getUrlManager()->getBaseUrl() . '/../' . (Yii::$app->params['file_upload_main_site'] . '/' . $model->Attachment) . '">Download here to Preview </a>' : '';
                },
                'format' => 'html'
            ),
            array(
                'attribute' => 'Status',
                'value' => function($model) {
                    return $model->getStatusName();
                }
            ),
            'DatePosted',
        ],
    ])
    ?>

</div>
