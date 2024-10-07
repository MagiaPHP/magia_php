<?php include "00_header.php"; ?>

<?php // include "nav_address.php"; ?>

<?php
// Gestion de mensajes cortos
sms($sms);

if ($error && $sms) {
    foreach ($error as $key => $value) {
        message("info", "$value");
    }
}
?>

<h1><?php _t('Rate Plan'); ?></h1>

<p>
    <?php _t("We're almost done"); ?>
</p>


<div class="row">

    <?php
    $i = 0;
    foreach ($subdomains_plans as $key => $splan) {

        $plan_selected = (subdomains_search_by_unique('plan', 'subdomain', $company->getTva())) ?? null;

        $btn_selected = ($plan_selected == $splan["plan"] ) ?
                '<a href="#" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-ok"></span> ' . _tr('Selected') . '</a>' :
                '<a href="index.php?c=shop&a=ok_6&plan=' . $splan["plan"] . '" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-unchecked"></span> ' . _tr("Select this") . '</a>'
        ;

        echo '<div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="https://picsum.photos/210/10' . $i++ . '" alt="...">
            <div class="caption">
                <h3 class="text-center" ><b>' . $splan["plan"] . '</b></h3>
                <p>
                </p>
                
                <p class="text-center"><strike>' . monedaf($splan["price"] + 5) . '</strike></p>
                <h2 class="text-center"><b>' . $splan["price"] . ' &euro;</b></h2>
                <p class="text-center">   ' . _tr("htva/month") . '</p>
                <p class="text-center" >' . $btn_selected . '</p>
            </div>
        </div>
    </div>
';
    }
    ?>



</div>


<table class="table table-condensed">
    <thead>
        <tr>
            <th></th>
            <?php
            foreach (subdomains_plan_list() as $key => $splan) {
                echo '<th class="text-center">' . $splan["plan"] . '</th>';
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach (subdomains_features_list() as $key => $sfl) {
            echo '<tr>
            <td>' . $sfl["feature"] . '</td>';
            foreach (subdomains_plan_list() as $key => $spltable) {
                echo '<td class="text-center">';
                echo (subdomains_plan_features_search_by_plan_feature($spltable['plan'], $sfl['feature'])) ?
                        '<span class="glyphicon glyphicon-ok"></span>' :
                        '<span class="glyphicon glyphicon-remove"></span>';
                echo '</td>';
            }
            echo '</tr>';
        }
        ?>
    </tbody>
</table>


<a name="next"></a>

<?php
if (!$error) {
    shop_registre_next(7);
}
?>






<?php include "00_footer.php"; ?>


