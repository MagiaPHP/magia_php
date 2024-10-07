<div class="panel panel-default">
    <div class="panel-heading"><b><?php _t("Stereo"); ?></b></div>
    <div class="panel-body">
        <?php
        foreach (shop_orders_lines($id, 'S') as $key => $item) {
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
                        echo "<tr><td class=\"text-right\" width=50%>" . ucfirst(_tr("Option")) . "</td><td>" . options_field_id("option", $op) . "</td></tr>";
                        $i++;
                    }
                } else {


                    echo "<td class=\"text-right\">" . (ucfirst($key)) . "</td>";
                    echo "<td>$val</td>";
                }

                echo "</tr>";
            }
            echo "</table>";
            //echo "<br>";
        }
        ?>
    </div>
</div>



