<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create/Add Menu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'MenuName',
            'DisplayNameEn',
            [
                'attribute' => 'MenuType',
                'value' => function($model) {
                    return $model->getMenuTypeName();
                }
            ],
            [
                'attribute' => 'MenuPlacementAreaRegion',
                'value' => function($model) {
                    return $model->getRegionName();
                }
            ],
            [
                'attribute' => 'UnitID',
                'value' => function($model) {
                    return app\models\AcademicAdministrativeUnit::getUnitNameById($model->UnitID);
                }
            ],
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
