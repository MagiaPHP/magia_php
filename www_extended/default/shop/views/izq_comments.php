<form class="form-inline" action="index.php?">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="comments_by_order">
    <div class="form-group">
        <input type="text" class="form-control" id="order_id" name="order_id" placeholder="<?php _t("Order number"); ?>">
    </div>
    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
</form>

<br>


<?php if (comments_has_unread_by_contact($u_id) && 1 == 2000) { ?>
    <p>
        <a href="index.php?c=shop&a=comments_by_order&read_all=yes"><?php _t("Mark as read all comments"); ?></a>
    </p>

<?php } ?>

<div class="list-group">

    <?php
    // si puedo ver los pedidos de la empresa 
    // o solo de la oficina 
    if (users_can_see_others_offices($u_id)) {

        $shop_comments_list_orders = shop_comments_list_orders_by_company();
    } else {


        $shop_comments_list_orders = shop_comments_list_orders_by_office();
    }

    foreach ($shop_comments_list_orders as $comments_doc_line) {

        $last_read = comments_read_date_read_by_contact_order($u_id, $comments_doc_line['doc_id']);

        $last_date_from_comments = comments_date_last_comment_by_order('orders', $comments_doc_line['doc_id']);

        $comments_total_by_order = count(comments_unread_by_contact_from_order($u_id, $comments_doc_line['doc_id']));

        $active = ($order_id == $comments_doc_line['doc_id'] ) ? " active " : "  ";

        echo '<a href="index.php?c=shop&a=comments_by_order&order_id=' . $comments_doc_line['doc_id'] . '" class="list-group-item ' . $active . ' " >';

        $comment_link = $comments_doc_line['doc_id'] . ' - ' . _tr(orders_status_field_code('status', orders_field_id('status', $comments_doc_line['doc_id'])));

        if ($last_read < $last_date_from_comments) {
            echo '<b>' . $comment_link . '</b>';
        } else {
            echo $comment_link;
        }
        echo '</a>';
    }
    ?>
</div>
