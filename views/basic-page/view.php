<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BasicPage */

$this->params['breadcrumbs'][] = ['label' => 'Manage Custom Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Page Details';
?>
<div class="basic-page-view">

    <?php if ($model->Status != \app\models\BasicPage::STATUS_PUBLISHED) { ?>

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->PageId], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Delete', ['delete', 'id' => $model->PageId], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]);
            ?>
        </p>
    <?php } ?>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            array(
                'attribute' => 'UnitID',
                'value' => function($model) {
                    return \app\models\AcademicAdministrativeUnit::getUnitNameById($model->UnitID);
                }
            ),
            ///'PageId',
            'PageTitleEn',
            'PageTitleSw',
            'DescriptionEn:html',
            'DescriptionSw:html',
            array(
                'attribute' => 'Photo',
                'attribute' => 'Page Photo:',
                'value' => function($model) {
                    return ($model->Photo) ? '<img style="width:200px" class="" src="' . Yii::$app->getUrlManager()->getBaseUrl() . '/../' . Yii::$app->params['file_upload_main_site'] . '/' . $model->Photo . '">' : 'Not set';
                },
                'format' => 'html'
            ),
            array(
                'attribute' => 'Attachment',
                'value' => function($model) {
                    return ($model->Attachment) ? '<a target="_blank" href= "' . Yii::$app->getUrlManager()->getBaseUrl() . '/../' . (Yii::$app->params['file_upload_main_site'] . '/' . $model->Attachment) . '">Download here to Preview </a>' : '';
                },
                'format' => 'html'
            ),
            'EmbededVideo',
            'PageSeoUrl:url',
            array(
                'attribute' => 'PageSeoUrl',
                'label' => 'Preview link',
                'title' => 'Click to Preview',
                'format' => 'url',
                'value' => function($model) {
                    return \yii\helpers\Url::toRoute($model->PageSeoUrl, true);
                }
            ),
            'DateCreated',
            array(
                'attribute' => 'Status',
                'value' => function($model) {
                    return $model->getStatusName();
                }
            ),
        ],
    ])
    ?>

</div>
<p>
    <?php if ($model->Status != \app\models\BasicPage::STATUS_PUBLISHED) { ?>
        <?= Html::a('Publish', ['publish', 'id' => $model->PageId], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to publish this news?')])
        ?>

    <?php } ?>
    <?php if ($model->Status == \app\models\BasicPage::STATUS_PUBLISHED) { ?>
        <?= Html::a('Un Publish', ['unpublish', 'id' => $model->PageId], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to Do this?')])
        ?>
    <?php } ?>
</p>
