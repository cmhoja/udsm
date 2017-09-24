<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\FileHelper;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>
<!-- /.login-logo -->
<div class="login-box" style="margin-bottom: 1%;">
    <!-- /.login-logo -->
    <div class="login-box-body">
        <div style="clear: both;position: relative; text-align: center;vertical-align: middle;float: left; margin: 1%;margin-bottom: 4%;padding: 0.5%;border: 2px solid #D2D6DE;width: 98%;">
            <img style="width: 25%;position: relative; float: none;margin: 2%;"src="<?php echo Yii::getAlias('@web') . '/images/logo-udsm.png'; ?>" />
            <!--<h4>UNIVERSITY OF DAR ES SALAAM</h4>-->
        </div>
        <h3 style="width: 96%;position: relative;float: left;text-align: center;vertical-align: middle;margin: 2%;clear: both;">Content Management System (CMS)</h3>

        <p style="clear: both;text-align: center;vertical-align: middle;padding-bottom: 0;margin-top: 5%;margin-bottom: 0;"class="login-box-msg">Please Login to start your session</p>
        <?php if (Yii::$app->session->hasFlash('sms')) { ?>
        <p style="text-align:justify;color: red; font-size: 12px;margin: 1%;">
               <?php
                echo Yii::$app->session->getFlash('sms');
                ?>
            </p>
            <?php
        }
        ?>
        <?php
        $form = ActiveForm::begin([
                    'id' => 'login-form',
        ]);
        ?>
        <div class="form-group has-feedback">
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        </div>

        <div class="form-group has-feedback">
            <?= $form->field($model, 'password')->passwordInput() ?>
        </div>

        <div class="row">
            <div class="col-xs-4">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>

        <?php ActiveForm::end(); ?>
        <!--<a href="index.php?r=user/forgot-password">I forgot my password</a><br>-->
    </div>
</div>
<!-- /.login-box -->
