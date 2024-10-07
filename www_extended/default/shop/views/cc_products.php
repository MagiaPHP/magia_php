<div class="row">
    <?php
    $i = 0;
    foreach ($products as $product) {
        ?>
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="https://picsum.photos/350/25<?php echo $i; ?>" alt="...">
                <div class="caption">
                    <h3>Lampara de audiologo</h3>
                    <p>Es una lampara para sacar fotos de la parte superiro de la oreja</p>
                    <p><span class="label label-danger"><?php echo $i . "00 EUR" ?></span></p>

                    <p>
                        <a href="index.php?c=shop&a=product_details&id=<?php echo $product['id']; ?>" class="btn btn-primary" role="button"><?php echo _t('Details'); ?></a> 
                        <a href="#" class="btn btn-default" role="button">
                            <?php echo _t('Add'); ?>
                            <span class="glyphicon glyphicon-shopping-cart"></span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <?php
        $i++;
    }
    ?>
</div>


<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr class="info">
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Image"); ?></th>
            <th><?php _t("Category_id"); ?></th>
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Description"); ?></th>
            <th><?php _t("Code"); ?></th>
            <th><?php _t("Price"); ?></th>
            <th><?php _t("Tax"); ?></th>
            <th><?php _t("Order_by"); ?></th>
            <th><?php _t("Status"); ?></th>

            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            if (!$products) {
                message("info", "No items");
            }


            //foreach ($liste_info as $address) {
            foreach ($products as $products) {

                //
//                $img =  "www_extended/default/gallery/img/noimage.png" ;
//                
//                $pic_princiapal_id = products_pictures_search_principal_by_product_id($products['id'])[0]['picture_id'] ;
//
//                if ( $pic_princiapal_id ) {
//                    
//                    $pic_principal = gallery_field_id("name" , $pic_princiapl_id) ;
//                    
//                    $pic = ( $pic_principal ) ? "www_extended/default/gallery/img/$pic_principal" : false ;
//                    
//                    $img = ( file_exists($pic) ) ? $pic : "www_extended/default/gallery/img/noimage.png" ;
//                    
//                } 
//                



                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=shop&a=product_details&id=' . $products["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=shop&a=product_details&id=' . $products["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              
                            </ul>
                          </div>';
                //   $photo = addresses_photos_principal($address["id"]);
                //   $contact_name = contacts_field_id("name", $products["contact_id"]);
                //   $contact_lastname = contacts_field_id("lastname", $products["contact_id"]);
                echo "<tr id=\"$products[id]\">";

                echo "<td>$products[id]</td>";
                echo "<td></td>";
                // echo "<td><img src=\"$img\" width=50> <br> " . products_pictures_total_by_product_id($products['id'])."</td>" ;
                echo "<td>" . products_categories_field_id("name", $products['category_id']) . "</td>";
                echo "<td>$products[name]</td>";
                echo "<td>$products[description]</td>";
                echo "<td>$products[code]</td>";
                echo "<td>$products[price]</td>";
                echo "<td>$products[tax]%</td>";
                echo "<td>$products[order_by]</td>";
                echo "<td>$products[status]</td>";

                echo "<td>$menu</td>";

                echo "</tr>";
            }
            ?>	
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Image"); ?></th>
            <th><?php _t("Category_id"); ?></th>
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Description"); ?></th>
            <th><?php _t("Code"); ?></th>
            <th><?php _t("Price"); ?></th>
            <th><?php _t("Tax"); ?></th>
            <th><?php _t("Order_by"); ?></th>
            <th><?php _t("Status"); ?></th>

            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </tfoot>
</table>
