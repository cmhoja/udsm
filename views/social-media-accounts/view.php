<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SocialMediaAccounts */

$this->params['breadcrumbs'][] = ['label' => 'Social Media Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Account Details';
?>
<div class="social-media-accounts-view">


    <?php if ($model->Status != \app\models\SocialMediaAccounts::STATUS_PUBLISHED) { ?>

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->Id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Delete', ['delete', 'id' => $model->Id], [
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
            'AccountName',
            'AccountAddress',
            'AccountLogoClass',
            array(
                'attribute' => 'UnitID',
                'value' => function($model) {
                    return \app\models\AcademicAdministrativeUnit::getUnitNameById($model->UnitID);
                }
            ),
            array(
                'attribute' => 'Status',
                'value' => function($model) {
                    return $model->getStatusName();
                }
            ),
        ],
    ])
    ?>
    <p>
        <?php if ($model->Status != \app\models\SocialMediaAccounts::STATUS_PUBLISHED) { ?>
            <?= Html::a('Publish', ['publish', 'id' => $model->Id], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to publish this news?')])
            ?>

        <?php } ?>
        <?php if ($model->Status == \app\models\SocialMediaAccounts::STATUS_PUBLISHED) { ?>
            <?= Html::a('Un Publish', ['unpublish', 'id' => $model->Id], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to Do this?')])
            ?>
        <?php } ?>
    </p>

</div>
