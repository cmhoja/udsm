<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SlideShows */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Home Page Slide Shows', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slide-shows-create">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
