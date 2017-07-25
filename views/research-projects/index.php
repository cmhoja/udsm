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

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p style="clear: both">
        <?= Html::a('Post/Add Research Projects', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'ProjectNameEn',
            array(
                'attribute' => 'UnitID',
                'value' => function($model) {
                    return \app\models\AcademicAdministrativeUnit::getUnitNameById($model->UnitID);
                }
            ),
            'Principal',
            'StartYear',
            //'EndYear',
            array(
                'attribute' => 'Status',
                'value' => function($model) {
                    return $model->getprogrammeStatusName();
                }
            ),
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
