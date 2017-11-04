<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LoginsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Logins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logins-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'UserId',
                'value' => function($model) {
                    return \app\models\Users::getUserNameById($model->UserId);
                }
            ],
            'DateCreated',
            'IpAddress',
            'Details:ntext',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]);
    ?>
</div>
