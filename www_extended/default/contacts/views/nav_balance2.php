<form action="index.php" method="get" class="form-inline">
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="balance">
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <div class="form-group">
        <select name="year" class="form-control">
            <?php
            $selected = "";

            for ($i = 2021; $i < date('Y') + 1; $i++) {
                if ($i == $year) {
                    $selected = " selected ";
                }
                echo '<option value="' . $i . '" ' . $selected . ' >' . $i . '</option>';

                $selected = false;
            }
            ?>
        </select>
    </div>

    <button 
        type="submit" 
        class="btn btn-default">
        <span class="glyphicon glyphicon-search"></span>
        <?php _t("Search"); ?>
    </button>
</form>