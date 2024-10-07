<div class="panel panel-default">
    <div class="panel-body">
        <h3><?php _t("Invoice Frecuency"); ?></h3>


        <?php
        echo "Solo poner en el preview la tabla";

        // si times
        if ($expense->getTimes()) {
            // desde la start $times veces

            if ($expense->getTimes() == 1) {
                echo "<h4>1) Pago una sola vez</h4>";
                include "part_frecuency_10.php";
            } else {
                echo "<h4>20) desde la " . $expense->getDate_start() . "  se repite " . $expense->getTimes() . " veces cada " . $expense->getEvery() . " </h4>";
                //include "part_frecuency_20.php";
            }
        } else {
            // repite desde start cada every hasta end

            if ($expense->getDate_end()) {
                echo "<h4>30) desde " . $expense->getDate_start() . "  se repite cada " . $expense->getEvery() . " hasta  " . $expense->getDate_end() . "    </h4>";
                //include "part_frecuency_30.php";
            } else {
                echo "<h4>40) desde " . $expense->getDate_start() . "  se repite cada " . $expense->getEvery() . " de forma indefinida    </h4>";
                // include "part_frecuency_40.php";
            }
        }
        ?>

        <h2>

            <?php
//            if ($expense->getTimes()) {
//                // Caso: Pago una sola vez o se repite varias veces
//                if ($expense->getTimes() == 1) {
//                    echo "1) Pago una sola vez";
//                    include "part_frecuency_10.php";
//                } else {
//                    echo "20) Desde la " . $expense->getDate_start() . " se repite " . $expense->getTimes() . " veces";
//                    include "part_frecuency_20.php";
//                }
//            } else {
//                // Caso: Repite desde start cada every hasta end
//                $repetition_info = "30) Desde " . $expense->getDate_start() . " se repite cada " . $expense->getEvery();
//                $repetition_info .= $expense->getDate_end() ? " hasta " . $expense->getDate_end() : " de forma indefinida";
//                echo $repetition_info;
//
//                // Incluir archivo según la frecuencia
//                $frequency_code = $expense->getEvery();
//                include "part_frecuency_" . $frequency_code . ".php";
//            }
            ?>




            <?php
//            if ($expense->getTimes()) {
//                // Caso: Pago una sola vez o se repite varias veces
//                echo ($expense->getTimes() == 1) ? "1) Pago una sola vez" : "20) Desde la " . $expense->getDate_start() . " se repite " . $expense->getTimes() . " veces";
//            } else {
//                // Caso: Repite desde start cada every hasta end
//                $repetition_info = "30) Desde " . $expense->getDate_start() . " se repite cada " . $expense->getEvery();
//                $repetition_info .= $expense->getDate_end() ? " hasta " . $expense->getDate_end() : " de forma indefinida";
//                echo $repetition_info;
//            }
            ?>

        </h2>







        <?php
//        vardump($expense->getEvery());
//
//        switch ($expense->getEvery()) {
//            case 'day':
////                include 'part_add_frecuency_unique.php';
//                include 'part_add_frecuency_every_x_time.php';
////                include 'part_add_frecuency_x_times.php';
////                include 'part_add_frecuency_indefinite.php';
//                break;
//            case 'month':
////                include 'part_add_frecuency_unique.php';
//                include 'part_add_frecuency_every_x_time.php';
////                include 'part_add_frecuency_x_times.php';
////                include 'part_add_frecuency_indefinite.php';
//                break;
//            case 'tri':
////                include 'part_add_frecuency_unique.php';
//                include 'part_add_frecuency_every_x_time.php';
////                include 'part_add_frecuency_x_times.php';
////                include 'part_add_frecuency_indefinite.php';
//                break;
//            case 'sem':
////                include 'part_add_frecuency_unique.php';
//                include 'part_add_frecuency_every_x_time.php';
////                include 'part_add_frecuency_x_times.php';
////                include 'part_add_frecuency_indefinite.php';
//                break;
//            case 'year':
////                include 'part_add_frecuency_unique.php';
//                include 'part_add_frecuency_every_x_time.php';
////                include 'part_add_frecuency_x_times.php';
////                include 'part_add_frecuency_indefinite.php';
//                break;
//            case 'once':
//                include 'part_add_frecuency_unique.php';
////                include 'part_add_frecuency_every_x_time.php';
////                include 'part_add_frecuency_x_times.php';
////                include 'part_add_frecuency_indefinite.php';
//                break;
//
//            default:
//                break;
//        }
        ?>




    </div>
</div>


