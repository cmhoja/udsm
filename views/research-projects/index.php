<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResearchProjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Research Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="research-projects-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Research Projects', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'ProjectNameEn',
            'ProjectNameSw',
            'UnitID',
            'DetailsEn:ntext',
            // 'DetailsSw:ntext',
            // 'Principal',
            // 'OtherResearcher',
            // 'Funding',
            // 'StartYear',
            // 'EndYear',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
