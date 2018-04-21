<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BasicPageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = 'Manage Custom Pages';
?>
<div class="basic-page-index">
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Create Custom Page', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'PageTitleEn',
            'PageSeoUrl:url',
//            array(
//                'attribute' => 'PageSeoUrl',
//                'label' => 'Previw Link',
//                'value' => function($model) {
//                    return \yii\helpers\Url::toRoute($model->PageSeoUrl, true);
//                }
//            ),
            array(
                'attribute' => 'UnitID',
                'value' => function($model) {
                    return \app\models\AcademicAdministrativeUnit::getUnitNameById($model->UnitID);
                }
            ), array(
                'attribute' => 'Status',
                'value' => function($model) {
                    return $model->getStatusName();
                }),
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
