<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProgrammesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Programmes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programmes-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p style="clear: both">
        <?= Html::a('Add a Programme', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'ProgrammeNameEn',
            'Duration',
            array(
                'attribute' => 'UnitID',
                'value' => function($model) {
                    return \app\models\AcademicAdministrativeUnit::getUnitNameById($model->UnitID);
                }
            ),
            array(
                'attribute' => 'ProgrammeType',
                'value' => function($model) {
                    return $model->getProgrammeTypeName();
                }
            ),
            array(
                'attribute' => 'Status',
                'value' => function($model) {
                    return $model->getProgrammeStatusName();
                }
            ),
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
