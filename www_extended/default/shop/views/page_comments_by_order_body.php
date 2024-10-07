<h3>
    <?php _t("Order"); ?> <a href="index.php?c=shop&a=orderDetails&id=<?php echo $order_id; ?>&src=comments_by_order"><?php echo $order_id; ?></a> 
</h3>

<p>
    <?php echo _tr("Last visit"); ?> <?php echo comments_read_search_date_read_by_order_id_contact_id($order_id, $u_id); ?>
</p>

<?php
//
$last_read = comments_read_date_read_by_contact_order($u_id, $order_id);

$last_date_from_comments = comments_date_last_comment_by_order('orders', $order_id);

/**
 * SELECT c.id, c.date, c.sender_id, c.doc, c.doc_id, c.comment, cr.order_id, cr.contact_id, cr.date_read FROM `comments` as c JOIN comments_read as cr ON c.doc_id = cr.order_id WHERE c.doc = 'orders' 
 */
$comment_side_L = "";
$comment_side_R = "";

// comments_search_by_controller_doc_id
//foreach ($comments as $comment_line) {
foreach (comments_search_by_controller_doc_id('orders', $order_id) as $comment_line) {
    if ($u_id !== $comment_line['sender_id']) {
        $comment_side_L = '<div class="col-xs-12 col-md-2 col-lg-2"></div>';
        $comment_side_R = '';
    } else {
        $comment_side_L = '';
        $comment_side_R = '<div class="col-xs-12 col-md-2 col-lg-2"></div>';
    }
    ?>
    <div class="row">
        <?php echo $comment_side_L; ?>
        <div class="col-xs-12 col-md-10 col-lg-10">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="media-left media-middle">
                        <a href="#">
                            <?php
                            echo (file_exists('www/gallery/img/users/' . $comment_line['sender_id'] . '.jpg')) ?
                                    '<img class="media-object img-thumbnail" src="www/gallery/img/users/' . $comment_line['sender_id'] . '.jpg" alt="jiho" width="50"/>' :
                                    '<img class="media-object img-thumbnail" src="www/gallery/img/users/user.webp" alt="default" width="50"/>';
                            ?>
                        </a>
                    </div>
                    <div class="media-body">
                        <p class="media-heading">
                            <?php echo contacts_formated($comment_line['sender_id']) ?>
                            - 
                            <?php echo $comment_line["date"]; ?>
                            <?php // echo $new_date = date('Y-M-d', strtotime($comment_line["date"] . "+0 day"));;    ?>

                            <?php
                            // poner $c me permite borrar desde cualquier parte 
                            //
                            // echo ( $u_id == $comment_line['sender_id'] ) ? "<a href=\"index.php?c=comments&a=ok_comments_change_status&id=" . $comment_line['id'] . "&status=delete&order_id=$order_id&doc=$c&doc_id=$order_id\"><span class=\"glyphicon glyphicon-trash\"></span> " . _tr('Delete') . "</a>" : "  ";
                            ?>  
                        </p>
                        <h4>
                            <?php echo $comment_line["comment"]; ?>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $comment_side_R; ?>
    </div>
<?php } ?>