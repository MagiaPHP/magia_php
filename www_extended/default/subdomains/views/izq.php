<?php
# MagiaPHP 
# file date creation: 2023-09-13 
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Sub domains"); ?>
    </div>        
    <div class="list-group">
        <?php
        foreach (_menus_list_by_location('subdomains001') as $key => $subdomains001) {

            $icon_subdomains001 = ($subdomains001['icon']) ? '<span class="' . $subdomains001['icon'] . '"></span>' : "";

            echo '<a href="' . $subdomains001['url'] . '" class="list-group-item ">' . $icon_subdomains001 . ' ' . $subdomains001['label'] . '</a>';
        }
        ?>                       
    </div>
</div>







<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="config">
    <input type="hidden" name="a" value="ok_config_sides">
    <input type="hidden" name="redi" value="1">

    <input type="hidden" name="config_c" value="<?php echo $c; ?>">
    <input type="hidden" name="config_a" value="<?php echo $a; ?>">
    <input type="hidden" name="config_side" value="2">


    <?php # controller ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="config_controller"><?php _t("Controller"); ?></label>
        <div class="col-sm-8">
            <select name="config_controller" class="form-control selectpicker" id="config_controller" data-live-search="true" >
                <?php
                echo '<option value="">' . _tr('Select one') . '</option>';
                foreach (controllers_list() as $key => $value) {
                    echo '<option value="' . $value['controller'] . '">' . $value['controller'] . '</option>';
                }
                ?>                        
            </select>
        </div>	
    </div>
    <?php # /controller   ?>

    <?php # views  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="config_views"><?php _t("Views"); ?></label>
        <div class="col-sm-8">
            <select name="config_views" class="form-control selectpicker" id="config_views" data-live-search="true" >
                <?php
                echo '<option value="">' . _tr('Select one') . '</option>';
                foreach (views_list_by_controller($c) as $vlbc) {
                    echo '<option value="' . $vlbc . '">' . $vlbc . '</option>';
                }
                ?>                        
            </select>
        </div>	
    </div>
    <?php # /views    ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							
</form>

















<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'subdomains'); ?>
        <?php echo _t("Subdomains"); ?>
    </a>
    <a href="index.php?c=subdomains" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=subdomains&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "subdomains"); ?>
        <?php echo _t("By create_by"); ?>
    </a>
    <?php
    foreach (subdomains_unique_from_col("create_by") as $create_by) {
        if ($create_by['create_by'] != "") {
            echo '<a href="index.php?c=subdomains&a=search&w=by_create_by&create_by=' . $create_by['create_by'] . '" class="list-group-item">' . contacts_formated_name(contacts_field_tva('name', $create_by['create_by'])) . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "subdomains"); ?>
        <?php echo _t("By prefix"); ?>
    </a>
    <?php
    foreach (subdomains_unique_from_col("prefix") as $prefix) {
        if ($prefix['prefix'] != "") {
            echo '<a href="index.php?c=subdomains&a=search&w=by_prefix&prefix=' . $prefix['prefix'] . '" class="list-group-item">' . $prefix['prefix'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "subdomains"); ?>
        <?php echo _t("By subdomain"); ?>
    </a>
    <?php
    foreach (subdomains_unique_from_col("subdomain") as $subdomain) {
        if ($subdomain['subdomain'] != "") {
            echo '<a href="index.php?c=subdomains&a=search&w=by_subdomain&subdomain=' . $subdomain['subdomain'] . '" class="list-group-item">' . $subdomain['subdomain'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "subdomains"); ?>
        <?php echo _t("By domain"); ?>
    </a>
    <?php
    foreach (subdomains_unique_from_col("domain") as $domain) {
        if ($domain['domain'] != "") {
            echo '<a href="index.php?c=subdomains&a=search&w=by_domain&domain=' . $domain['domain'] . '" class="list-group-item">' . $domain['domain'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "subdomains"); ?>
        <?php echo _t("By plan"); ?>
    </a>
    <?php
    foreach (subdomains_unique_from_col("plan") as $plan) {
        if ($plan['plan'] != "") {
            echo '<a href="index.php?c=subdomains&a=search&w=by_plan&plan=' . $plan['plan'] . '" class="list-group-item">' . $plan['plan'] . '</a>';
        }
    }
    ?>
</div>



<?php /**
 * <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "subdomains"); ?>
  <?php echo _t("By code"); ?>
  </a>
  <?php
  foreach (subdomains_unique_from_col("code") as $code) {
  if ($code['code'] != "") {
  echo '<a href="index.php?c=subdomains&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
  }
  }
  ?>
  </div>


  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "subdomains"); ?>
  <?php echo _t("By date_registre"); ?>
  </a>
  <?php
  foreach (subdomains_unique_from_col("date_registre") as $date_registre) {
  if ($date_registre['date_registre'] != "") {
  echo '<a href="index.php?c=subdomains&a=search&w=by_date_registre&date_registre=' . $date_registre['date_registre'] . '" class="list-group-item">' . $date_registre['date_registre'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "subdomains"); ?>
  <?php echo _t("By order_by"); ?>
  </a>
  <?php
  foreach (subdomains_unique_from_col("order_by") as $order_by) {
  if ($order_by['order_by'] != "") {
  echo '<a href="index.php?c=subdomains&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "subdomains"); ?>
  <?php echo _t("By status"); ?>
  </a>
  <?php
  foreach (subdomains_unique_from_col("status") as $status) {
  if ($status['status'] != "") {
  echo '<a href="index.php?c=subdomains&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
  }
  }
  ?>
  </div>
 */ ?>
