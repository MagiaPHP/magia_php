<?php include "modal_contacts_picture.php"; ?>
<?php 
/**
 * 
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">

            <?php _t("Headoffice"); ?>: 
        </h3>
    </div>
    <div class="panel-body">

        <p>
            <a href="index.php?c=contacts&a=details&id=<?php echo contacts_field_id("owner_id", $id); ?>">
                <?php _menu_icon("top", "contacts"); ?>
                <?php echo contacts_formated(contacts_field_id("owner_id", $id)) ?>
            </a>
        </p>


    </div>
</div>
 */
?>



<div class="list-group">
    <h4 class="list-group-item active">
        <span class="glyphicon glyphicon-home"></span> 
        <?php echo contacts_formated($id); ?>
    </h4>

    <?php if (permissions_has_permission($u_rol, "contacts", "read")) { ?>
        <a href="index.php?c=contacts&a=details&id=<?php echo $id; ?>" class="list-group-item <?php if($a=="details"){ echo ' list-group-item-info '; }?>">
            <?php _menu_icon("top", "contacts"); ?>
            <?php _t("Details"); ?> <?php echo $id; ?> 
        </a>
    <?php } ?>

    <?php if (permissions_has_permission($u_rol, "orders", "read") && modules_field_module('status', 'audio')) { ?>
        <a href="index.php?c=contacts&a=orders_by_office&id=<?php echo $id; ?>&status=70" class="list-group-item <?php if($a=="orders"){ echo ' list-group-item-info '; }?>">
            <?php _menu_icon("top", "orders"); ?>
            <?php _t("Orders by office"); ?>
        </a>
    <?php } ?>


    <?php if (permissions_has_permission($u_rol, "contacts", "read")) { ?>
        <a href="index.php?c=contacts&a=contacts&id=<?php echo "$id"; ?>" class="list-group-item <?php if($a=="contacts"){ echo ' list-group-item-info '; }?>">
            <?php _menu_icon("top", "contacts"); ?>
            <?php _t("Contacts"); ?>
        </a>
    <?php } ?>




    <?php if (permissions_has_permission($u_rol, "contacts", "read")) { ?>
        <a href="index.php?c=contacts&a=offices&id=<?php echo "$id"; ?>" class="list-group-item <?php if($a=="offices"){ echo ' list-group-item-info '; }?>" >
            <?php _menu_icon("top", "contacts"); ?>
            <?php _t("Offices"); ?>
        </a>
    <?php } ?>





    <?php /* <a href="index.php?c=contacts&a=patients&id=<?php echo "$id" ; ?>" class="list-group-item"><?php _t("Patients") ; ?></a>
      <a href="index.php?c=contacts&a=employees&id=<?php echo "$id" ; ?>" class="list-group-item"><?php _t("Employees") ; ?></a>
     */ ?>


    <?php if (permissions_has_permission($u_rol, "directory", "read")) { ?>
        <a href="index.php?c=contacts&a=directory&id=<?php echo "$id"; ?>" class="list-group-item <?php if($a=="directory"){ echo ' list-group-item-info '; }?>">
            <?php _menu_icon("top", "directory"); ?>
            <?php _t("Directory"); ?>
        </a>
    <?php } ?>


    <?php if (permissions_has_permission($u_rol, "addresses", "read")) { ?>
        <a href="index.php?c=contacts&a=addresses&id=<?php echo "$id"; ?>" class="list-group-item <?php if($a=="addresses"){ echo ' list-group-item-info '; }?>">
            <?php _menu_icon("top", "addresses"); ?>
            <?php _t("Addresses"); ?>
        </a>
    <?php } ?>


    <?php if (permissions_has_permission($u_rol, "banks", "read")) { ?>
        <a href="index.php?c=contacts&a=banks&id=<?php echo "$id"; ?>" class="list-group-item <?php if($a=="banks"){ echo ' list-group-item-info '; }?>">
            <?php _menu_icon("top", "banks"); ?>
            <?php _t("Banks"); ?>
        </a>
    <?php } ?>


    <?php if (permissions_has_permission($u_rol, "invoices", "read")  && $id != $u_owner_id) { ?>
        <a href="index.php?c=contacts&a=invoices&id=<?php echo "$id"; ?>" class="list-group-item <?php if($a=="invoices"){ echo ' list-group-item-info '; }?>">
            <?php _menu_icon("top", "invoices"); ?>
            <?php _t("Invoices"); ?>
        </a>
    <?php } ?>   




    <?php if (permissions_has_permission($u_rol, "budgets", "read")  && $id != $u_owner_id) { ?>
        <a href="index.php?c=contacts&a=budgets&id=<?php echo "$id"; ?>" class="list-group-item <?php if($a=="budgets"){ echo ' list-group-item-info '; }?>">
            <?php _menu_icon("top", "budgets"); ?>
            <?php _t("Budgets"); ?>
        </a>
    <?php } ?>   


    <?php if (permissions_has_permission($u_rol, "balance", "read")  && $id != $u_owner_id) { ?>
        <a href="index.php?c=contacts&a=balance&id=<?php echo "$id"; ?>" class="list-group-item <?php if($a=="balance"){ echo ' list-group-item-info '; }?>">
            <?php _menu_icon("top", "balance"); ?>
            <?php _t("Balance"); ?>
        </a>
    <?php } ?>   


    <?php if (permissions_has_permission($u_rol, "proddducts", "read")  && $id != $u_owner_id) { ?>
        <a href="index.php?c=contacts&a=products&id=<?php echo "$id"; ?>" class="list-group-item <?php if($a=="products"){ echo ' list-group-item-info '; }?>">
            <?php _menu_icon("top", "products"); ?>
            <?php _t("Products"); ?>
        </a>
    <?php } ?>   

    <?php if (permissions_has_permission($u_rol, "reminders_invoices", "read")  && $id != $u_owner_id) { ?>
        <a href="index.php?c=contacts&a=reminders&id=<?php echo "$id"; ?>" class="list-group-item <?php if($a=="reminders"){ echo ' list-group-item-info '; }?>">
            <?php _menu_icon("top", "reminders_invoices"); ?>
            <?php _t("Reminders"); ?>
        </a>
    <?php } ?>   

    <?php if (modules_field_module('status', 'subddddomains') == 1) { ?>
        <a href="index.php?c=contacts&a=subdomain&id=<?php echo "$id"; ?>" class="list-group-item <?php if($a=="subdomain"){ echo ' list-group-item-info '; }?>">
            <?php _menu_icon("top", "subdomains"); ?>
            <?php _t("Subdomain"); ?>
        </a>
    <?php } ?>   


    <?php
    /*        <a href="index.php?c=contacts&a=factux&id=<?php echo "$id"; ?>" class="list-group-item <?php if($a=="orders"){ echo ' list-group-item-info '; }?>">
      <?php _menu_icon("top", "factux"); ?>
      <?php _t("Factux"); ?>
      </a>

     */
    ?>

</div>
