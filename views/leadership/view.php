<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Leadership */

$this->title = 'Leadership Details #'.$model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Leaderships', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leadership-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'Id',
            'Photo',
            'FName',
            'LNames',
            'PositionEn',
            'PositionSw',
            [
                'attribute' => 'SummaryEn',
                'label' => 'SummaryEn',
                // 'value'=>'SummaryEn',
                'format' => 'html'
            ],
            'SummarySw:html',
            'ListOrder',
            array(
                'attribute' => 'Photo',
                'header' => 'Image/Photo Preview:',
                'value' => function($model) {

                    return '<img style="width:100px" class="" src="' . Yii::$app->getUrlManager()->getBaseUrl() . '/../' . Yii::$app->params['file_upload_main_site'] . '/' . $model->Photo . '">';
                },
                'format' => 'html'
            ),
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
