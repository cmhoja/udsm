<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Programmes */

$this->title = 'Add a Programme';
$this->params['breadcrumbs'][] = ['label' => 'Programmes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programmes-create">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
