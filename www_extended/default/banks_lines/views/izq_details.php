<?php

if ($banks_lines->getTotal() < 0) {
    include "izq_details_out.php";
} else {
    include "izq_details_in.php";
}


//vardump($banks_lines);
?>