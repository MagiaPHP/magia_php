<?php

function expenses_status_by_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT name FROM expenses_status WHERE code = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    return $data[0];
}
