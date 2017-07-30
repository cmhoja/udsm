<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Leaderships';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leadership-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Leadership', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'Photo',
            'FName',
            'LNames',
            'PositionEn',
            // 'PositionSw',
            // 'SummaryEn:ntext',
            // 'SummarySw:ntext',
            // 'ListOrder',
            // 'Status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
