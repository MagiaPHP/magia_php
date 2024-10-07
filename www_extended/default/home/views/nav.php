
<br>

<ul class="nav nav-pills">
    <li role="presentation" class=""><a href="index.php"><?php _t("Home"); ?></a></li>
    <li role="presentation" class="<?php echo ($a == 'about') ? "active" : ""; ?>"><a href="index.php?a=about"><?php _t("General description"); ?></a></li>
    <li role="presentation" class="<?php echo ($a == 'privacy_policy') ? "active" : ""; ?>"><a href="index.php?a=privacy_policy"><?php _t("Privacy Policy"); ?></a></li>
    <li role="presentation" class="<?php echo ($a == 'terms_of_service') ? "active" : ""; ?>"><a href="index.php?a=terms_of_service"><?php _t("Terms of Service"); ?></a></li>
    <li role="presentation" class="<?php echo ($a == 'technology') ? "active" : ""; ?>"><a href="index.php?a=technology"><?php _t("Technology"); ?></a></li>
    <li role="presentation" class="<?php echo ($a == 'frequent_questions') ? "active" : ""; ?>"><a href="index.php?a=frequent_questions"><?php _t("FAQ"); ?></a></li>

    <?php if (modules_field_module('status', 'docu')) { ?>
        <li role="presentation" class="<?php echo ($a == 'documentation') ? "active" : ""; ?>"><a href="index.php?a=documentation"><?php _t("Documentation"); ?></a></li>
    <?php } ?>


    <li role="presentation" class="<?php echo ($a == 'jobs') ? "active" : ""; ?>"><a href="index.php?a=jobs"><?php _t("Jobs"); ?></a></li>
</ul>
<hr>
