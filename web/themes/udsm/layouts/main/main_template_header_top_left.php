<!--Getting social network accounts-->
<?php
$social_accounts = app\models\SocialMediaAccounts::getActiveAccountsByUnitID();
if ($social_accounts) {
    foreach ($social_accounts as $social_account) {
        ?>
        <a  target="_blank" href="<?php echo yii\helpers\Url::to(html_entity_decode($social_account->AccountAddress)) ?>">
            <i class="<?php echo html_entity_decode($social_account->AccountLogoClass); ?>"></i>
        </a>
        <?php
    }
}

