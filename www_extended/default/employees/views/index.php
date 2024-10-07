<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("employees", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <?php include view("employees", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <?php
// https://api.jquery.com/prop/
        ?>


        <?php
        /**
         * 
          <style>
          th {
          position: -webkit-sticky;
          position: sticky;
          top: 0;
          z-index: 2;
          }
          </style>

          <table class="table table-striped table-condensed table-bordered" >
          <thead>
          <tr class="info">
          <th><?php _t("Id"); ?></th>
          <th><?php _t("Company_id"); ?></th>
          <th><?php _t("Contact_id"); ?></th>
          <th><?php _t("Owner_ref"); ?></th>
          <th><?php _t("Date"); ?></th>
          <th><?php _t("Cargo"); ?></th>
          <th><?php _t("Order_by"); ?></th>
          <th><?php _t("Status"); ?></th>

          <th><?php _t("Action"); ?></th>
          </tr>
          </thead>
          <tbody>
          <tr>
          <?php
          if (!$employees) {
          message("info", "No items");
          }


          //foreach ($liste_info as $address) {
          foreach ($employees as $employees) {


          $menu = '<div class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          ' . _tr("Actions") . '
          <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <li><a href="index.php?c=employees&a=details&id=' . $employees["id"] . '">' . _tr("Details") . '</a></li>
          <li><a href="index.php?c=employees&a=edit&id=' . $employees["id"] . '">' . _tr("Edit") . '</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="index.php?c=employees&a=delete&id=' . $employees["id"] . '">' . _tr("Delete") . '</a></li>
          </ul>
          </div>';
          //   $photo = addresses_photos_principal($address["id"]);
          //   $contact_name = contacts_field_id("name", $employees["contact_id"]);
          //   $contact_lastname = contacts_field_id("lastname", $employees["contact_id"]);
          echo "<tr id=\"$employees[id]\">";
          echo "<td>$employees[id]</td>";
          echo "<td>" . contacts_formated($employees['company_id']) . "</td>";
          echo "<td>" . contacts_formated($employees['contact_id']) . "</td>";
          echo "<td>$employees[owner_ref]</td>";
          echo "<td>$employees[date]</td>";
          echo "<td>$employees[cargo]</td>";
          echo "<td>$employees[order_by]</td>";
          echo "<td>$employees[status]</td>";

          echo "<td>$menu</td>";

          echo "</tr>";
          }
          ?>
          </tr>
          </tbody>
          <tfoot>
          <tr>
          <th><?php _t("Id"); ?></th>
          <th><?php _t("Company_id"); ?></th>
          <th><?php _t("Contact_id"); ?></th>
          <th><?php _t("Owner_ref"); ?></th>
          <th><?php _t("Date"); ?></th>
          <th><?php _t("Cargo"); ?></th>
          <th><?php _t("Order_by"); ?></th>
          <th><?php _t("Status"); ?></th>

          <th><?php _t("Action"); ?></th>
          </tr>
          </tfoot>
          </table>


         */
        ?>





    </div>
</div>

<?php include view("home", "footer"); ?> 

