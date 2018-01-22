<form class="form-inline" method="POST">
    <div class="input-text form-group">
        <input type="text" name="ProjectName" style="margin-bottom: 0%;" class="input-name form-control" placeholder="<?php echo Yii::$app->params['static_items']['enter_key_word'][Yii::$app->language] ?>" />
    </div>
    <input id="form-token" type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>"/>
    <button type="submit" class="btn btn-default"><?php echo (Yii::$app->language == 'sw') ? Yii::$app->params['static_items']['find_programme']['sw'] : Yii::$app->params['static_items']['find_programme']['en']; ?></button>
</form>