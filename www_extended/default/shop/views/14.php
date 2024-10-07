<?php include "00_header.php"; ?>

<?php // include "nav_address.php"; ?>
<?php
// Gestion de mensajes cortos
sms($sms);

if ($error && $sms) {
    foreach ($error as $key => $bank) {
        message("info", "$bank");
    }
}
?>



<h1><?php _t('You account bank'); ?></h1>


<p><?php _t("Add bank details so your clients can pay you"); ?></p>


<?php if (count($company->getBanks()) > 0) { ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?php _t("Bank name"); ?></th>
                <th><?php _t("Account number"); ?></th>
                <th><?php _t("Bic number"); ?></th>
                <th><?php _t("Iban number"); ?></th>
                <th><?php _t("Delete"); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($company->getBanks() as $key => $bank) {
                $del = '<a href="index.php?c=shop&a=ok_14_del&code=' . $bank->getCode() . '"><span class="glyphicon glyphicon-trash"></span></a>';
                echo '<tr>
                    <td>' . $bank->getBank() . '</td>
                    <td>' . $bank->getAccount_number() . '</td>
                    <td>' . $bank->getBic() . '</td>
                    <td>' . $bank->getIban() . '</td>
                    <td>' . $del . '</td>
                </tr>';
            }
            ?>

        </tbody>
    </table>
<?php } ?>



<a name="next"></a>

<?php if (!$company->getBanks()) { ?> 

    <form class="form-horizontal" action="index.php" method="post" >
        <input type="hidden" name="c" value="shop">
        <input type="hidden" name="a" value="ok_14">
        <?php # bank   ?>
        <div class="form-group">
            <label class="control-label col-sm-3" for="bank"><?php _t("Bank"); ?></label>
            <div class="col-sm-8">
                <input type="text"  name="bank" class="form-control" id="bank" placeholder="<?php _t('My bank name'); ?>" >
            </div>	
        </div>
        <?php # /bank  ?>
        <?php # account_number   ?>
        <div class="form-group">
            <label class="control-label col-sm-3" for="account_number"><?php _t("Account_number"); ?></label>
            <div class="col-sm-8">
                <input type="text"  name="account_number" class="form-control" id="account_number" placeholder="123-456789-00">
            </div>	
        </div>
        <?php # /account_number  ?>
        <?php # bic   ?>
        <div class="form-group">
            <label class="control-label col-sm-3" for="bic"><?php _t("Bic"); ?></label>
            <div class="col-sm-8">
                <input type="text"  name="bic" class="form-control" id="bic" placeholder="BIC123456">
            </div>	
        </div>
        <?php # /bic  ?>
        <?php # iban   ?>
        <div class="form-group">
            <label class="control-label col-sm-3" for="iban"><?php _t("Iban"); ?></label>
            <div class="col-sm-8">
                <input type="text"  name="iban" class="form-control" id="iban" placeholder="">
            </div>	
        </div>
        <?php # /iban   ?>
        <div class="form-group">
            <label class="control-label col-sm-3" for=""></label>
            <div class="col-sm-8">    
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-floppy-disk"></span>
                    <?php _t("Save"); ?>
                </button>
            </div>      							
        </div>      							
    </form>
<?php } ?>

<?php
if (count($company->getBanks()) > 0) {
    shop_registre_next(2);
}
?>


<?php include "00_footer.php"; ?>

