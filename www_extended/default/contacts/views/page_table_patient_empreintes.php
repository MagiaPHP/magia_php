<table class="table table-striped" border>
    <thead>
        <tr class="info">
            <th>#</th>
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Way"); ?></th>
            <th><?php _t("File L"); ?></th>
            <th><?php _t("Used in the following orders"); ?></th>
            <th><?php _t("File R"); ?></th>
            <th><?php _t("Way"); ?></th>
            <th><?php _t("Used in the following orders"); ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>#</th>
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Way"); ?></th>
            <th><?php _t("File L"); ?></th>
            <th><?php _t("Used in the following orders"); ?></th>
            <th><?php _t("File R"); ?></th>
            <th><?php _t("Way"); ?></th>
            <th><?php _t("Used in the following orders"); ?></th>
        </tr>
        </tfood>

    <tbody>
        <?php
        $i = 1;
        $array = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
        foreach ($array as $key => $value) {
            ?>


            <tr>
                <td>1</td>
                <td>2022-02-20</td>
                <td>Post</td>
                <td>
                    302010-505421-MR-CASTILLO-Ana-L.STL
                    <br>
                    <a href="#">Nas</a> | 
                    <a href="#">Dropbox</a>


                </td>
                <td>


                    <table>
                        <tr>
                            <td>302010</td>
                        </tr>
                        <tr>
                            <td>302010</td>
                        </tr>
                        <tr>
                            <td>302010</td>
                        </tr>
                    </table>


                </td>

                <td>Dropbox</td>
                <td>505421-MR-CASTILLO-Ana-R.STL</td>
                <td>


                    <table>
                        <tr>
                            <td>302010</td>
                        </tr>
                        <tr>
                            <td>302010</td>
                        </tr>
                        <tr>
                            <td>302010</td>
                        </tr>
                    </table>


                </td>
            </tr>

            <?php
            $i++;
        }
        ?>

        <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>
                <?php include "modal_empreintes_add.php"; ?>
            </td>
            <td>5</td>
            <td>6</td>
            <td><?php include "modal_empreintes_add.php"; ?></td>
            <td>8</td>
        </tr>
    </tbody>



</table>