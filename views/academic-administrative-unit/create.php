<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AcademicAdministrativeUnit */

$this->title = 'Create Academic Administrative Unit';
$this->params['breadcrumbs'][] = ['label' => 'Academic Administrative Units', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academic-administrative-unit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
