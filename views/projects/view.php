<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ResearchProjects */

$this->title = 'Project Details';
$this->params['breadcrumbs'][] = ['label' => 'Research Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="research-projects-view">


    <p>
        <?php if ($model->Status != app\models\ResearchProjects::PROJECT_STATUS_PUBLISHED) { ?>
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
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ProjectNameEn',
            'ProjectNameSw',
            array(
                'attribute' => 'UnitID',
                'value' => function($model) {
                    return \app\models\AcademicAdministrativeUnit::getUnitNameById($model->UnitID);
                }
            ),
            'DetailsEn:html',
            'DetailsSw:html',
            'Principal',
            'OtherResearcher:html',
            'FundingEn',
            'FundingSw',
            'StartYear',
            'EndYear',
            array(
                'attribute' => 'Status',
                'value' => function($model) {
                    return $model->getprogrammeStatusName();
                }
            ),
        ],
    ])
    ?>

</div>
<p>
    <?php if ($model->Status != app\models\ResearchProjects::PROJECT_STATUS_PUBLISHED) { ?>
        <?= Html::a('Publish', ['publish', 'id' => $model->Id], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to publish this news?')])
        ?>
    <?php } ?>

    <?php if ($model->Status == app\models\ResearchProjects::PROJECT_STATUS_PUBLISHED) { ?>
        <?= Html::a('Un Publish', ['unpublish', 'id' => $model->Id], ['class' => 'btn btn-primary', 'data-confirm' => Yii::t('yii', 'Are you sure you want to publish this news?')])
        ?>
    <?php } ?>
</p>