
<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Country"); ?></th>

            <?php
            foreach (tax_list() as $key => $tax) {
                echo "<th>" . $tax['value'] . "%</th>";
            }
            ?>






            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </thead>
    <tbody>

        <?php
        if (!$tax) {
            message("info", "No items");
        }



        foreach ($tax as $tax) {
            ?>

        <form>





            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td>6</td>
                <td>  <button type="submit" class="btn btn-default">Submit</button></td>
            </tr>



        </form>


    <?php }
    ?>	

</tbody>


</table>
