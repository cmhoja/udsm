<?php
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error" style="width: 90%;margin: 3%;margin-top: 7%;">

    <h3><?= Html::encode($this->title) ?></h3>

    <div class="alert alert-danger" >
        <?= nl2br(Html::encode($message)) ?>
    </div>
    <p style="margin-left: 0.5%;font-size: 1em">
        Please contact us if you think this is a server error. Thank you.
    </p>

</div>
