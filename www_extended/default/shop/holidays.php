<?php

include "../../../admin/conect_db.php";
include "../../../www/_content/functions.php";
// Agrego para evitar errores en el shop
include "../../../www_extended/default/_options/functions.php";
// va despues para evitar errores en el shop
include "../../../admin/config.php";
//
include "../../../admin/translater.php";
################################################################################
################################################################################
################################################################################
################################################################################

global $db, $u_id;

if ($_POST['calltype']) {

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    } else if ($_POST['calltype'] == 'options_disabled') {
        $selected_id = $_POST['selected_id'];

        $disabled = '';

        $sql = '';
        $sql2 = '';
        $sql3 = '';
        $sql4 = '';
        $sql5 = '';

        $result = array();

        $disabled_items = array();

        $sql = $db->prepare("select date from holidays ");

        $sql->execute(array(
                //$selected_id
        ));

        $tmf_num = $sql->rowCount();

        if ($tmf_num > 0) {
            while ($row = $sql->fetch()) {
                $disabled_items[] = $row['date'];
            }
        }

        $result[] = array(
            'disabled_ids' => $disabled_items,
        );
        echo json_encode($result);
    }
}