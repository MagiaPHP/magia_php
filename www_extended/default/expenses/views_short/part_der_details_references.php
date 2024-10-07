<?php
###############################################################################
# REFERENCES
###############################################################################
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php _t("References"); ?>
        </h3>
    </div>
    <div class="panel-body">
        <table class="table">
            <tr>
                <td>Ref</td>
                <td>Val</td>
                <td>Val</td>
            </tr>

            <?php
            foreach (expenses_references_list() as $key => $er) {
                echo '<tr>
                <td>' . $er['name'] . '</td>
                <td>' . $er['description'] . '</td>
                <td>DES</td>
                
            </tr>';
            }
            ?>


            <form action="index.php" method="post">
                <input type="hidden" name="c" value="expenses_references">
                <input type="hidden" name="a" value="ok_add">
                <input type="hidden" name="expense_id" value="<?php echo $expense->getId(); ?>">
                <input type="hidden" name="order_by" value="1">
                <input type="hidden" name="status" value="1">

                <tr>
                    <td>
                        <input 
                            class="form-control" 
                            name="name" 
                            id="name" 
                            value="name" 
                            placeholder="name">

                    </td>

                    <td>
                        <input 
                            class="form-control" 
                            name="description" 
                            id="description" 
                            value="description" 
                            placeholder="name">

                    </td>
                    <td>
                        <button type="submit" class="btn btn-default">
                            <?php _t("Save"); ?>
                        </button>
                    </td>
                </tr>
            </form>




        </table>
    </div>
</div>