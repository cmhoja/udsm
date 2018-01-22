<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Programmes */

$this->title = 'Programme Details';
$this->params['breadcrumbs'][] = ['label' => 'Programmes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programmes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if ($model->Status != app\models\Programmes::PROGRAME_STATUS_PUBLISHED) { ?>
            <?= Html::a('Update', ['update', 'id' => $model->Id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Delete', ['delete', 'id' => $model->Id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        <?php } ?>
        <?php if ($model->Status != app\models\Programmes::PROGRAME_STATUS_PUBLISHED) { ?>
            <?= Html::a('Publish', ['publish', 'id' => $model->Id], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to publish this item?')])
            ?>

        <?php } ?>

        <?php if ($model->Status == app\models\ResearchProjects::PROJECT_STATUS_PUBLISHED) { ?>
            <?= Html::a('Un Publish', ['unpublish', 'id' => $model->Id], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to publish this item?')])
            ?>
        <?php } ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ProgrammeNameEn',
            'ProgrammeNameSw',
            array(
                'attribute' => 'ProgrammeType',
                'value' => function($model) {
                    return $model->getProgrammeTypeName();
                }
            ),
            'Duration',
            'DescriptionEn:html',
            'DescriptionSw:html',
            array(
                'attribute' => 'UnitID',
                'value' => function($model) {
                    return \app\models\AcademicAdministrativeUnit::getUnitNameById($model->UnitID);
                }
            ),
            'EntryRequirements:html',
            'EntryRequirementsSw:html',
            'ProgrammeUrl',
            array(
                'attribute' => 'Status',
                'value' => function($model) {
                    return $model->getProgrammeStatusName();
                }
            ),
        ],
    ])
    ?>

</div>
