<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("providers", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">
        <?php include view("providers", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <?php
        if ($providers) {
            // include view("providers", "table_index");
        } else {
            message("info", "No items");
        }
        ?>


        <div class="row">



            <div class="col-sm-6 col-md-3 col-lg-3">

                <div class="panel panel-default">                    
                    <div class="panel-heading">
                        <?php _t("Providers"); ?>
                    </div>
                    <div class="panel-body">
                        <p></p>
                    </div>                   
                    <ul class="list-group">
                        <li class="list-group-item"><a href="index.php?c=expenses&a=add_provider"><?php _t('Add provider'); ?></a></li>
                    </ul>
                </div>


            </div>


            <div class="col-sm-6 col-md-3 col-lg-3">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php
//                        if (modules_field_module('status', "docu")) {
//                            echo docu_modal_bloc($c, $a, 'form_add_contact_like_provider');
//                        }

                        _t("My contacts list");
                        ?>
                    </div>
                    <div class="panel-body">
                        <p>
                            <?php _t("Add one of my contacts as a provider"); ?>
                        </p>

                        <?php include view('expenses', 'form_add_contact_like_provider'); ?>
                    </div>
                </div>



            </div>



        </div>








        <?php
        /**
         *         <div class="container-fluid">
          <div class="col-sm-12 col-md-6 col-lg-6">
          <?php
          $pagination->createHtml();
          ?>
          </div>

          <div class="col-sm-12 col-md-6 col-lg-6 text-right">
          <?php
          //                    $redi = 1;
          include view("providers", "form_pagination_items_limit", $redi = 1);
          ?>
          </div>
          </div>
         */
        ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 
