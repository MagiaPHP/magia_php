<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-md-3 col-lg-2">
        <?php // include view("invoices", "izq"); ?>
    </div>
    <div class="col-md-9 col-lg-10">

        <?php include view("invoices", "nav2"); ?>


        <?php
        if ($_REQUEST && $error) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php //include view("invoices", "top"); ?>


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>1</th>
                    <th>Orden</th>
                    <th>antes</th>
                    <th>val</th>
                    <th>despues</th>
                    <th>despues</th>
                </tr>
            </thead>



            <form method="post" action="index.php">
                <input type="hidden" name="c" value="invoices">
                <input type="hidden" name="a" value="ok_index_cols_to_show">
                <input type="hidden" name="redi[redi]" value="2">

                <?php
                $invoices_db_col_list_from_table = invoices_db_col_list_from_table($c);

                //Agrego a las columnas las de l directroy
                $array_btn = array(
                    'button_details',
                    'button_pay',
                    'button_edit',
                    'button_print',
                    'button_save',
                );
                foreach ($array_btn as $key => $button) {
                    array_push($invoices_db_col_list_from_table, $button);
                }

                $i = 0;

                foreach ($invoices_db_col_list_from_table as $key => $cdbcts) {

                    $invoices_index_cols_to_show_array = json_decode(_options_option('invoices_index_cols_to_show'), true);

                    if ($invoices_index_cols_to_show_array) {
                        $checked = ( in_array($cdbcts, $invoices_index_cols_to_show_array) ) ? " checked " : "";
                    } else {
                        $checked = '';
                    }

                    $menu_order = '';

                    echo '<tr>
                    <td>
                        <div class="row">                            
                            <div class="col-xs-6 col-md-6 col-lg-6">
                                 <div class="checkbox">
                                    <label>
                                      <input type="checkbox" name="data[]" value="' . $cdbcts . '" ' . $checked . ' > ' . _tr(ucfirst($cdbcts)) . '
                                    </label>
                                  </div>                              
                            </div>
                        </div>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>            <button type="submit" class="btn btn-default">
                <?php echo icon("ok"); ?> 
                ' . _tr("Submit") . '
            </button></td>
                        </tr>
';
                }
                ?>



            </form>




        </table>



        <?php
//        if ($invoices) {
//            include "part_index.php";
//            // la paginacion esa dentro 
//        } else {
//            message('info', 'No invoices was found');
//        }
        ?>

    </div>
</div>

<?php include view("home", "footer"); ?> 




