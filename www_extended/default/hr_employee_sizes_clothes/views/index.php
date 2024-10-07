<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("hr_employee_sizes_clothes", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">
        <?php include view("hr_employee_sizes_clothes", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <?php // include view("hr_employee_sizes_clothes", "top"); ?>



        <?php
        $tmp = _options_option('config_hr_employee_sizes_clothes_index_tmp');
        ?>

        <ul class="nav nav-tabs">
            <li role="presentation" <?php echo ($tmp == 'table_index' ) ? 'class="active"' : ""; ?>><a href="index.php?c=config&a=ok_hr_employee_sizes_clothes_index_tmp&data=table_index&redi=1">T1</a></li>
            <li role="presentation" <?php echo ($tmp == 'table_index3' ) ? 'class="active"' : ""; ?>><a href="index.php?c=config&a=ok_hr_employee_sizes_clothes_index_tmp&data=table_index3&redi=1">T3</a></li>
        </ul>





        <?php
        if ($hr_employee_sizes_clothes) {

            switch ($tmp) {
                case 'table_index3':
                    include view("hr_employee_sizes_clothes", "table_index3");
                    break;
                case 'table_index':
                    include view("hr_employee_sizes_clothes", "table_index");
                    break;

                default:
                    include view("hr_employee_sizes_clothes", "table_index");
                    break;
            }
            //
            //
            //
            //
            //
        } else {
            message("info", "No items");
        }
        ?>

        <?php
        /**
         * <div class="container-fluid">
          <div class="col-sm-12 col-md-6 col-lg-6">
          <?php
          $pagination->createHtml();
          ?>
          </div>

          <div class="col-sm-12 col-md-6 col-lg-6 text-right">
          <?php
          include view($c, "form_pagination_items_limit");
          ?>
          </div>
          </div>

         */
        ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 
