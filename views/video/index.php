<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VideoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Videos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add/Post Video', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'VideoNameEn',
            'VideoLink',
//            array(
//                'attribute' => 'UnitID',
//                'value' => function($model) {
//                    return \app\models\AcademicAdministrativeUnit::getUnitNameById($model->UnitID);
//                }
//            ), 
        array(
                'attribute' => 'Status',
                'value' => function($model) {
                    return $model->getStatusName();
                }
            ),
        ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
