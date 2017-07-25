<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BasicPage */

$this->params['breadcrumbs'][] = ['label' => 'Manage Basic Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update Page Details';
?>
<div class="basic-page-update">
<?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
