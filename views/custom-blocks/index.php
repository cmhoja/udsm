<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomBlocksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Custom Blocks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="custom-blocks-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add Custom Blocks', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'BlockName',
            array(
                'attribute' => 'BlockUnitID',
                'value' => function($model) {
                    return \app\models\AcademicAdministrativeUnit::getUnitNameById($model->BlockUnitID);
                }
            ),
            array(
                'attribute' => 'BlockType',
                'value' => function($model) {
                    return $model->getBlockTypeName();
                }
            ),
            'BlockTitleEn',
             array(
                'attribute' => 'BlockPlacementAreaRegion',
                'value' => function($model) {
                    return $model->getRegionName();
                }
            ),
            'ShowOnPage',
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
