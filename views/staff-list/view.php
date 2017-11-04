<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StaffList */

$this->params['breadcrumbs'][] = ['label' => 'Staff Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Staff Details';
?>
<div class="staff-list-view">
    <?php if ($model->Status != \app\models\StaffList::STATUS_PUBLISHED) { ?>

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->Id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Delete', ['delete', 'id' => $model->Id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]);
            ?>
        </p>
    <?php } ?>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'FName',
            'LName',
            array(
                'attribute' => 'UnitID',
                'value' => function($model) {
                    return \app\models\AcademicAdministrativeUnit::getUnitNameById($model->UnitID);
                }
            ),
            'Education',
            'Position',
            'Summary:html',
            'SummarySw:html',
            array(
                'attribute' => 'Status',
                'value' => function($model) {
                    return $model->getStatusName();
                }
            ),
        ],
    ])
    ?>
    <p>
        <?php if ($model->Status != \app\models\StaffList::STATUS_PUBLISHED) { ?>
            <?= Html::a('Publish', ['publish', 'id' => $model->Id], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to publish this Item?')])
            ?>

        <?php } ?>
        <?php if ($model->Status == \app\models\StaffList::STATUS_PUBLISHED) { ?>
            <?= Html::a('Un Publish', ['unpublish', 'id' => $model->Id], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to Do this?')])
            ?>
        <?php } ?>
    </p>
</div>
