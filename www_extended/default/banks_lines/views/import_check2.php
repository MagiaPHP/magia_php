<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-0 col-lg-0">
        <?php // include view("banks_lines", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-12">
        <?php include view("banks_lines", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php
        vardump($account_number);

        $cols = array(
            "Nº de séquence",
            "Date d'exécution",
            "Date valeur",
            "Montant",
            "Devise du compte",
            "Numéro de compte",
            "Type de transaction",
            "Contrepartie",
            "Nom de la contrepartie",
            "Communication",
            "Détails",
            "Statut",
            "Motif du refus",
        );

        $cols = banks_lines_tmp_search_by_account_number($account_number);
//        vardump($cols);
        ?>


        <form method="post" action="index.php">

            <input type="hidden" name="c" value="banks_lines">
            <input type="hidden" name="a" value="ok_add_short">
            <input type="hidden" name="redi[redi]" value="1">


            <table class="table table-striped table-bordered">
                <thead>
                    <tr>

                        <?php
                        foreach ($cols as $key => $col) {
                            echo '<th>' . $col['template'] . '</th>';
                        }
                        ?>
                        <td>
                            <?php
                            include view('banks_lines_tmp', 'form_add', $arg = null);
                            ?>
                        </td>


                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <?php
                        $l = 1;
                        foreach ($banks_lines as $key => $line) {
                            $i = 1;
                            foreach ($cols as $key => $col) {
                                echo '<td>' . $line[$col['template']] . '</td>';
                                echo ($i > count($cols) - 1) ? "</tr>" : "";

                                $i++;
                            }
                        }
                        ?>
                </tbody>
            </table>
            <button type="submit" class="btn btn-default">
                <?php echo icon("ok"); ?>
                <?php _t("Submit"); ?>
            </button>
        </form>




        <?php ?>
        <hr>




        <table class="table table-striped" border>

            <thead>
                <tr>
                    <th>#</th>
                    <?php
                    foreach (banks_lines_tmp_search_by_account_number($account_number) as $key => $bltmpsb) {
                        echo '<th>' . $bltmpsb['template'] . '</th>';
                    }
                    ?>
                </tr>                
            </thead>


            <form method="post" action="index.php">
                <input type="hidden" name="c" value="banks_lines">
                <input type="hidden" name="a" value="ok_import">
                <input type="hidden" name="redi[redi]" value="1">  


                <tbody>
                    <?php
                    $errors_import = array();

                    $nl = 1;
                    foreach ($banks_lines as $key => $bll) {

                        foreach (banks_lines_tmp_search_by_account_number($account_number) as $key => $bltmpsb) {
                            $class[$bltmpsb['template']] = '';

                            $error_field = banks_lines_import_check($bltmpsb['template'], $bll[$bltmpsb['template']], $account_number);

                            if ($error_field) {
                                $class[$bltmpsb['template']] = 'class ="danger"';
                                array_push($errors_import, 'Line: ' . $nl);
                                $errors_import = array_merge_recursive($errors_import, $error_field);
                            }
                        }




                        echo '<tr class="">';
                        echo '<td>' . $nl . ' </td>';
                        foreach (banks_lines_tmp_search_by_account_number($account_number) as $key => $bltmpsb) {
                            echo '<td ' . $class[$bltmpsb['template']] . ' >' . $bll[$bltmpsb['template']] . '</td>';
                        }
                        echo '</tr>';

                        $class = null;
                        $nl++;
                    }
                    ?>

                </tbody>
        </table>

        <button type="submit" class="btn btn-default">
            <?php _t("Submit"); ?>
        </button>

        </form>

        <br>
        <br>
        <?php
        include view('banks_lines_tmp', 'form_add', $arg = null);
        ?>


        <table class="table table-condensed" border>

            <thead>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
            </thead>

            <tbody>
                <tr>1</tr>
            </tbody>
            <?php
            foreach ($errors_import as $key => $error) {
                echo "<tr>";
                echo '<td>';
                echo ($error);
                echo '</td>';
                echo "</tr>";
            }
            ?>


        </table>



    </div>
</div>

<?php include view("home", "footer"); ?> 
