
</div>


<?php
if (substr(users_field_contact_id('language', $u_id), 0, 2) == "ar") {
    echo '<div class="col-sm-3 col-md-3 col-lg-3"> ';
    include "izq.php";
    echo '</div>';
} else {
    //   include "izq.php"; 
}
?>        

</div>




<?php include view("home", "footer"); ?>  
