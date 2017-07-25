<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = 'User Details';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-view">
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
            //   'Id',
            'FName',
            'LName',
            'UserName',
            array(
                'attribute' => 'UserType',
                'label' => 'User Type',
                'value' => $model->getUserTypeName(),
            ),
            array(
                'attribute' => 'UnitID',
                'label' => 'User Type',
                'value' => $model->UnitID?$model->unit->UnitNameEn:NULL,
            ),
        ],
    ])
    ?>

</div>
