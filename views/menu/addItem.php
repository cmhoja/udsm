<?php

use yii\helpers\Html;

$this->title = 'Add Menu Item';
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-create">
    <?=
    $this->render('_form_menu_item', [
        'model' => $model,'item_model'=>$menu_item_model
    ])
    ?>

</div>
