<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AcademicAdministrativeUnit */

$this->title = 'UDSM Units and Sections';
$this->params['breadcrumbs'][] = ['label' => 'UDSM Units and Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Details';
?>
<div class="academic-administrative-unit-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'UnitNameEn',
            'UnitNameSw',
            [
                'attribute' => 'UnitType',
                'value' => function($model) {
                    return $model->getUnitTypeName();
                }
            ],
            [
                'attribute' => 'ParentUnitId',
                'label' => 'Member Of',
                'value' => function($model) {
                    return $model->getParentUnitName();
                }
            ],
        ],
    ])
    ?>

</div>
