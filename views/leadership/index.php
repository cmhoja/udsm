<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'UDSM Management/ Leaderships';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leadership-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add USDM Management', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'FName',
            'LNames',
            'PositionEn',
            'ListOrder',
            'Status',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
