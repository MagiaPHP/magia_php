<?php
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-24 09:08:35 

$magia_form = new Magia_form();
$magia_form->setMagia_forms(2);
$magia_form->setlines();
?>
<form class="form-horizontal" action="index.php" method="post" >

    <input type="hidden" name="c" value="glosario">
    <input type="hidden" name="a" value="ok_edit">

    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

    <?php
    $html = '';
    foreach ($magia_form->getLines() as $key => $line) {


        $mg_line = new Magia_form_line();
        $mg_line->setMagia_forms_lines($line['id']);

        //vardump($mg_line->getId());

        $mg_required = ($mg_line->getMg_required()) ? ' required="" ' : "";
        $mg_disabled = ($mg_line->getMg_disabled()) ? ' disabled="" ' : "";
        $mg_help_text = ($mg_line->getMg_help_text()) ? '<p class="help-block">' . $mg_line->getMg_help_text() . "</p>" : "";

        $link_config = '<a href="index.php?c=' . $c . '&a=' . $a . '&id=' . $glosario->getId() . '&config=1&form_id=' . $magia_form->getId() . '&line_id=' . $mg_line->getId() . '">' . $mg_line->getMg_label() . '</a>';
        // si tienes permiso para la configuracion 
        $mg_label = (permissions_has_permission($u_rol, 'config', 'update')) ? $link_config : $mg_line->getMg_label();

        //vardump($mg_line->getMg_type()); 


        switch ($mg_line->getMg_type()) {

            case 'hidden':

                $html = '<?php # ' . $mg_line->getMg_name() . ' ?>
                <div class="form-group">
                   <label class="control-label col-sm-3" for="phrase">' . _tr($mg_label) . '</label>
                   <input type="hidden" name="' . $mg_line->getMg_name() . '" value="' . $mg_line->getMg_value() . '">
                </div>
                <?php # /' . $mg_line->getMg_name() . ' ?>';

                break;
            //
            //
            //
            //

            case 'text':
            case 'email':
            case 'date':
            case 'number':

                $html = '<?php # ' . $mg_line->getMg_name() . ' ?>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="phrase">' . _tr($mg_label) . '</label>
                    <div class="col-sm-8">
                        <input 
                        type="' . $mg_line->getMg_type() . '" 
                        name="' . $mg_line->getMg_name() . '" 
                        class="' . $mg_line->getMg_class() . '" 
                        id="phrase" 
                        placeholder="' . _tr($mg_line->getMg_placeholder()) . '" 
                        value="' . $mg_line->getMg_value() . '" 
                        ' . $mg_required . '
                        ' . $mg_disabled . '
                        >
                        ' . $mg_help_text . '
                    </div>	
                </div>
                <?php # /phrase ?>';

                break;

            ////////////////////////////////////////////////////////////////////
            case 'textarea';

                $html = '<?php # phrase ?>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="phrase">' . _tr($mg_label) . '</label>
                    <div class="col-sm-8">           
                        <textarea 
                        class="form-control" 
                        name="' . $mg_line->getMg_name() . '" id="' . $mg_line->getMg_id() . '" rows="3" ' . $mg_required . ' ' . $mg_disabled . '>' . $mg_line->getMg_value() . '</textarea>
                        ' . $mg_help_text . '
                    </div>	
                </div>
                <?php # /phrase ?>';
                break;

            ////////////////////////////////////////////////////////////////////
            case 'select';

                $html = '<?php # phrase ?>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="phrase">' . _tr($mg_label) . '</label>
                    <div class="col-sm-8">           
                        <sesslect name="' . $mg_line->getMg_name() . '" class="' . $mg_line->getMg_class() . '" id="' . $mg_line->getMg_id() . '" >  ';

                foreach (magia_db_col_list_from_table($mg_line->getMg_external_table()) as $key => $col) {

                    $col_selected = ($col == $mg_line->getMg_external_col()) ? ' selected="" ' : '';

                    $values_from_table = magia_db_values_from_col_by_table_col($mg_line->getMg_external_table(), $mg_line->getMg_external_col());

                    $html .= '<optssion value="' . $col[0] . '">' . ($values_from_table[$mg_line->getMg_external_col()]) . '</option>';
                }


                //                foreach (magia_db_col_list_from_table($mg_line->getMg_external_table()) as $key => $col) {
                //
                //                    $col_selected = ($col == $mg_line->getMg_external_col()) ? ' selected="" ' : '';
                //
                //                    echo '<option value="' . $col . '">' . $col . '</option>';
                //                }


                $html .= '</select>
                        ' . $mg_help_text . '


                    </div>	
                </div>
                <?php # /phrase ?>';

                break;

            default:
                break;
        }

        echo $html;
    }
    ?>



    <?php
    /**
     *     <?php # phrase  ?>
      <div class="form-group">
      <label class="control-label col-sm-3 " for="phrase"><?php _t("Add field"); ?></label>
      <div class="col-sm-8">
      <div class="panel panel-default">
      <div class="panel-body text-center">
      <a href="index.php?c=glosario&a=add&config=true">
      <?php echo icon("plus"); ?>
      <?php echo _t("Add field"); ?>
      </a>
      </div>
      </div>
      </div>
      </div>
      <?php # /phrase  ?>
     */
    ?>


    <?php
    /**
     * 
      <?php # phrase  ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="phrase"><?php _t("Phrase"); ?></label>
      <div class="col-sm-8">
      <input type="text" name="phrase" class="form-control" id="phrase" placeholder="phrase" value="" >
      </div>
      </div>
      <?php # /phrase  ?>

      <?php # description  ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
      <div class="col-sm-8">
      <textarea name="description" class="form-control" id="description" placeholder="description - textarea" ></textarea>    <script>
      ClassicEditor
      .create(document.querySelector('#'.description.''))
      .catch(error => {
      console.error(error);
      });
      </script>
      </div>
      </div>
      <?php # /description  ?>

      <?php # date_registre  ?>
      <?php # order_by  ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
      <div class="col-sm-8">
      <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
      </div>
      </div>
      <?php # /order_by  ?>

      <?php # status  ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
      <div class="col-sm-8">
      <select name="status" class="form-control" id="status" >
      <option value="1"><?php echo _t("Actived"); ?></option>
      <option value="0"><?php echo _t("Blocked"); ?></option>
      </select>
      </div>
      </div>
      <?php # /status  ?>


     */
    ?>









    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>
