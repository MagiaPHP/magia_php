<?php
//vardump($line);
//vardump($fel2);
//vardump($form_edit->getLines());

if ($line) {



    $fle2 = new Forms_lines2();
    $fle2->setForms_lines($f_line['id']);

    switch ($fle2->getM_type()) {
        case 'hidden':
            include "form_type.php";
            echo "<br>";
            include "form_text.php";
            include "form_label.php";
            include "form_name.php";
            include "form_value.php";
            include "form_placeholder.php";
            include "form_col_external.php";
            include "form_form.php";
            include "form_id.php";
            include "form_mandatory.php";
            include "form_only_read.php";
            include "form_order_by.php";
            include "form_selected.php";
            include "form_status.php";
            include "form_table_external.php";
            include "form_text.php";
            echo "<br><br>";
            include "form_delete_line.php";
            break;

        case '':
        case 'text':
        case 'email':
        case 'date': // --------------------------------------------------------DATE
            include "form_type.php";
            echo "<br>";
//          include "form_text.php";
            include "form_label.php";
            include "form_name.php";
            include "form_value.php";
            include "form_placeholder.php";
//          include "form_col_external.php";
//          include "form_form.php";
//          include "form_id.php";
            include "form_mandatory.php";
            include "form_only_read.php";
            include "form_order_by.php";
//          include "form_selected.php";
            include "form_status.php";
//          include "form_table_external.php";
//          include "form_text.php";
            echo "<br><br>";
            include "form_delete_line.php";
            break;

        case 'check': // --------------------------------------------------------check
        case 'radio': // --------------------------------------------------------radio
            include "form_type.php";
//          include "form_text.php";
            include "form_label.php";
            include "form_name.php";
//          include "form_value.php";
//          include "form_placeholder.php";
//          include "form_col_external.php";
//          include "form_form.php";
//          include "form_id.php";
            include "form_mandatory.php";
//          include "form_only_read.php";
//          include "form_selected.php";
            include "form_status.php";
            echo "<br>";
            include "part_nav.php";
            if ($fle2->getM_options_values()) {
//                include "form_items.php";
//                include "form_table_external.php";
//                include "form_col_external.php";
//                include "form_label_external.php";
//                include "form_options_values.php";
            } else {
//                include "form_items.php";
//                include "form_table_external.php";
//                include "form_col_external.php";
//                include "form_label_external.php";
//                include "form_options_values.php";
            }
//          include "form_text.php";
            include "form_order_by.php";
            echo "<br><br>";
            include "form_delete_line.php";
            break;

        case 'select': //-------------------------------------------------------SELECT
            include "form_type.php";
            echo "<br>";
//          include "form_text.php";
            include "form_label.php";
            include "form_name.php";
//          include "form_value.php";
//          include "form_placeholder.php";
//          include "form_form.php";
//          include "form_id.php";
            include "form_mandatory.php";
//          include "form_only_read.php";
//          include "form_selected.php";
//          include "form_status.php";
            include "part_nav.php";
//          include "form_text.php";
            include "form_order_by.php";
            echo "<br><br>";
            include "form_delete_line.php";
            break;

        case 'textarea'://------------------------------------------------------TEXTAREA
            include "form_type.php";
            echo "<br>";
//          include "form_text.php";
            include "form_label.php";
            include "form_name.php";
//          include "form_value.php";
            include "form_placeholder.php";
//          include "form_col_external.php";
//          include "form_form.php";
//          include "form_id.php";
            include "form_mandatory.php";
            include "form_only_read.php";
            include "form_order_by.php";
//          include "form_selected.php";
//          include "form_status.php";
//          include "form_table_external.php";
//          include "form_text.php";
            echo "<br><br>";
            include "form_delete_line.php";
            break;

        case 'submit'://-------------------------------------------------------- BTN SUBMIT
            include "form_type.php";
            echo "<br>";
//          include "form_text.php";
            include "form_label.php";
            include "form_name.php";
            include "form_class.php";
//          include "form_value.php";
//          include "form_placeholder.php";
//          include "form_col_external.php";
//          include "form_form.php";
//          include "form_id.php";
//          include "form_mandatory.php";
            include "form_only_read.php";
            include "form_order_by.php";
//          include "form_selected.php";
//          include "form_status.php";
//          include "form_table_external.php";
//          include "form_text.php";
            echo "<br><br>";
            include "form_delete_line.php";
            break;

        default:
            break;
    }
}



// fin isset(line)
//
//
//vardump('robinons');

/**


  $form_pages = array(
  "form",
  "type",
  "label",
  "name",
  //    "id",
  "class",
  "table_external",
  "col_external",
  "placeholder",
  "value",
  "only_read",
  "selected",
  "disabled",
  "mandatory",
  "order_by",
  "status",
  );

  foreach ($form_pages as $key => $form_page) {
  //    vardump($form_page);
  $fl = new Forms_lines();
  $fle2->setForms_lines($line);

  switch ($fle2->getM_type()) {
  case 'text':
  include "form_text.php";

  break;

  default:
  break;
  }

  vardump($fl);

  //    include "form_" . $form_page . ".php";
  echo "<br>";
  }
  ?>



  <?php
  vardump($form_pages);
  ?>
 * 
 */
?>
<br><br>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Panel title</h3>
    </div>
    <div class="panel-body">    
        <?php forms_insert_in_page(2); ?>
    </div>
</div>
