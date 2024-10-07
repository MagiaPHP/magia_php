<?php

$order_by = $_POST['order_by'];

$i = 1;
foreach ($position as $k => $v) {
    $sql = "Update `channels` SET `channel_number`=" . $i . " WHERE `id`=" . $v;
    $mysqli->query($sql);

    $i++;
}