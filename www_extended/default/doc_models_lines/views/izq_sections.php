<div class="list-group">
    <a href="index.php?c=doc_models&a=doc&modele=<?php echo $modele; ?>" class="list-group-item">
        <span class="glyphicon glyphicon-file"></span> 
        <?php _t("Document"); ?>
    </a>
</div>





<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <?php _t('Sections'); ?>
    </div>
    <div class="panel-body">
        <p>...</p>
    </div>


    <ul class="list-group">


        <?php
        foreach (doc_sections_list() as $key => $doc_sections) {
            echo '<li class="list-group-item"><a href="index.php?c=doc_models&a=doc&modele=xxxxxxxxx&id=' . $doc_sections['id'] . '">' . $doc_sections['section'] . '</a></li>';
        }
        ?>
    </ul>
</div>

















<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

    <?php
    $open = false;
    $section = false;

    foreach (doc_sections_list() as $key => $doc_sections) {

        echo '    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading_' . $doc_sections["section"] . '">
            <h4 class="panel-title">
                <a class="collapsed"
                   role="button" 
                   data-toggle="collapse" 
                   data-parent="#accordion" 
                   href="#collapse_' . $doc_sections["section"] . '" 
                   aria-expanded="true"
                   aria-controls="collapse_' . $doc_sections["section"] . '">
                    ' . $doc_sections["section"] . '
                </a>
            </h4>
        </div>
        
        <div id="collapse_' . $doc_sections["section"] . '" class="panel-collapse collapse ';

        echo ($doc_sections["section"] == doc_models_lines_field_id('section', $id)) ? ' in ' : '';

        echo '" role="tabpanel" aria-labelledby="heading_' . $doc_sections["section"] . '">
            <div class="panel-body">';

        include view('doc_sections', 'form_edit');

        //doc_models_create_menu($modele, $doc, $doc_sections["section"], $id);

        echo '
            </div>
        </div>
    </div>
    ';

//            $section = $doc_sections['section'];
//        }
    }
    ?>

</div>











<div class="list-group">
    <a href="#" class="list-group-item list-group-item-warning"  data-toggle="modal" data-target="#addSection"">
        <span class="glyphicon glyphicon-plus"></span>
        <?php _t("Add section"); ?>
    </a>
</div>

<!-- Modal -->
<div class="modal fade" id="addSection" tabindex="-1" role="dialog" aria-labelledby="addSectionLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="addSectionLabel">
                    <?php _t("Add new section"); ?>
                </h4>
            </div>
            <div class="modal-body">



                <?php
                include view("doc_sections", 'form_add');
                ?>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




<?php
/**
 * <div class="list-group">
  <a href="index.php?c=doc_models&a=import_from_json&modele=<?php echo $modele; ?>" class="list-group-item">
  <span class="glyphicon glyphicon-download-alt"></span>
  <?php _t("Import from json"); ?>
  </a>
  </div>


 */
?>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<?php /**
  <div class="list-group">
  <a href="#" class="list-group-item  list-group-item-success">
  <?php _t("Elements"); ?>
  </a>

  <?php
  //    $i = 1;
  //    foreach (doc_models_lines_list() as $key => $element_list) {
  //        $selected = ($element_list['id'] == $id) ? " list-group-item-info " : "";
  //        $params = json_decode($element_list['params'], true);
  //        $Cell = $params['Cell'];
  //        $label = $Cell['label'];
  //        echo '  <a href="index.php?c=doc_models&a=edit&id=' . $element_list['id'] . '" class="list-group-item ' . $selected . ' ">' . $element_list['order_by'] . '  ' . $element_list['name'] . ' ' . $label . '</a>';
  //        $i++;
  //    }
  ?>


  <a href="index.php?c=doc_models&a=date" class="list-group-item <?php echo ($a == 'date') ? ' list-group-item-info ' : ""; ?>"><?php _t("Date"); ?></a>



  </div>


  <?php
  vardump($id);
  ?>




  <div class="panel panel-default">

  <ul class="list-group">
  <a href="index.php?c=doc_models&a=doc" class="list-group-item <?php echo ($a == 'doc') ? ' list-group-item-info ' : ""; ?>"><?php _t("Doc"); ?></a>
  <a href="index.php?c=doc_models&a=logo" class="list-group-item <?php echo ($a == 'logo') ? ' list-group-item-info ' : ""; ?>"><?php _t("Logo"); ?></a>
  <a href="index.php?c=doc_models&a=company" class="list-group-item <?php echo ($a == 'company') ? ' list-group-item-info ' : ""; ?>"><?php _t("Company name"); ?></a>
  <a href="index.php?c=doc_models&a=ab" class="list-group-item <?php echo ($a == 'ab') ? ' list-group-item-info ' : ""; ?>"><?php _t("Billing"); ?></a>
  <a href="index.php?c=doc_models&a=ad" class="list-group-item <?php echo ($a == 'ad') ? ' list-group-item-info ' : ""; ?>"><?php _t("Delivery"); ?></a>
  <a href="index.php?c=doc_models&a=date" class="list-group-item <?php echo ($a == 'date') ? ' list-group-item-info ' : ""; ?>"><?php _t("Date"); ?></a>
  <a href="index.php?c=doc_models&a=date_expiration" class="list-group-item <?php echo ($a == 'date_expiration') ? ' list-group-item-info ' : ""; ?>"><?php _t("Expiration Date"); ?></a>
  <a href="index.php?c=doc_models&a=from_budget" class="list-group-item <?php echo ($a == 'from_budget') ? ' list-group-item-info ' : ""; ?>"><?php _t("From budget"); ?></a>
  <a href="index.php?c=doc_models&a=doc_number" class="list-group-item <?php echo ($a == 'doc_number') ? ' list-group-item-info ' : ""; ?>"><?php _t("Doc number"); ?></a>
  <a href="index.php?c=doc_models&a=date_data" class="list-group-item <?php echo ($a == 'date_data') ? ' list-group-item-info ' : ""; ?>"><?php _t("%date%"); ?></a>
  <a href="index.php?c=doc_models&a=from_budget_data" class="list-group-item <?php echo ($a == 'from_budget_data') ? ' list-group-item-info ' : ""; ?>"><?php _t("%from_budget%"); ?></a>
  <a href="index.php?c=doc_models&a=doc_number_data" class="list-group-item <?php echo ($a == 'doc_number_data') ? ' list-group-item-info ' : ""; ?>"><?php _t("%doc_number%"); ?></a>
  <a href="index.php?c=doc_models&a=total" class="list-group-item <?php echo ($a == 'total') ? ' list-group-item-info ' : ""; ?>"><?php _t("Total doc"); ?></a>
  <a href="index.php?c=doc_models&a=total_data" class="list-group-item <?php echo ($a == 'total_data') ? ' list-group-item-info ' : ""; ?>"><?php _t("%total%"); ?></a>
  <a href="index.php?c=doc_models&a=items_title" class="list-group-item <?php echo ($a == 'items_title') ? ' list-group-item-info ' : ""; ?> "><?php _t("Items title"); ?></a>
  <a href="index.php?c=doc_models&a=tax" class="list-group-item <?php echo ($a == 'tax') ? ' list-group-item-info ' : ""; ?> "><?php _t("Tax"); ?></a>
  <a href="index.php?c=doc_models&a=comments" class="list-group-item <?php echo ($a == 'comments') ? ' list-group-item-info ' : ""; ?> "><?php _t("Comments"); ?></a>
  <a href="#" class="list-group-item">Total to pay</a>
  <a href="index.php?c=doc_models&a=bank" class="list-group-item <?php echo ($a == 'bank') ? ' list-group-item-info ' : ""; ?> "><?php _t("Bank"); ?></a>
  <a href="index.php?c=doc_models&a=ce" class="list-group-item <?php echo ($a == 'ce') ? ' list-group-item-info ' : ""; ?> "><?php _t("Ce"); ?></a>
  </div>


  <?php
  vardump($id);
  ?>
 * 
 */ ?>