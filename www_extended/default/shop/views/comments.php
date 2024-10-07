<?php
$comment_side_L = "";
$comment_side_R = "";

foreach ($comments as $comment_line) {

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
                                    '<img class="media-object img-thumbnail" src="www/gallery/img/users/user.webp" alt="default" width="50"/>'
                            ;
                            ?>
                        </a>
                    </div>

                    <div class="media-body">
                        <h4 class="media-heading">
                            <a href="index.php?c=contacts&a=details&id=<?php echo $comment_line['sender_id']; ?>">
                                <?php //echo contacts_formated($comment_line['sender_id'])   ?>
                            </a>
                            <?php echo contacts_formated($comment_line['sender_id']) ?>
                            - 
                            <?php echo $comment_line["date"]; ?>
                            <?php // echo $new_date = date('Y-M-d', strtotime($comment_line["date"] . "+0 day"));;  ?>

                            <?php
                            // poner $c me permite borrar desde cualquier parte 
                            //
                            echo ( $u_id == $comment_line['sender_id'] ) ? "<a href=\"index.php?c=shop&a=ok_comments_change_status&id=" . $comment_line['id'] . "&status=delete&order_id=$id&doc=$c&doc_id=$id\"><span class=\"glyphicon glyphicon-trash\"></span> " . _tr('Delete') . "</a>" : "  ";
                            ?>  

                        </h4>
                        <p>
                            <?php echo $comment_line["comment"]; ?>

                        </p>
                    </div>
                </div>
            </div>

        </div>

        <?php echo $comment_side_R; ?>
    </div>

<?php } ?>



<?php //include "comments.php";    ?>
<hr>
<a name="comments"></a>

<?php
if (permissions_has_permission($u_rol, "shop_comments", "create")) {

    if (orders_can_add_comment($id)) {

        $redi = 1;

        echo "<h3>" . _tr("If you wish to send a comment to the laboratory regarding this order, please do it here") . "</h3>";

        include "form_comments_add.php";
    } else {
        message('info', 'The status of the order does not allow adding comments');
    }
}
?>






<?php 
/**

foreach ( comments_search_by_controller_id("orders" , $id) as $key => $value ) { ?>
    <div class="media">

        <div class="media-left media-middle">
            <a href="#">
                <img class="media-object" src="user.webp" width="50" alt="...">
            </a>
        </div>

        <div class="media-body">
            <h4 class="media-heading">
                <?php echo contacts_formated($value['sender_id'])?> - <?php echo $value["date"]; ?>
            </h4>
            <p>
                <?php echo $value["comment"]; ?>

            </p>
        </div>
    </div>
<?php } ?>
 * 
 */







