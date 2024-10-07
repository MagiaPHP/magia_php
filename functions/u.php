<?php

function u_owner_id() {
    global $_SESSION;

    return isset($_SESSION['u_owner_id']) ? $_SESSION['u_owner_id'] : false;
}
