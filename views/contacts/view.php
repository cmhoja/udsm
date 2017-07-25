<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Contacts */

$this->params['breadcrumbs'][] = ['label' => 'Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Contact Details';
?>
<div class="contacts-view">

    <p>
        <?php if ($model->Status != app\models\Contacts::STATUS_PUBLISHED) { ?>
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
        <?php } ?>
    </p>
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ContactTitle',
            array(
                'attribute' => 'UnitID',
                'value' => function($model) {
                    return \app\models\AcademicAdministrativeUnit::getUnitNameById($model->UnitID);
                }
            ),
            'Descriptions',
            'PhoneNo',
            'FaxNo',
            'EmailAddress:email',
            'GoogleMapCode:ntext',
            array(
                'attribute' => 'Status',
                'value' => function($model) {
                    return $model->getStatusName();
                }),
        ],
    ])
    ?>

</div>
<p>
    <?php if ($model->Status != app\models\Contacts::STATUS_PUBLISHED) { ?>
        <?= Html::a('Publish', ['publish', 'id' => $model->Id], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to publish this item?')])
        ?>

    <?php } ?>

    <?php if ($model->Status == app\models\Contacts::STATUS_PUBLISHED) { ?>
        <?= Html::a('Un Publish', ['unpublish', 'id' => $model->Id], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to publish this item?')])
        ?>
    <?php } ?>
</p>