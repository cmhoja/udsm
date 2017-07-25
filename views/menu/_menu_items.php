<?php

use yii\helpers\Html;
?>
<div style="width: 80%;position: relative; float: left; clear: both;margin: 0;padding: 0;margin-bottom: 0.55%;height: 490px; overflow-y: scroll;background: ghostwhite">
    <?php
    echo \app\models\MenuItem::recurseMenu($menu_items);
    ?>
</div>

