<button 
    type="button" 
    class="btn btn-danger" 
    data-toggle="modal" 
    data-target="#addToMycontacts_<?php echo $contact["tva"]; ?>">
        <?php _t("Next"); ?> 
    <span class="glyphicon glyphicon-chevron-right"></span>
</button>

<div class="modal fade" id="addToMycontacts_<?php echo $contact["tva"]; ?>" tabindex="-1" role="dialog" aria-labelledby="addToMycontactsLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="addToMycontactsLabel">
                    <?php _t("Add to my contacts"); ?><?php //echo $contact["tva"];        ?></h4>
            </div>
            <div class="modal-body">

                <h3>
                    <p><b><?php echo $contact["name"]; ?></b></p>
                </h3>    

                <p><?php _t('Vat'); ?> : <?php echo $contact["tva"]; ?></p>
                <p>

                    <?php echo $address_by_contact["number"]; ?>
                    <?php echo $address_by_contact["address"]; ?> <br>
                    <?php echo $address_by_contact["postcode"]; ?> 
                    <?php echo $address_by_contact["city"]; ?> <br>
                    <?php echo countries_field_country_code('countryName', $address_by_contact["country"]); ?> 
                </p>
            </div>

            <div class="modal-footer">

                <?php
                /**
                 * 
                  <a href="index.php?c=cloud&a=ok_add_from_cloud&tva=<?php echo $contact["tva"]; ?>"
                  class="btn btn-default"
                  >
                  <?php _t("Add to may contacts"); ?>
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
                 */
                ?>

                <a href="index.php?c=cloud&a=ok_cloud_company_add_from_cloud_json&json=xx&tva=<?php echo $contact["tva"]; ?>" 
                   class="btn btn-primary"
                   >
                       <?php _t("New budget"); ?>
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>



                <a href="index.php?c=cloud&a=ok_cloud_company_add_from_cloud_json&json=xx&tva=<?php echo $contact["tva"]; ?>" 
                   class="btn btn-primary"
                   >
                       <?php _t("New invoice"); ?>
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>



            </div>
        </div>
    </div>
</div>

<?php /**
 * <a href="index.php?c=contacts&a=cloud_add_company&tva=' . $contact["tva"] . '">add company</a>
 */ ?>