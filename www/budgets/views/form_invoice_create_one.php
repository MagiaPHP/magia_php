<?php
/* * *
 * si el presupuesto tiene facturas parciales, ya no se puede usar esta ocion
 * Registra aceptado y crear una factura individual
 * 
 */
?>

<?php if (1 == 1) { ?>

    <form action="index.php" method="post" class="form-inline" >
        <input type="hidden" name="c" value="budgets">
        <input type="hidden" name="a" value="ok_create_one">
        <input type="hidden" name="id" value="<?php echo $id; ?>">            
        <button type="submit" class="btn btn-primary"><?php _t("Yes, do it"); ?></button>
    </form>

    <?php
} else {
    message("info", "This budget has partial invoices, continue with that modality");
}
?>



