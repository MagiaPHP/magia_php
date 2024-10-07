<?php message('danger', 'Atention') ?>

<h1><?php _t("You will be cancel this transaction"); ?></h1>

<p>
    <a class="btn btn-danger" href="index.php?c=credit_notes&a=ok_payement_cancel&id=<?php echo $balance_item['id']; ?>" ><?php _t("Yes, cancel"); ?></a>
</p>

