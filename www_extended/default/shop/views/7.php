<?php include "00_header.php"; ?>

<?php
// Gestion de mensajes cortos
sms($sms);

if ($error) {
    foreach ($error as $key => $value) {
        message("info", "$value");
    }
}
?>

<a name="next"></a>

<h2 class="text-center"><?php _t("Record Summary"); ?></h2>  


<p class="text-center">
    <?php _t("Thank you for your registration, please verify the information is correct before sending it."); ?>
</p>



<?php
// Gestion de mensajes cortos
sms($sms);

if ($error) {
    foreach ($error as $key => $value) {
        message("info", "$value");
    }
}
?>


<table class="table table-striped">
    <tr>
        <td><b><?php _t("Company name"); ?></b></td>
        <td><?php echo $company->getName(); ?></td>
        <td><?php echo ($company->getName()) ? "" : "<a href='index.php?c=shop&a=1'>" . _tr('Edit') . "</a>"; ?></td>   
    </tr>

    <tr>
        <td><b><?php _t("Vat number"); ?></></td>
        <td><?php echo $company->getTva(); ?></td>
        <td><?php echo ($company->getTva()) ? "" : "<a href='index.php?c=shop&a=1'>" . _tr('Edit') . "</a>"; ?></td>   
    </tr>

    <tr>
        <td><b><?php _t("Billing address"); ?></b></td>
        <td>
            <?php echo $company->getAddresses('Billing')->getNumber(); ?>
            <?php echo $company->getAddresses('Billing')->getAddress(); ?><br>
            <?php echo $company->getAddresses('Billing')->getPostcode(); ?> - 
            <?php echo $company->getAddresses('Billing')->getBarrio(); ?><br>
            <?php echo $company->getAddresses('Billing')->getCity(); ?> - 
            <?php echo _tr(countries_country_by_country_code($company->getAddresses('Billing')->getCountry())); ?> <br>

        </td>
        <td><?php echo ($company->getTva()) ? "" : "<a href='index.php?c=shop&a=12'>" . _tr('Edit') . "</a>"; ?></td>   
    </tr>


    <tr>
        <td><b><?php _t("Company email"); ?></b></td>
        <td><?php echo directory_list_by_contact_name($u_owner_id, 'Email'); ?></td>
        <td><?php echo (directory_list_by_contact_name($u_owner_id, 'Email')) ? "" : "<a href='index.php?c=shop&a=13'>" . _tr('Edit') . "</a>"; ?></td>
    </tr>



    <tr>
        <td><b><?php _t("Company bank information"); ?></b></td>
        <td>    
            <?php
            if (isset($bank) && $bank != '') {
                echo "$bank[bank]<br>";
                echo "$bank[account_number] <br>  ";
                echo "$bank[bic]<br>";
                echo "$bank[iban]  ";
            }
            ?>
        <td><?php echo ($banks) ? "" : "<a href='index.php?c=shop&a=14'>" . _tr('Edit') . "</a>"; ?></td>   
    </tr>


    <tr>
        <td><b><?php _t("Your name and lastname"); ?></b></td>

        <td><?php echo contacts_field_id('name', $u_id) . ' ' . contacts_field_id('lastname', $u_id); ?></td>

        <td><?php echo (contacts_field_id('name', $u_id) == '' || contacts_field_id('lastname', $u_id) == '') ? "<a href='index.php?c=shop&a=2'>" . _tr('Edit') . "</a>" : ""; ?></td>   

    </tr>


    <tr>
        <td><b><?php _t("Your email"); ?></b></td>
        <td><?php echo directory_list_by_contact_name($u_id, 'Email'); ?></td>
        <td><?php echo (directory_list_by_contact_name($u_id, 'Email')) ? "" : "<a href='index.php?c=shop&a=1'>" . _tr('Edit') . "</a>"; ?></td>
    </tr>

    <tr>
        <td><b><?php _t("Membership"); ?></b></td>
        <td>
            <?php
            echo subdomains_plan_search_by_unique('price', 'plan', subdomains_search_by_unique('plan', 'subdomain', $company->getSubdomain_Data('subdomain'))) . " " . _tr("euros/month") ?? null;
            ?>
        </td>
        <td></td>
    </tr>





</table>
<hr>


<?php //include "izq_registre.php";    ?>
<?php // vardump($company->why_can_not_be_approved())  ?>


<?php
// 
// Dar acceso mismo si tiene precio la membresia 
// 
// si el precio de la membresia es 0
// no se hace bon devis 
// se da acceso directo 
$m = subdomains_plan_search_by_unique('price', 'plan', subdomains_search_by_unique('plan', 'subdomain', $company->getSubdomain_Data('subdomain'))) ?? null;

//vardump($m);
//vardump($company->Why_can_not_be_approved());

if ($company->Why_can_not_be_approved()) {
    ?>
    <h2><?php _t("Missing or incorrect data"); ?></h2>
    <p><?php _t("Review the information provided, is there any wrong or missing information?"); ?></p>

<?php } else {
    ?>

    <h2><?php _t("Everything is correct?"); ?></h2>
    <p>
        <?php _t("If everything is correct, you can proceed to payment, do not forget that later you can also correct any information that you want to change."); ?>
    </p>

    <a name="next"></a>

    <?php
    if (!$error) {
        shop_registre_next(8);
    }
    ?>

<?php }
?>




<?php include "00_footer.php"; ?>

