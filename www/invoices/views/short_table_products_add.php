<form class="form-inline">

    <div class="form-group">
        <label class="sr-only" for="category"><?php _t("Category"); ?></label>
        <select class="form-control" name="category">
            <option value="1">Category 1</option>
            <option value="1">Category 2</option>
            <option value="1">Category 3</option>
        </select>
    </div>

    <div class="form-group">
        <label class="sr-only" for="name"><?php _t("Produit name"); ?></label>
        <input type="password" class="form-control" id="name" placeholder="">
    </div>



    <button type="submit" class="btn btn-default"><?php _t("Search"); ?></button>

</form>

<br>


<table class="table table-condensed">
    <thead>
        <tr>
            <th><?php _t("Qte"); ?></th>
            <th><?php _t("Product"); ?></th>
            <th><?php _t("Vat"); ?></th>
            <th class="text-right"><?php _t("Price"); ?></th>            
        </tr>
    </thead>
    <tbody>

        <?php
//        foreach (products_list() as $key => $product_list) {                        
        foreach (array(1, 2, 3, 4, 5, 6) as $key => $product_list) {
//            echo '<tr>
//            <td><input type="number" class="form-control" name="price" value="1"></td>            
//            <td><input type="text" class="form-control" name="price" value="'.$product_list["name"].'"></td>            
//            <td class="text-right">'.$product_list["tax"].'%</td>            
//            <td><input type="number" class="form-control" name="price" value="'.$product_list["price"].'"></td>            
//            <td class="text-right"><a href="#" class="btn btn-sm btn-primary">' . _tr("Add") . '</a></td>
//        </tr>';
//            
            echo '<tr>
            <td><input type="number" class="form-control" name="price" value="1"></td>            
            <td><input type="text" class="form-control" name="price" value="100"></td>            
            <td class="text-right">21%</td>            
            <td><input type="number" class="form-control" name="price" value="120"></td>            
            <td class="text-right"><a href="#" class="btn btn-sm btn-primary">' . _tr("Add") . '</a></td>
        </tr>';
        }
        ?>
    </tbody>        
</table>



<p>..</p>