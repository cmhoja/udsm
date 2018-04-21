<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AcademicAdministrativeUnit */

$this->title = 'Create/Add Unit';
$this->params['breadcrumbs'][] = ['label' => 'UDSM Units and Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academic-administrative-unit-create">

     <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
