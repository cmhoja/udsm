<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">
    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'FName',
            'LName',
            'UserName',
            array(
                'attribute' => 'UserType',
                'value' => function($model) {
                   return $model->getUserTypeName();
                },
            ),
            array(
                'attribute' => 'UnitID',
                'value' => function($model){
                   return $model->UnitID ? $model->unit->UnitNameEn : NULL;
                }
            ),
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
