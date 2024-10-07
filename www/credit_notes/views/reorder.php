<?php

//require('db_config.php');
$position = $_POST['position'];
$i = 1;
foreach ($position as $k => $v) {
    $sql = "Update order_by SET position_order=" . $i . " WHERE id=" . $v;
    $mysqli->query($sql);
    $i++;
}
?>