<?php
vardump($_SESSION);
?>
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'expenses'); ?>
        <?php echo _t("Expenses"); ?>
    </a>
    <a href="index.php?c=expenses" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=expenses&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>

<a href="index.php?c=expenses&a=add">   00 Provider</a><br>
<a href="index.php?c=expenses&a=add_05">05 Frecuency</a><br>
<a href="index.php?c=expenses&a=add_10">10 invoice number</a><br>
<a href="index.php?c=expenses&a=add_15">15 deadline</a><br>
<a href="index.php?c=expenses&a=add_20">20 title</a><br>
<a href="index.php?c=expenses&a=add_25">25 Category</a><br>
<a href="index.php?c=expenses&a=add_30">30 Totals</a><br>
<a href="index.php?c=expenses&a=add_35">35 Date</a><br>
<a href="index.php?c=expenses&a=add_40">40 Vacio</a><br>
<a href="index.php?c=expenses&a=add_50">50 account</a><br>
<a href="index.php?c=expenses&a=add_60">60 vacio</a><br>
<a href="index.php?c=expenses&a=add_70">70 preview</a><br>




<?php
vardump($expense);
?>