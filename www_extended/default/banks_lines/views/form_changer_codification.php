<form method="post" action="index.php" class="navbar-form navbar-left">
    <input type="hidden" name="c" value="banks">
    <input type="hidden" name="a" value="ok_update_field">
    <input type="hidden" name="field" value="codification">
    <input type="hidden" name="file" value="<?php echo $file; ?>">
    <input type="hidden" name="account_number" value="<?php echo $account_number; ?>">
    <input type="hidden" name="redi[redi]" value="6">
    <input type="hidden" name="redi[c]" value="banks_lines">
    <input type="hidden" name="redi[a]" value="import_check">
    <input type="hidden" name="redi[params]" value="<?php echo ("file=$file&account_number=$account_number"); ?>">

    <div class="form-group">
        <label class="sr-only" for="new_data"><?php _t("Codification"); ?></label>
        <select class="form-control" name="new_data" onchange="this.form.submit()">
            <?php
            $codifactions_array = array(
                "1" => "UTF-8, UTF-16",
                "2" => "UTF-8",
                "3" => "UTF-16",
                "4" => "ISO-8859-1",);
            ?>
            <?php
            foreach ($codifactions_array as $key => $codification) {
                $selectec_codification = ($key == $bank->getCodification()) ? " selected " : "";
                echo '<option value="' . $key . '"  ' . $selectec_codification . '>' . $codification . '</option>';
            }
            ?>
        </select>
    </div>



</form>





