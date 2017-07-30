<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p style="clear: both">
        <?= Html::a('Create/Post News', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'DateCreated',
            'TitleEn',
//            'TitleSw',
            // 'DetailsEn:ntext',
            array(
                'attribute' => 'UnitID',
                'value' => function($model) {
                    return \app\models\AcademicAdministrativeUnit::getUnitNameById($model->UnitID);
                }
            ),
            array(
                'attribute' => 'Status',
                'value' => function($model) {
                    return $model->getStatusName();
                }
            ),
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Options',
                'headerOptions' => ['style' => 'color:#337ab7'],
                'template' => '{view}{update}{delete}',
                'buttons' => [
//                    'update' => [
//                        'visible' => TRUE,
//                    ],
//                    'delete' => ['visible' => TRUE,]
                ]
            ],
        ],
    ]);
    ?>
</div>
