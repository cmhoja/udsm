<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BasicPage */

$this->params['breadcrumbs'][] = ['label' => 'Manage Custom Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Add  Basic Page';
?>
<div class="basic-page-create">
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
