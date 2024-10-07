<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-0 col-lg-0">
        <?php // include view("banks_lines", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-12">
        <?php include "nav_import_check.php"; ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <p>
            <?php _t("Example with registered date format"); ?>: <?php echo _tr("Today"); ?> : <?php echo date($bank->getDate_format()); ?>
        </p>
        <?php
        message('warning', 'When using bank lines for the first time, you must create the correct template for future use. Once selected, it cannot be modified');
//        message('warning', 'Hay %s moscas', 'ok', array("url_action" => "#", "url_label" => "go"), true, '10');
        ?>



        <?php //include "form_changer_bank.php";  ?>

        <?php //include "form_changer_template.php";  ?>



        <?php
//        function validate_and_convert_date($date, $format) {
//            $dateTime = DateTime::createFromFormat($format, $date);
//            if ($dateTime && $dateTime->format($format) === $date) {
//                return $dateTime->format('Y-m-d');
//            }
//            return false;
//        }
//vardump(validate_and_convert_date('20/03/2024', 'd/m/Y'));
//        $dates_format_array = [
//            ['date' => '20/03/2024', 'format' => 'd/m/Y'], // dd/mm/yyyy
//            ['date' => '03-20-2024', 'format' => 'm-d-Y'], // mm-dd-yyyy
//            ['date' => '2024.03.20', 'format' => 'Y.m.d'], // yyyy.mm.dd
//            ['date' => '2024/03/20', 'format' => 'Y/m/d'], // yyyy/mm/dd
//            ['date' => '2024-03-20', 'format' => 'Y-m-d'], // yyyy-mm-dd
//            ['date' => '20.03.2024', 'format' => 'd.m.Y'], // dd.mm.yyyy
//            ['date' => '20-03-2024', 'format' => 'd-m-Y'], // dd-mm-yyyy
//            ['date' => '03/20/2024', 'format' => 'm/d/Y'], // mm/dd/yyyy
//            ['date' => '03.20.2024', 'format' => 'm.d.Y'], // mm.dd.yyyy
//            ['date' => '31/12/2023', 'format' => 'd/m/Y'], // dd/mm/yyyy (end of year)
//            ['date' => '01-01-2023', 'format' => 'd-m-Y'], // dd-mm-yyyy (start of year)
//            ['date' => '15/07/2023', 'format' => 'd/m/Y'], // dd/mm/yyyy (mid-year)
//            ['date' => 'invalid-date', 'format' => 'Y-m-d'], // invalid format
//            ['date' => '2023-02-30', 'format' => 'Y-m-d'], // invalid date (February 30th doesn't exist)
//            ['date' => '29/02/2020', 'format' => 'd/m/Y'], // valid leap year date
//            ['date' => '29/02/2021', 'format' => 'd/m/Y'], // invalid non-leap year date
//            ['date' => '1/2/2023', 'format' => 'j/n/Y'], // d/m/yyyy
//            ['date' => '01/2/2023', 'format' => 'd/n/Y'], // dd/m/yyyy
//            ['date' => '1/02/2023', 'format' => 'j/m/Y'], // d/mm/yyyy
//            ['date' => '1-2-2023', 'format' => 'j-n-Y'], // d-m-yyyy
//            ['date' => '01-2-2023', 'format' => 'd-n-Y'], // dd-m-yyyy
//            ['date' => '1-02-2023', 'format' => 'j-m-Y'], // d-mm-yyyy
//            ['date' => '2024-01-01T12:00:00', 'format' => 'Y-m-d\TH:i:s'], // ISO 8601 datetime format (valid date part)
//        ];
//        foreach ($dates as $dateInfo) {
//            $date = $dateInfo['date'];
//            $format = $dateInfo['format'];
//            $convertedDate = validate_and_convert_date($date, $format);
//            if ($convertedDate) {
//                echo "<p>$date es una fecha válida. Formato convertido: $convertedDate</p>\n";
//                // Aquí puedes insertar $convertedDate en la base de datos
//                // $query = "INSERT INTO tu_tabla (fecha) VALUES ('$convertedDate')";
//                // mysqli_query($conexion, $query);
//            } else {
//                echo "<p>$date no es una fecha válida.</p>\n";
//            }
//        }
        ?>



        <?php
//        $thousands_separator = banks_field_account_number('thousands_separator', $account_number);
//        $decimal_separator = banks_field_account_number('decimal_separator', $account_number);
//
//        vardump(array(
//            $thousands_separator,
//            $decimal_separator
//        ));
//
//
//
//
//https://www.php.net/manual/en/numberformatter.formatcurrency.php
//https://www.php.net/manual/en/class.numberformatter.php
//
//
//        function validateNumber($number, $thousandSeparator, $decimalSeparator) {
//            // Definir los caracteres de separación de miles y decimales
//            $thousandSeparators = [
//                'nospace' => '',
//                'space' => ' ',
//                'comma' => ',',
//                'dot' => '.'
//            ];
//
//            $decimalSeparators = [
//                'comma' => ',',
//                'dot' => '.'
//            ];
//
//            // Validar si los separadores proporcionados son correctos
//            if (!array_key_exists($thousandSeparator, $thousandSeparators) || !array_key_exists($decimalSeparator, $decimalSeparators)) {
//                return false;
//            }
//
//            $ts = $thousandSeparators[$thousandSeparator];
//            $ds = $decimalSeparators[$decimalSeparator];
//
//            // Crear la expresión regular para validar el número
//            $regex = '/^(?:\d{1,3}[\s' . preg_quote($ts) . ']*)*(?:\d{1,3}(?:\.\d{3})*)?(?:[' . preg_quote($ts) . ']\d{1,3})*(?:[' . preg_quote($ds) . ']\d{2})?$/';
//
//            // Remover cualquier espacio innecesario antes de validar
//            //$number = str_replace(' ', '', $number);
//            // Validar el número con la expresión regular
//            return preg_match($regex, $number);
//        }
//
//// Ejemplos de números a validar y sus separadores
//        $numbers = [
//            '1,253.02',
//            '1253,02',
//            '1 253.02',
//            '1.253,02',
//            '12,530.25',
//            '12 530.25',
//            '12530.25',
//            '12.530,25',
//            '1253025',
//            '1.253,025',
//            '1 253 025',
//            '12,530,250.50',
//            '12.530.250,50',
//            '12530,250.50',
//            '12530.250,50',
//            '12530250.50',
//            '12.530,250.50',
//            '12530,250,50',
//            '12530250,50',
//            '1,253,025.50',
//            '1.253.025,50',
//            '1 253 025,50',
//            '1.253.025,50',
//            '1253025,50',
//            '1,253,025',
//            '1.253.025',
//            '1 253 025',
//            '1253025',
//            '12,530',
//            '12.530',
//            '12 530',
//            '12530',
//            '1253',
//            '12',
//            '-1,253.02',
//            '-1253,02',
//            '-1 253.02',
//            '-1.253,02',
//            '-12,530.25',
//            '-12 530.25',
//            '-12530.25',
//            '-12.530,25',
//            '-1253025',
//            '-1.253,025',
//            '-1 253 025',
//            '-12,530,250.50',
//            '-12.530.250,50',
//            '-12530,250.50',
//            '-12530.250,50',
//            '-12530250.50',
//            '-12.530,250.50',
//            '-12530,250,50',
//            '-12530250,50',
//            '-1,253,025.50',
//            '-1.253.025,50',
//            '-1 253 025,50',
//            '-1.253.025,50',
//            '-1253025,50',
//            '-1,253,025',
//            '-1.253.025',
//            '-1 253 025',
//            '-1253025',
//            '-12,530',
//            '-12.530',
//            '-12 530',
//            '-12530',
//            '-1253',
//            '-12',
//            '+1,253.02',
//            '+1253,02',
//            '+1 253.02',
//            '+1.253,02',
//            '+12,530.25',
//            '+12 530.25',
//            '+12530.25',
//            '+12.530,25',
//            '+1253025',
//            '+1.253,025',
//            '+1 253 025',
//            '+12,530,250.50',
//            '+12.530.250,50',
//            '+12530,250.50',
//            '+12530.250,50',
//            '+12530250.50',
//            '+12.530,250.50',
//            '+12530,250,50',
//            '+12530250,50',
//            '+1,253,025.50',
//            '+1.253.025,50',
//            '+253 025,50',
//            '+1.253.025,50',
//            '+1253025,50',
//            '+1,253,025',
//            '+1.253.025',
//            '+1 253 025',
//            '+1253025',
//            '+12,530',
//            '+12.530',
//            '+12 530',
//            '+12530',
//            '+1253',
//            '+12',
//            '1',
//            '0',
//            '0.00',
//            '0,00',
//            '0.50',
//            '0,50',
//            '000,000.50',
//            '000.000,50',
//            '0000000.50',
//            '000,000,000.50',
//            '000.000.000,50',
//        ];
//
////        vardump($bank->getThousands_separator());
////        vardump($bank->getDecimal_separator());
//
//// Validar y mostrar los resultados
//        $i = 1;
//        foreach ($numbers as $number) {
//
//            $thousandSeparator = $bank->getThousands_separator();
//            $decimalSeparator = $bank->getDecimal_separator();
//
//            $isValid = validateNumber($number, $thousandSeparator, $decimalSeparator);
//
//            //echo '<h3>Número: ' . $number . '</h3>';
//            if ($isValid) {
//                echo '<p>  ' . $number . ' Es un número válido. para Thousands separator: ' . $bank->getThousands_separator() . ' y Decimal separator ' . $bank->getDecimal_separator() . '</p>';
//            } else {
//                echo '<p><b>' . $number . ' NO ES un número válido. para Thousands separator: ' . $bank->getThousands_separator() . ' y Decimal separator ' . $bank->getDecimal_separator() . '</b></p>';
//            }
//
//            $i++;
//        }
//        echo "<hr>";
//        foreach ($numbers as $key => $number) {
//            echo "<p> $number > " . rjc_tofloat($number) . "</p>";
//        }




        /**
          Errores encontratpds

          1253,02 Es un número válido. para Thousands separator: dot y Decimal separator comma
          12.530,25 NO ES un número válido. para Thousands separator: dot y Decimal separator comma
          1.253,025 NO ES un número válido. para Thousands separator: dot y Decimal separator comma
         * 12.530.250,50 NO ES un número válido. para Thousands separator: dot y Decimal separator comma
         *  12530250,50 Es un número válido. para Thousands separator: dot y Decimal separator comma
         * 1.253.025,50 NO ES un número válido. para Thousands separator: dot y Decimal separator comma
         * 1.253.025,50 NO ES un número válido. para Thousands separator: dot y Decimal separator comma
         * 1.253.025 NO ES un número válido. para Thousands separator: dot y Decimal separator comma
         *  1 253 025 Es un número válido. para Thousands separator: dot y Decimal separator comma
         *  1253025 Es un número válido. para Thousands separator: dot y Decimal separator comma
         * 12.530 NO ES un número válido. para Thousands separator: dot y Decimal separator comma
         *  12 530 Es un número válido. para Thousands separator: dot y Decimal separator comma

          12530 Es un número válido. para Thousands separator: dot y Decimal separator comma

          1253 Es un número válido. para Thousands separator: dot y Decimal separator comma
         * 
         */
//
//
//
//
//
//
// Ejemplos de uso
//        vardump(banks_validate_number_format('5003.50', $thousands_separator, $decimal_separator)); // 1
//        echo "<hr>";
//        vardump(banks_validate_number_format('1.250,50', 'dot', 'comma')); // true
//        vardump(banks_validate_number_format('1,250,50', 'comma', 'dot')); // true
//        vardump(banks_validate_number_format('1.250,50', 'nospace', 'dot')); // true
//        vardump(banks_validate_number_format('1 250,50', 'space', 'comma')); // true
//        vardump(banks_validate_number_format('1552.20', 'nospace', 'dot')); // true
//        vardump(banks_validate_number_format('10052,20', 'nospace', 'comma')); // true
//
//
//        vardump(banks_validate_number_format("1 520.20", $thousand_separator, $decimalSeparator));
//        vardump(banks_validate_number_format("1 520.20", $thousand_separator, $decimalSeparator));
        ?>

        <?php
        /**
         * <p>
          <?php  //_t("This file have:"); ?> <b><?php //echo count($banks_lines); ?></b>
          <?php // _t("lines"); ?> <b> <?php // echo $cpt_cols_max; ?></b>


          <?php // _t("columns"); ?>

          (
          <span class="label label-danger">
          <b><?php echo $limit_lines_by_file; ?></b> <?php _t("lines max. by page"); ?>
          </span>
          )
          <a href="index.php?c=banks_lines&a=import"><?php _t("Change the file"); ?></a>
          </p>

          <br>
         * 
         */
        ?>




        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td></td>
                    <?php
                    for ($i = 1;
                            $i <= $cpt_cols_max;
                            $i++) {
                        echo '<td>' . $i . '</td>';
                    }
                    ?>
                </tr>
                <tr>
                    <td></td>
                    <?php
                    // esto es la cabezera para actualizar
                    $cols = banks_lines_tmp_search_by_account_number($account_number);
                    $j = 1;
                    foreach ($cols as $key => $col) {
                        echo '<td>';
                        // MODAL
                        include view('banks_lines_tmp', 'modal_edit_long', $col['id']);
                        echo '<br><span class="label label-default">' . $col["template"] . '</span>';
                        echo '</td>';
                        $j++;
                    }
                    // si llega al maximo de columnas, ya no muestra 
                    if ($j <= $cpt_cols_max) {
                        echo "<td>";
                        include view('banks_lines_tmp', 'modal_add_long');
                        echo '</td>';
                    }
                    ?>                   
                </tr>
            </thead>

            <tr>
                <td></td>
                <?php
                foreach ($headers as $header_name => $header_type) {
//                    echo "<td></td>"; 
                    echo '<td><b>' . $header_name . '</b></td>';
                }
                ?>
            </tr>



            <form method="post" action="index.php">                                             
                <tbody>                
                    <?php
                    $sum_control = 0;
                    $class = '';
                    $error_field = '';
                    $errors_import = array();
                    $nl = 1;
                    $icon = '';
                    $operation_list = array();
                    foreach ($banks_lines as $key => $bank_line) {
                        echo '<tr>';
                        echo '<td>' . $nl . '</td>';

                        $cols = banks_lines_tmp_search_by_account_number($account_number);

                        $i = 0;
                        foreach ($bank_line as $data) {

                            $template = $cols[$i]['template'];
                            // si es total lo pasa a float
                            // si es date_operation o date_value intentara pasar el contenido
                            // al formato fecha del sistema
                            //
                            if ($template == 'total') {
                                //vardump($data); 
                                $total_formated = banks_lines_convert_number($data);

                                $sum_control = $sum_control + $total_formated;
                            }

                            //--------------------------------------------------
                            // Empieza a buscar errores
                            // Empieza a buscar errores
                            // Lista de las operations                            
                            if ($template == 'operation') {
                                array_push($operation_list, $data);
                                foreach (array_count_values($operation_list) as $value => $count) {
                                    if ($count > 1) {
                                        array_push($errors_import, array('The operation items must be unique'));
                                        $class = 'class="danger"';
                                        $icon = icon("remove");
                                    }
                                }
                            }

                            if ($template == 'date_operation' || $template == 'date_value' || $template == 'date') {

                                $db_date_format = banks_lines_validate_and_convert_date($data, $bank->getDate_format());
//                                vardump($bank); 
//                                vardump($db_date_format); 
                            }

                            // EMPIEZO EL CONTROL
                            // EMPIEZO EL CONTROL
                            if (($template && $data)) {
// Desaactivo el control para hacerlo en la etapa siguiete

                                $error_field = banks_lines_import_check($template, $data, $account_number);
                            }
                            ////////////////////////////////////////////////////////////////////////////////
                            if ($error_field) {
                                $class = ' danger ';
                                $icon = icon("remove");
                                array_push($errors_import, $error_field);
                            }

//                            echo "<td>$nl</td>";                             
                            switch ($template) {
                                case 'date_operation':
                                case 'date_value':
                                case 'date':
                                    echo '<td class="' . $class . '" width="150"><p>' . _tr("Original date") . ':<br> ' . $icon . ' ' . $data . '  <br>' . _tr("Modified date") . ': <br>' . $db_date_format . '</p></td>';

                                    if (!$error_field) {
                                        echo '<input class="hidden" name="lines[' . $nl . '][' . $template . ']" value="' . $db_date_format . '"> ';
                                    } else {
                                        echo '<input class="hidden" name="lines[' . $nl . '][' . $template . ']" value="' . $data . '"> ';
                                    }

                                    break;

                                case 'total':
                                    echo '<td class="' . $class . '" width="150"><p>' . _tr("Original") . ':<br> ' . $icon . ' ' . $data . '  <br>' . _tr("Modified") . ': <br>' . $total_formated . '</p></td>';
                                    echo '<input class="hidden" name="lines[' . $nl . '][' . $template . ']" value="' . $total_formated . '"> ';
                                    break;

                                default:
                                    echo '<td class="' . $class . '">' . $icon . ' ' . $data . '</td>';

                                    echo '<input class="hidden" name="lines[' . $nl . '][' . $template . ']" value="' . $data . '"> ';
                                    break;
                            }

                            $i++;
                            $error_field = false;
                            $class = false;
                            $icon = '';
                        }
                        echo '</tr>';
                        $nl++;
                    }
                    ?>
                </tbody>
        </table>

        <p>
            <b><?php _t("Sum of total column"); ?></b>: <?php echo $sum_control; ?> 
        </p>





        <?php
        if (!$account_number) {
            array_push($errors_import, array("The account number is mandatory"));
        }

        if (!count($banks_lines)) {
            array_push($errors_import, array("The file appears to have no lines"));
        }

        if (!banks_lines_tmp_search_by_account_number_template($account_number, 'operation')) {
            array_push($errors_import, array("The template must have the operation column"));
        }

        if (!banks_lines_tmp_search_by_account_number_template($account_number, 'total')) {
            array_push($errors_import, array("The template must have the total column"));
        }

        if (count(banks_lines_tmp_search_by_account_number($account_number)) < $cpt_cols_max) {
            array_push($errors_import, array("All columns must have their name"));
        }
        ?>



        <ul>
            <?php
            foreach ($errors_import as $key => $error_import) {
                echo '<li>' . icon("remove") . ' ' . $error_import[0] . '</li>';
            }
            ?>
        </ul>





        <?php if ($errors_import) { ?>

            <p></p>

            <?php
            /**
             *             <input type="hidden" name="c" value="banks_lines_check">
              <input type="hidden" name="a" value="ok_add">
              <input type="hidden" name="redi[redi]" value="1">
             */
            ?>

            <button type="" class="btn btn-danger" disabled="">
                <?php echo icon("remove"); ?> 
                <?php _t("Error"); ?>
            </button>

        <?php } else { ?>

            <input type="hidden" name="c" value="banks_lines">
            <input type="hidden" name="a" value="ok_import">
            <input type="hidden" name="redi[redi]" value="1">

            <button type="submit" class="btn btn-default">
                <?php echo icon("ok"); ?> 
                <?php _t("Submit"); ?>
            </button>

        <?php }
        ?>




        </form>





    </div>
</div>

<?php include view("home", "footer"); ?> 
