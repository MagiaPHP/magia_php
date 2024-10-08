<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("config", "izq_budgets"); ?>
    </div>

    <div class="col-lg-8">
        <?php include view("config", "nav"); ?>


        <?php
        if ($m) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
//        vardump(_options_option('config_budgets_edit_tmp'));
        ?>



        <h1><?php _t("Budgets modele template"); ?></h1>

        <p>    <?php _t("When you create an budget, what will be the default status?"); ?> </p>

        <form method="post" action="index.php">
            <input type="hidden" name="c" value="config">
            <input type="hidden" name="a" value="ok_budgets_edit_tmp">            

            <div class="radio">
                <label>
                    <input 
                        type="radio" 
                        name="data" 
                        id="data" 
                        value="default" <?php echo (_options_option('config_budgets_edit_tmp') == 'default' ) ? " checked " : ""; ?>>
                    <?php _t("Default"); ?> (<?php _t("default"); ?>)
                </label>
            </div>


            <div class="radio">
                <label>
                    <input 
                        type="radio" 
                        name="data" 
                        id="data" 
                        value="2_cols" <?php echo (_options_option('config_budgets_edit_tmp') == '2_cols' ) ? " checked " : ""; ?>>
                        <?php _t("2 Cols"); ?>
                </label>
            </div>

            <div class="radio">
                <label>
                    <input 
                        type="radio" 
                        name="data" 
                        id="data" 
                        value="short" <?php echo (_options_option('config_budgets_edit_tmp') == 'short' ) ? " checked " : ""; ?> >
                        <?php _t("Short"); ?>
                </label>
            </div>

            <button type="submit" class="btn btn-primary"><?php _t("Changer"); ?></button>
        </form>




    </div>
</div>

<?php include view("home", "footer"); ?> 

