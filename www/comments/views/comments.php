<?php
$comment_side_L = "";
$comment_side_R = "";

//foreach ($comments as $comment_line) { 

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
                                <?php echo contacts_formated($comment_line['sender_id']) ?>
                            </a>
                            - 
                            <?php echo $comment_line["date"]; ?>
                            <?php // echo $new_date = date('Y-M-d', strtotime($comment_line["date"] . "+0 day"));;  ?>

                            <?php
                            // poner $c me permite borrar desde cualquier parte 
                            //
                            echo ( $u_id == $comment_line['sender_id'] ) ? "<a href=\"index.php?c=comments&a=ok_comments_change_status&id=" . $comment_line['id'] . "&status=delete&order_id=$id&doc=$c&doc_id=$id\"><span class=\"glyphicon glyphicon-trash\"></span> " . _tr('Delete') . "</a>" : "  ";
                            ?>  

                        </h4>
                        <p>
                            <?php //echo $comment_line["id"];  ?>
                            <?php echo $comment_line["comment"]; ?>

                        </p>

                        <p>
                            <?php
                            foreach (comments_files_by_comment_id($comment_line['id']) as $comment_file) {

                                

                                echo '<p><img src="' . $comment_file['file'] . '"></p>';
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <?php echo $comment_side_R; ?>
    </div>

<?php } ?>









