<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$factux_code = (isset($_GET["factux_code"]) && $_GET['factux_code'] != '' ) ? clean($_GET["factux_code"]) : false;

$csv = "0.csv";

//$row = 1;
//if (($handle = fopen($csv, "r")) !== FALSE) {
//    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//        $num = count($data);
////        echo "<p> $num fields in line $row: <br /></p>\n";
//        $row++;
//        for ($c = 0; $c < $num; $c++) {
//            //  echo $data[$c] . "<br />\n";
//        }
//    }
//    fclose($handle);
//}


$rows = array_map('str_getcsv', file($csv));

//vardump($rows[0][0]);
//vardump($rows[1][0]);
//vardump(explode(';', $rows[1][0]));
//vardump($rows);

$lines = array();

foreach ($rows as $key => $line) {
//    echo "$line[0]<br>";
    array_push($lines, explode(';', $line[0]));
}










$cuenta = $lines[0][1];

//vardump($cuenta);
//echo "<table border>";
//foreach ($lines as $key => $value) {
//    echo "<tr>";
//        echo "<td>$value[0]</td>";
//        echo "<td>$value[1]</td>";
//        echo "<td>$value[2]</td>";
//        echo "<td>$value[3]</td>";
//        echo "<td>$value[4]</td>";
//        echo "<td>$value[5]</td>";
//        echo "<td>$value[6]</td>";
//        echo "<td>$value[7]</td>";
//        echo "<td>$value[8]</td>";
//        echo "<td>$value[9]</td>";
//        echo "<td>$value[10]</td>";
//        echo "<td>$value[11]</td>";
//        echo "<td>$value[12]</td>";
//    echo "<t/r>";
//}
//echo "</table>";
//vardump($lines);

include view("import", "extractos");
