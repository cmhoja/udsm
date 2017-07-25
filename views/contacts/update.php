<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Contacts */

$this->params['breadcrumbs'][] = ['label' => 'Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update Contact Details';
?>
<div class="contacts-update">
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
