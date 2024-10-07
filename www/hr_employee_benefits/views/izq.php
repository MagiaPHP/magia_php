<?php 
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-21 12:09:02 
#################################################################################
?>

                
<?php
foreach (panels_search_controller_action_status($c, "index", 1) as $key => $pscas) {
    $panel = new Panels();
    $panel->setPanels($pscas["id"]);
    include $panel->getPanel() . ".php";
}
?>
<?php if (permissions_has_permission($u_rol, "config", "update") && modules_field_module("status", "panels")) { ?>

    <?php  include view("panels", "panel_form_ok_show") ?>

<?php } ?>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'hr_employee_benefits'); ?>
            <?php echo _t("Hr employee benefits"); ?>
    </a>
    <a href="index.php?c=hr_employee_benefits" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "hr_employee_benefits", "create")) { ?>
        <a href="index.php?c=hr_employee_benefits&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_benefits"); ?>
        <?php echo _t("By hr employee benefits"); ?>
    </a>
    <?php
    foreach (hr_employee_benefits_unique_from_col("employee_id") as $employee_id) {
        if ($employee_id['employee_id'] != "") {
            echo '<a href="index.php?c=hr_employee_benefits&a=search&w=by_employee_id&employee_id=' . $employee_id['employee_id'] . '" class="list-group-item">' . $employee_id['employee_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_benefits"); ?>
        <?php echo _t("By hr employee benefits"); ?>
    </a>
    <?php
    foreach (hr_employee_benefits_unique_from_col("benefit_code") as $benefit_code) {
        if ($benefit_code['benefit_code'] != "") {
            echo '<a href="index.php?c=hr_employee_benefits&a=search&w=by_benefit_code&benefit_code=' . $benefit_code['benefit_code'] . '" class="list-group-item">' . $benefit_code['benefit_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_benefits"); ?>
        <?php echo _t("By hr employee benefits"); ?>
    </a>
    <?php
    foreach (hr_employee_benefits_unique_from_col("price") as $price) {
        if ($price['price'] != "") {
            echo '<a href="index.php?c=hr_employee_benefits&a=search&w=by_price&price=' . $price['price'] . '" class="list-group-item">' . $price['price'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_benefits"); ?>
        <?php echo _t("By hr employee benefits"); ?>
    </a>
    <?php
    foreach (hr_employee_benefits_unique_from_col("company_part") as $company_part) {
        if ($company_part['company_part'] != "") {
            echo '<a href="index.php?c=hr_employee_benefits&a=search&w=by_company_part&company_part=' . $company_part['company_part'] . '" class="list-group-item">' . $company_part['company_part'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_benefits"); ?>
        <?php echo _t("By hr employee benefits"); ?>
    </a>
    <?php
    foreach (hr_employee_benefits_unique_from_col("employee_part") as $employee_part) {
        if ($employee_part['employee_part'] != "") {
            echo '<a href="index.php?c=hr_employee_benefits&a=search&w=by_employee_part&employee_part=' . $employee_part['employee_part'] . '" class="list-group-item">' . $employee_part['employee_part'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_benefits"); ?>
        <?php echo _t("By hr employee benefits"); ?>
    </a>
    <?php
    foreach (hr_employee_benefits_unique_from_col("periodicity") as $periodicity) {
        if ($periodicity['periodicity'] != "") {
            echo '<a href="index.php?c=hr_employee_benefits&a=search&w=by_periodicity&periodicity=' . $periodicity['periodicity'] . '" class="list-group-item">' . $periodicity['periodicity'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_benefits"); ?>
        <?php echo _t("By hr employee benefits"); ?>
    </a>
    <?php
    foreach (hr_employee_benefits_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=hr_employee_benefits&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_benefits"); ?>
        <?php echo _t("By hr employee benefits"); ?>
    </a>
    <?php
    foreach (hr_employee_benefits_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=hr_employee_benefits&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

