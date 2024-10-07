<?php if (IS_MULTI_VAT) { ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php _t("My companies"); ?>
        </div>
        <div class="panel-body">
            
            <form class="form-inline" action="index.php" method="get">
                
                <input type="hidden" name="c" value="contacts">
                <input type="hidden" name="a" value="<?php echo $a; ?>">
                
                <div class="form-group">
                    <label for="id" class="sr-only"><?php _t("Company"); ?></label>
                    <select 

                        class="form-control selectpicker" id="id" data-live-search="true"
                        name="id"
                        >
                            <?php
                            foreach (offices_list_by_headoffice($u_owner_id) as $key => $office) {
                                
                                $my_office_selected = ($office['id'] == $id) ? " selected " : "";
                                
                                echo '<option value="' . $office['id'] . '"  ' . $my_office_selected . '>' . contacts_formated($office['id']) . '</option>';
                            }
                            ?>
                    </select>
                </div>
            
                <button type="submit" class="btn btn-default">
                    <?php echo icon("refresh"); ?> 
                    <?php _t("Change"); ?>
                </button>
                
            </form>
            
            
        </div>
    </div>
<?php } ?>


<?php
// crea html 
if (modules_field_module("status", "tasks") && permissions_has_permission($u_rol, "tasks", "read")) {
    $args = array(
        "c" => $c,
        "name" => 'robinson',
        "id" => $id,
        "form" => array(
            "category_id" => null,
            "contact_id" => $u_id,
            "controller" => $c,
            "doc_id" => $id,
            "redi" => array(
                "redi" => "40",
                "c" => $c,
                "id" => $id
            )
        ),
    );

    tasks_create_html('tmp_der_details', $args);
}
?>







<?php
/**
 * <div class="panel panel-default">
  <div class="panel-heading">Factux</div>
  <div class="panel-body">
  <h3><?php echo $company->getName(); ?></h3>
  <p><?php _t("Vat number");?>: <?php echo $company->getTva(); ?></p>
  <p>208, av de la liberte</p>
  <p>1081 koekelberg</p>
  <p>Bruxelles - Belgique</p>
  <p>Tel: </p>
  <p>Que es esto?</p>
  </div>
  </div>
 */
?>

<?php
//vardump($company);
?>


<?php
/**
 * 
  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _t("New document");?>
  </a>
  <a href="#" class="list-group-item"><?php _t("New invoice");?></a>
  <a href="#" class="list-group-item">Morbi leo risus</a>
  <a href="#" class="list-group-item">Porta ac consectetur ac</a>
  <a href="#" class="list-group-item">Vestibulum at eros</a>
  </div>


 */
?>












<?php if (modules_field_module('status', 'subdomain')) { ?>
    <h3>
        Subdomain
        <small>Factux</small>
    </h3>
    <p>
        <?php
//    vardump($company->Why_can_not_add_to_cloud());
        //vardump(cloud_company_details_by_tva($company->getTva()));
        if (cloud_company_details_by_tva($company->getTva())) {
            echo '' . $company->getName() . ', ya esta';

            vardump($company->Why_can_not_add_to_cloud());
        } else {
            echo '' . $company->getName() . ', no esta registrada    ';
        }
        ?>
    </p>
    <a href="index.php?c=contacts" class="btn btn-primary"><?php _t("Add to cloud"); ?></a>
<?php } ?>