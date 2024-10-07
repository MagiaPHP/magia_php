<?php include "00_header.php"; ?>

<?php // include "nav_address.php"; ?>

<?php
// Gestion de mensajes cortos
sms($sms);

if ($error) {
    foreach ($error as $key => $value) {
        message("info", "$value");
    }
}
?>



<h1>Logo</h1>
<p>
    Como toda empresa necesitamos una imagen empresarial algo que te haga ver unco
</p>


<a name="next"></a>
<form class="form-horizontal" action="index.php" method="post">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_41">

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>
    </div>

</form>




<?php
shop_registre_next(7);
?>



<?php include "00_footer.php"; ?>

