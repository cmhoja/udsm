<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StaffList */

$this->title = 'Create/Add Staff';
$this->params['breadcrumbs'][] = ['label' => 'Staff Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
