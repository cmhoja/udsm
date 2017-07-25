<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AcademicAdministrativeUnitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'UDSM Units and Sections';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php echo $this->render('_search', ['model' => $searchModel]); ?>

<?php
echo $this->render('menu');
?>
<div class="academic-administrative-unit-index">

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'UnitNameEn',
           // 'UnitNameSw',
            [
                'attribute' => 'UnitType',
                'value' => function($model) {
                    return $model->getUnitTypeName();
                }
            ],
            [
                'attribute' => 'TypeContentManagement',
                'value' => function($model) {
                    return $model->getContentMangementTypesName();
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
