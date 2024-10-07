<?php
$comment_side_L = "";
$comment_side_R = "";

foreach (comments_search_by_controller_doc_id($c, $id) as $comment_line) {

    //vardump($comment_line);

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
                            
                            $contacts_picture_src = contacts_picture_src($comment_line['sender_id']);
                            
                            echo (file_exists($contacts_picture_src)) ?
                                    '<img class="media-object img-thumbnail" src="' . $contacts_picture_src . '" alt="jiho" width="50"/>' :
                                    '<img class="media-object img-thumbnail" src="www/gallery/img/users/user.webp" alt="default" width="50"/>'
                            ;
                            ?>
                        </a>
                    </div>

                    <div class="media-body">
                        <h5 class="media-heading">
                            <a href="index.php?c=contacts&a=details&id=<?php echo $comment_line['sender_id']; ?>">
                                <?php echo contacts_formated($comment_line['sender_id']) ?>
                            </a>
                            - 
                            <?php echo $comment_line["date"]; ?>

                            <?php
                            // poner $c me permite borrar desde cualquier parte 
                            //
                            echo ( $u_id == $comment_line['sender_id'] ) ? "<a href=\"index.php?c=comments&a=ok_comments_change_status&id=" . $comment_line['id'] . "&status=delete&order_id=$id&doc=$c&doc_id=$id&redi[redi]=5&redi[c]=$c&redi[a]=$a&redi[params]=id=$id\">".icon("trash")." " . _tr('Delete') . "</a>" : "  ";
                            ?>  

                        </h5>
                        <p>

                            <?php echo $comment_line["comment"]; ?>

                        </p>

                        <p>


                        </p>
                    </div>
                </div>
            </div>

        </div>

        <?php echo $comment_side_R; ?>
    </div>

<?php } ?>









