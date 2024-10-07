<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("config", "izq_app"); ?>
    </div>

    <div class="col-lg-8">
        <?php //include view("config", "nav"); ?>

        <?php
        if (isset($m)) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("Global search"); ?> </h1>

        <p>
            <?php _t("List of sections or controllers where the global search will be performed"); ?>
        </p>

        <form method="post" action="index.php">

            <input type="hidden" name="c" value="config">
            <input type="hidden" name="a" value="ok_g_controllers_list_allowed">



            <div class="form-group">                

                <?php
                $config_g_controllers_list_allowed_json = _options_option('config_g_controllers_list_allowed');

                $config_g_controllers_list_allowed_array = ($config_g_controllers_list_allowed_json) ? json_decode($config_g_controllers_list_allowed_json) : null;

                foreach (controllers_list() as $key => $controller) {

                    $checked = (isset($config_g_controllers_list_allowed_array) && in_array($controller['controller'], $config_g_controllers_list_allowed_array)) ? ' checked ' : "";

                    echo '<div class="checkbox">
                    <label>
                        <input type="checkbox" value="' . $controller['controller'] . '" name="data[]" ' . $checked . '> ' . ($controller['controller']) . '
                    </label>
                </div>';
                }
                ?>

            </div>


            <button type="submit" class="btn btn-default">
                <?php echo icon("ok"); ?> 
                <?php _t("Submit"); ?>
            </button>


        </form>


    </div>
</div>

<?php include view("home", "footer"); ?> 

