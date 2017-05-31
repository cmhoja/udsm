<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Programmes */

$this->title = 'Create Programmes';
$this->params['breadcrumbs'][] = ['label' => 'Programmes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programmes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
