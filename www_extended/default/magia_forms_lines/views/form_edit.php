<?php
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-24 09:08:25 

$magia_form = new Magia_form();
$magia_form->setMagia_forms($arg['form_id']);
$magia_form->setlines();

$magia_forms_lines = new Magia_form_line();
$magia_forms_lines->setMagia_forms_lines($arg['line_id']);

//vardump($arg);

?>


<form class="form-horizontal" action="index.php" method="post" >

    <input type="hidden" name="c" value="magia_forms_lines">
    <input type="hidden" name="a" value="ok_edit">

    <input type="hidden" name="id" value="<?php echo $magia_forms_lines->getId(); ?>">
    <input type="hidden" name="mg_form_id" value="<?php echo $magia_forms_lines->getMg_form_id(); ?>">

    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">
    <input type="hidden" name="redi[c]" value="<?php echo $arg["c"]; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo $arg["a"]; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo $arg["params"] ?>">

    <?php
    /**
     *     <?php # mg_form_id         ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="mg_form_id"><?php _t("Form id"); ?></label>
      <div class="col-sm-8">
      <select name="mg_form_id" class="form-control selectpicker" id="mg_form_id" data-live-search="true" >
      <?php
      // 1 param : value
      // 2 param : array() values from table to show like label
      // 3 param : value selected by default
      // 4 param : array() values disabled

      magia_forms_select("id", array("id"), $magia_forms_lines->getMg_form_id(), array());
      ?>
      </select>
      </div>
      </div>
      <?php # /mg_form_id        ?>
     */
    ?>



    <?php # mg_type          ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_type"><?php _t("Type"); ?></label>
        <div class="col-sm-8">
            <select name="mg_type" class="form-control selectpicker" id="mg_type" data-live-search="true" >
                <?php
                foreach (magia_forms_types_list() as $key => $mftl) {
                    $mg_type_selected = ($mftl['type'] == $magia_forms_lines->getMg_type() ) ? ' selected ' : '';
                    echo '<option value="' . $mftl['type'] . '" ' . $mg_type_selected . '>' . $mftl['type'] . '</option>';
                }
                ?>
            </select>
        </div>	
    </div>
    <?php # /mg_type            ?>

    <?php
    /**
     *   'Field' => 'id',
      0 => 'id',
      'Type' => 'int(11)',
      1 => 'int(11)',
      'Null' => 'NO',
      2 => 'NO',
      'Key' => 'PRI',
      3 => 'PRI',
      'Default' => NULL,
      4 => NULL,
      'Extra' => 'auto_increment',
      5 => 'auto_increment',
     * 
     */
    //   vardump(magia_db_show_col_from_table('contacts'));
    ?>


    <?php
// si es select, valores o tabla? 
//vardump(magia_db_tables_from_db()); 
    ?>




    <?php # mg_type              ?>
    <?php
    // solo si el typo es <select>
    //vardump($magia_forms_lines->getMg_type());

    if ($magia_forms_lines->getMg_type() == "select") {
        ?>
        <div class="form-group">
            <label class="control-label col-sm-3" for="mg_type"><?php _t("External"); ?></label>
            <div class="col-sm-8">
                <select name="mg_external[]" class="form-control selectpicker" id="mg_external" data-live-search="true" >

                    <?php
                    foreach (magia_db_tables_from_db() as $key => $db_table) {

                        //vardump($db_table); 
                        //$mg_type_selected = ($mftl['type'] == $magia_forms_lines->getMg_type() ) ? ' selected ' : '';
                        //echo '<option value="' . $db_table[0] . '">' . $db_table[0] . '</option>';

                        echo '<optgroup label="' . $db_table[0] . '">';

                        foreach (magia_db_show_col_from_table($db_table[0]) as $key => $col_from_table) {

                            $col_from_table_selected = ($col_from_table['Field'] == $magia_forms_lines->getMg_type() ) ? ' selected ' : '';

                            echo '<option value="' . $db_table[0] . ',' . $col_from_table['Field'] . '" ' . $col_from_table_selected . '>' . $db_table[0] . ' : ' . $col_from_table['Field'] . '</option>';
                        }

                        echo '</optgroup>';
                    }
                    ?>
                </select>


            </div>	
        </div>

    <?php } else { ?>
        <input type="hidden" name="mg_external[]" value="null">
    <?php } ?>

    <?php # /mg_type             ?>







    <?php # mg_label                  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_label"><?php _t("Label"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="mg_label" class="form-control" id="mg_label" placeholder="mg_label" value="<?php echo $magia_forms_lines->getMg_label(); ?>" >
        </div>	
    </div>
    <?php # /mg_label                  ?>


    <?php # help_text              ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_help_text"><?php _t("Help text"); ?></label>
        <div class="col-sm-8">
            <textarea name="mg_help_text" class="form-control" id="mg_help_text" placeholder="mg_help_text - textarea" ><?php echo $magia_forms_lines->getMg_help_text(); ?></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.help_text.''))
                        .catch(error => {
                            console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /help_text               ?>



    <?php # mg_name                ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="mg_name" class="form-control" id="mg_name" placeholder="mg_name" value="<?php echo $magia_forms_lines->getMg_name(); ?>" >
        </div>	
    </div>
    <?php # /mg_name                  ?>

    <?php # mg_id             ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="mg_id" class="form-control" id="mg_id" placeholder="mg_id" value="<?php echo $magia_forms_lines->getMg_id(); ?>" >
        </div>	
    </div>
    <?php # /mg_id                  ?>

    <?php # mg_placeholder             ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_placeholder"><?php _t("Placeholder"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="mg_placeholder" class="form-control" id="mg_placeholder" placeholder="mg_placeholder" value="<?php echo $magia_forms_lines->getMg_placeholder(); ?>" >
        </div>	
    </div>
    <?php # /mg_placeholder                  ?>

    <?php # mg_value             ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_value"><?php _t("Value"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="mg_value" class="form-control" id="mg_value" placeholder="mg_value" value="<?php echo $magia_forms_lines->getMg_value(); ?>" >
        </div>	
    </div>
    <?php # /mg_value                  ?>

    <?php # mg_class             ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_class"><?php _t("Class"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="mg_class" class="form-control" id="mg_class" placeholder="mg_class" value="<?php echo $magia_forms_lines->getMg_class(); ?>" >
        </div>	
    </div>
    <?php # /mg_class                  ?>


    <?php # mg_required               ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_required"><?php _t("Required"); ?></label>
        <div class="col-sm-8">
            <select name="mg_required" class="form-control" id="mg_required" >                
                <option value="1" <?php echo ($magia_forms_lines->getMg_required() == 1 ) ? ' selected ' : ""; ?>><?php echo _t("Yes"); ?></option>
                <option value="0" <?php echo ($magia_forms_lines->getMg_required() == 0 ) ? ' selected ' : ""; ?>><?php echo _t("No"); ?></option>

            </select>
        </div>	
    </div>
    <?php # /mg_required                ?>

    <?php # mg_disabled           ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_disabled"><?php _t("Disabled"); ?></label>
        <div class="col-sm-8">
            <select name="mg_disabled" class="form-control" id="mg_disabled" >                
                <option value="1" <?php echo ($magia_forms_lines->getMg_disabled() == 1 ) ? ' selected ' : ""; ?>><?php echo _t("Yes"); ?></option>
                <option value="0" <?php echo ($magia_forms_lines->getMg_disabled() == 0 ) ? ' selected ' : ""; ?>><?php echo _t("No"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /mg_disabled                ?>




    <?php # order_by                  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $magia_forms_lines->getOrder_by(); ?>" >
        </div>	
    </div>
    <?php # /order_by                  ?>

    <?php # status             ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1" <?php echo ($magia_forms_lines->getStatus() == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($magia_forms_lines->getStatus() == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status                  ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("pencil"); ?> <?php _t("Save"); ?></button>
        </div>      							
    </div>      							

</form>

