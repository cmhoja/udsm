<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StaffList */

$this->params['breadcrumbs'][] = ['label' => 'Staff Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="staff-list-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
