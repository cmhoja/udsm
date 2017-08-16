<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SlideShows */

$this->params['breadcrumbs'][] = ['label' => 'Home Slide Shows', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Details';
?>
<div class="slide-shows-view">


    <?php if ($model->Status != \app\models\SlideShows::STATUS_PUBLISHED) { ?>

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->Id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Delete', ['delete', 'id' => $model->Id], [
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
            'TitleEn',
            'TitleSw',
            'DetailsEn',
            'DetailsSw',
            'LinkToPage',
            array(
                'attribute' => 'Image',
                'attribute' => 'Image/Photo Preview:',
                'value' => function($model) {

                    return '<img style="width:200px" class="" src="' . Yii::$app->getUrlManager()->getBaseUrl() . '/../' . Yii::$app->params[($model->UnitID) ? 'file_upload_units_site' : 'file_upload_main_site'] . '/' . $model->Image . '">';
                },
                'format' => 'html'
            ),
            array(
                'attribute' => 'UnitID',
                'value' => function($model) {
                    return \app\models\AcademicAdministrativeUnit::getUnitNameById($model->UnitID);
                }
            ),
            'DateCreated',
            'DatePosted',
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
        <?php if ($model->Status != \app\models\SlideShows::STATUS_PUBLISHED) { ?>
            <?= Html::a('Publish', ['publish', 'id' => $model->Id], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to publish this news?')])
            ?>

        <?php } ?>
        <?php if ($model->Status == \app\models\SlideShows::STATUS_PUBLISHED) { ?>
            <?= Html::a('Un Publish', ['unpublish', 'id' => $model->Id], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to Do this?')])
            ?>
        <?php } ?>
    </p>