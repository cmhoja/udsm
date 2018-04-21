<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AcademicAdministrativeUnit */

$this->params['breadcrumbs'][] = ['label' => 'UDSM Units and Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="academic-administrative-unit-update">
   <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
