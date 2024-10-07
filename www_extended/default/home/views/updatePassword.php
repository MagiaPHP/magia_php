<?php include "header.php"; ?>




<?php

if ($_REQUEST) {
    foreach ($error as $key => $value) {
        message("info", "$value");
    }
}
include "form_updatePassword.php";
?>





<?php include "footer.php"; ?>
