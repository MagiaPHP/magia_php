
<?php //echo $side;     ?>
<div class="panel panel-default">
    <div class="panel-heading"><b><?php _t("Side"); ?>: <?php _t($side); ?></b></div>
    <div class="panel-body">
        <?php
        foreach (shop_orders_lines($id, $side) as $key => $item) {
            echo '<table class="table table-hover table-striped">';

            $items_array = json_decode($item['description']);

            foreach ($items_array as $key => $value) {


                switch ($key) {
                    case "types":
                        $val = types_field_id("type", $value);
                        break;

                    case "modele":
                        $val = modeles_field_id("modele", $value);
                        break;

                    case "mesure_snr":
                        $val = mesure_snr_field_id("mesure", $value);
                        break;

                    case "formes":
                        $val = formes_field_id("forme", $value);
                        break;

                    case "materials":
                        $val = materials_field_id("material", $value);
                        break;

                    case "couleurs":
                        $val = couleurs_field_id("colour", $value);
                        break;

                    case "perte_auditive":
                        $val = perte_auditive_field_id("perte", $value);
                        break;

                    case "marque":
                        $val = marques_field_id("marque", $value);
                        break;

                    case "ecouteur":
                        $val = ecouteurs_field_id("ecouteur", $value);
                        break;

                    case "event":
                        $val = events_field_id("event", $value);
                        break;

                    case "diametre":
                        $val = diametre_field_id("diametre", $value);
                        break;
                    case "longueurs":
                        $val = longueurs_field_id("longueur", $value);
                        break;
                    case "constitution":
                        $val = constitution_field_id("constitution", $value);
                        break;

                    default:
                        break;
                }






                echo "<tr>";

                if ($key == 'options') {
                    // echo "<td>". ($key)."</td><td></td>";
                    $i = 1;
                    foreach ($value as $k => $op) {
                        echo "<tr><td class=\"text-right\">" . ucfirst(_tr("Option")) . "</td><td>$op " . _tr(options_option_by_id($op)) . "</td></tr>";
                        //echo "<tr><td class=\"text-right\">" . ucfirst(_tr("Option")) . "</td><td>" . vardump(options_option_by_id($op)) . "</td></tr>" ;
                        //echo "<tr><td class=\"text-right\">" . ucfirst(_tr("Option")) . "</td><td>" . vardump(options_field_id("price" , $op)) . "</td></tr>" ;
                        //echo "<tr><td class=\"text-right\">" . ucfirst(_tr("Option")) . "</td><td>" . ($op) . "</td></tr>" ;

                        $i++;
                    }
                } else {
                    if ($val) {

                        echo "<td class=\"text-right\">" . (ucfirst(_tr($key))) . "</td>";
                        echo "<td>$value " . _tr($val) . "</td>";
                    }
                }

                echo "</tr>";
            }
            echo "<tr><td colspan=2 class=text-center>$item[code]</td></tr>";
            echo "<tr><td colspan=2 class=text-center>" . products_create_code($item['description']) . "</td></tr>";
            echo "</table>";
        }
        ?>
    </div>
</div>



