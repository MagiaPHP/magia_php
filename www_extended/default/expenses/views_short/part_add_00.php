<div class="panel panel-default">
    <div class="panel-body">
        <h3><?php _t("Provider"); ?></h3>

        <h4><?php echo contacts_formated($expense->getProvider_id()); ?></h4>
        <p>
            <b><?php _t("Vat number"); ?></b>: <?php echo contacts_field_id('tva', $expense->getProvider_id()) ?><br>
            <?php echo $address->getNumber(); ?>, <?php echo $address->getAddress(); ?><br>
            <?php echo $address->getPostcode(); ?> <?php echo $address->getBarrio(); ?> <br>
            <?php echo $address->getCity(); ?> - <?php echo countries_country_by_country_code($address->getCountry()); ?><br>
        </p>
    </div>
</div>




