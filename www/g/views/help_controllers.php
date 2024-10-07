<h3>
    <?php _t("List of sections (controllers) where the system searches"); ?>

</h3>

<p>
    <a href="index.php?c=config&a=g"><?php _t("Clic here to update this list"); ?></a>
</p>

<ol>
    <?php
    $config_g_controllers_list_allowed_json = _options_option('config_g_controllers_list_allowed');

    $config_g_controllers_list_allowed_array = ($config_g_controllers_list_allowed_json) ? json_decode($config_g_controllers_list_allowed_json) : null;

//    vardump($config_g_controllers_list_allowed_array); 


    foreach ($config_g_controllers_list_allowed_array as $controller) {
        echo '<li>' . $controller . '</li>';
    }
    ?>
</ol>