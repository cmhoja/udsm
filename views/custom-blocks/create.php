<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CustomBlocks */

$this->params['breadcrumbs'][] = ['label' => 'Custom Blocks', 'url' => ['index']];
$this->params['breadcrumbs'][] ='Add Custom Block';
?>
<div class="custom-blocks-create">

 
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
