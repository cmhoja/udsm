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
            'Attachment',
            'Photo',
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
        <?php if ($model->Status != News::NEWS_STATUS_PUBLISHED) { ?>
            <?= Html::a('Publish', ['publish', 'id' => $model->Id], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to this?')])
            ?>


        <?php } ?>

        <?php if ($model->Status == News::NEWS_STATUS_PUBLISHED) { ?>
            <?= Html::a('Un Publish', ['unpublish', 'id' => $model->Id], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to Do this?')])
            ?>
        <?php } ?>
    </p>

</div>
