<?php include view("home", "header"); ?>  


<?php include "nav_export.php"; ?>


<div class="row">
    <div class="col-lg-3">
        <?php include "izq_export.php"; ?>
    </div>

    <div class="col-lg-9">




        <h1>
            <?php _t("Contacts"); ?> : 
            <?php
            if (isset($id_category)) {
                echo category_field_id("category", $id_category);
            } else {
                echo "ALL";
            }
            ?>
            : 

            <?php echo (isset($id_category)) ? contacts_total_by_category($id_category) : ""; ?>
        </h1>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <form class="form-inline" action="index.php" method="get">
            <input type="hidden" name="c" value="contacts"> 
            <input type="hidden" name="a" value="search"> 

            <div class="form-group">
                <label class="sr-only" for="txt">Client</label>
                <input class="form-control" type="text" name="txt" id="txt" placeholder="Name">
            </div>

            <button type="submit" class="btn btn-default"><?php _t("Search article"); ?></button>

        </form>










        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?php _t("Id"); ?></th>
                    <th><?php _t("Contact"); ?></th>                                        
                    <th><?php _t("Tel"); ?></th>                                        
                    <th><?php _t("Email"); ?></th>                                        
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    //foreach ($liste_info as $contact) {
                    foreach ($contacts_list as $contact) {

                        echo "<tr>";
                        echo "<td><a href=\"index.php?c=contacts&a=details&id=$contact[id]\">$contact[id]</a></td>";
                        echo "<td><a href=\"index.php?c=contacts&a=details&id=$contact[id]\">$contact[name] $contact[lastname]</a></td>";
                        echo "<td>0474624707</td>";
                        echo "<td>roencosa@gmail.com</td>";
                        //echo "<td>" . categories_by_category($contact['type_id']) . "</td>";
                        echo "<td>";
                        foreach (contacts_categories($contact['id']) as $cat) {
                            echo "$cat[category_id], ";
                        }

                        echo "</td>";

                        echo "<td>" . contacts_photo_r($contact['id'], 30) . "</td>";
                        echo "<td><a href=\"index.php?c=contacts&a=edit&id=$contact[id]\">Edit</a></td>";
                        echo "</tr>";
                    }
                    ?>	
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php _t("Id"); ?></th>
                    <th><?php _t("Contact"); ?></th>                                        
                    <th><?php _t("Tel"); ?></th>                                        
                    <th><?php _t("Email"); ?></th>                                        
                </tr>
            </tfoot>
        </table>



        <?php
        /*  <nav aria-label="Page navigation">
          <ul class="pagination">
          <li>
          <a href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
          </a>
          </li>
          <li><a href="?c=contacts&pag=1">1</a></li>
          <li><a href="?c=contacts&pag=2">2</a></li>
          <li><a href="?c=contacts&pag=3">3</a></li>
          <li><a href="?c=contacts&pag=4">4</a></li>
          <li><a href="?c=contacts&pag=5">5</a></li>
          <li>
          <a href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          </a>
          </li>
          </ul>
          </nav> */
        ?>












        <?php
//   echo var_dump(contacts_categories(6)); 
        ?>


        <?php
        /*

          <h2>Logs</h2>

          <table class="table table-striped">
          <thead>
          <tr>
          <th><?php _t("Id"); ?></th>
          <th><?php _t("Quien"); ?></th>
          <th><?php _t("Que"); ?></th>
          <th><?php _t("Cuando"); ?></th>

          </tr>
          </thead>
          <tbody>
          <tr>
          <?php
          //foreach ($liste_info as $contact) {
          foreach ($art_info as $contact) {

          echo "<tr>";
          echo "<td><a href=\"index.php?c=contacts&a=editaid=$contact[id]\">1</a></td>";
          echo "<td><a href=\"index.php?c=contacts&a=editaid=$contact[id]\">Robinson</a></td>";
          echo "<td><a href=\"index.php?c=contacts&a=editaid=$contact[id]\">creo un articulo</a></td>";
          echo "<td><a href=\"index.php?c=contacts&a=edit&id=$contact[id]\">10 de febrero 12h30</a></td>";
          echo "<td>$contact[price]</td>";
          echo "<td>$contact[quantity]</td>";
          //   echo "<td>" . categories_by_category($contact['type_id']) . "</td>";
          echo "<td>" . contacts_photo_r($contact['id'], 30) . "</td>";
          echo "</tr>";
          }
          ?>
          </tr>
          </tbody>
          <tfoot>
          <tr>
          <th><?php _t("Id"); ?></th>
          <th><?php _t("Quien"); ?></th>
          <th><?php _t("Que"); ?></th>
          <th><?php _t("Cuando"); ?></th>
          </tr>
          </tfoot>
          </table>
         */
        ?>

    </div>
</div>

<?php include view("home", "footer"); ?>  

