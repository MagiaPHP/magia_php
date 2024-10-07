<form method="post" action="index.php" class="navbar-form navbar-left">
    <input type="hidden" name="c" value="banks">
    <input type="hidden" name="a" value="ok_update_field">
    <input type="hidden" name="field" value="delimiter">
    <input type="hidden" name="file" value="<?php echo $file; ?>">
    <input type="hidden" name="account_number" value="<?php echo $account_number; ?>">
    <input type="hidden" name="redi[redi]" value="6">
    <input type="hidden" name="redi[c]" value="banks_lines">
    <input type="hidden" name="redi[a]" value="import_check">
    <input type="hidden" name="redi[params]" value="<?php echo ("file=$file&account_number=$account_number"); ?>">

    <div class="form-group">
        <label class="sr-only" for="new_data"><?php _t("Delimiter"); ?></label>
        <select class="form-control" name="new_data"  onchange="this.form.submit()">         
            <?php
            // c=comma, pc=semicolon, t=tab
            $delimiters = array(
                "pc" => "; semicolon",
                "c" => ", comma",
                "t" => "t tabulation",
            );
            foreach ($delimiters as $key => $delimiter_item) {
                $selectec_delimiter = ($key == $bank->getDelimiter()) ? " selected " : "";
                echo '<option value="' . $key . '" ' . $selectec_delimiter . '>' . _tr($delimiter_item) . '</option>';
            }
            ?>                                   
        </select>
    </div>


</form>

