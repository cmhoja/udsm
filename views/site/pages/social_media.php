<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = Yii::$app->params['static_items']['social_media'][Yii::$app->language];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-header page-title-left">
    <div class="container">
        <div class="col-md-12 no-pad">
            <h1 class="title"><?php echo $this->title; ?></h1>

            <ul class = "breadcrumb">
                <li>
                    <a href = "<?php echo yii\helpers\Url::home(); ?>">Home</a>
                </li>
                <li>
                    <a href = "#"><?php echo Yii::$app->params['static_items']['page'][Yii::$app->language]; ?></a>
                </li>
                <li class = "active"><?php echo $this->title; ?></li>
            </ul>
        </div>

    </div>
</div>


<section class="page-section">
    <div class="container">

        <div class="row">
            <?php
            if (isset($content) && isset($content['social_media'])) {
                foreach ($content['social_media'] as $social_media) {
                    ?>
                    <div class="col-md-2">
                        <div class="social-icon gray-bg icons-circle i-10x">
                            <a target="_blanck" href="<?php echo $social_media->AccountAddress; ?>">
                                <i class="fa <?php echo $social_media->AccountLogoClass; ?> fa-4x"></i> <br>
                            </a> 
                            <p><?php echo $social_media->AccountName; ?></p>

                        </div>

                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="row"><div class="col-sm-12">
                <?php
                if (isset($content['blocks']) && $content['blocks']) {
                    foreach ($content['blocks'] as $block1) {
                        ?>
                        <div class="col-md-3">
                            <?php
                            $IconClass = $block1->BlockIconCSSClass;
                            ?>
                            <?php if (!empty($IconClass) && empty($block1->BlockIconPicture) && empty($block1->BlockIconVideo)) { ?>
                                <i class="<?php echo $IconClass; ?>"></i>
                                <?php
                            }else if (!empty($block1->BlockIconPicture) && !empty($block1->BlockIconVideo) && !empty($block1->BlockIconCSSClass)) {
                                ?>
                                <a href="<?php echo \app\components\Utilities::generateUrl($block1->LinkToPage); ?>" >
                                    <img class="<?php echo $IconClass; ?>" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_main_site'] . '/' . $block1->BlockIconPicture; ?>">
                                </a>
                                <?php
                            } elseif (!empty($block1->BlockIconVideo)) {
                                ?>
                                <div class="<?php echo $IconClass; ?>">
                                    <?php echo $block1->BlockIconVideo ?>
                                </div>
                                <?php
                            }
                            ?>
                            <h5><a href="<?php echo \app\components\Utilities::generateUrl($block1->LinkToPage); ?>" class="promotions"><?php echo (Yii::$app->language == 'sw') ? $block1->BlockTitleSw : $block1->BlockTitleEn; ?></a></h5>
                            <p><?php echo substr(((Yii::$app->language == 'sw') ? $block1->BlockDetailsSw : $block1->BlockDetailsEn), 0, 200); ?></p>
                            <?php
                            ?>
                        </div>

                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>

