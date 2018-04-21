<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\News;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'News Details';
?>
<div class="news-view">

    <p>
        <?php if ($model->Status != News::NEWS_STATUS_PUBLISHED) { ?>
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
        
            <?= Html::a('Publish', ['publish', 'id' => $model->Id], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to this?')])
            ?>


        <?php } ?>

        <?php if ($model->Status == News::NEWS_STATUS_PUBLISHED) { ?>
            <?= Html::a('Un Publish', ['unpublish', 'id' => $model->Id], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to Do this?')])
            ?>
        <?php } ?>
    </p>


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
            'TitleEn',
            'TitleSw',
            'DetailsEn:html',
            'DetailsSw:html',
            array(
                'attribute' => 'Attachment',
                'value' => function($model) {
                    return ($model->Attachment) ? '<a target="_blank" href= "' . Yii::$app->getUrlManager()->getBaseUrl() . '/../' . (Yii::$app->params['file_upload_main_site'] . '/' . $model->Attachment) . '">Download here to Preview </a>' : '';
                },
                'format' => 'html'
            ),
            array(
                'attribute' => 'Photo',
                'header' => 'Icon Picture Preview:',
                'value' => function($model) {
                    return ($model->Photo) ? '<img style="width:200px" class="" src="' . Yii::$app->getUrlManager()->getBaseUrl() . '/../' . (Yii::$app->params['file_upload_main_site'] . '/' . $model->Photo) . '">' : 'NOT SET ';
                },
                'format' => 'html'
            ),
            'DateCreated',
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



</div>
