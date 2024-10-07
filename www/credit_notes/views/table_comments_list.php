<table class="table table-striped">
    <tbody>
        <?php foreach (docs_comments_search_by_controller($c) as $key => $comment) { ?>
        <form action="index.php" method="post" class="form-horizontal">
            <input type="hidden" name="c" value="credit_notes"> 
            <input type="hidden" name="a" value="commentsUpdateOk"> 
            <input type="hidden" name="credit_note_id" value="<?php echo "$id"; ?>"> 
            <input type="hidden" name="comments" value="<?php echo $comment['comments']; ?>"> 
            <input type="hidden" name="redi" value="2"> 
            <tr>
                <td>
                    <?php echo $comment['comments']; ?>
                </td>
                <td>
                    <button type="submit" class="btn btn-default">
                        <?php _t("Add this comment"); ?>
                    </button>
                </td>

                <td>
                    <a href="index.php?c=docs_comments">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>

            </tr>
        </form>
    <?php } ?>
</tbody>
</table>

