<table class="table table-condensed">

    <thead>
        <tr>
            <th><?php _t("Comments"); ?></th>
            <th><?php _t("Actions"); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach (docs_comments_list_by_controller($c) as $key => $comment_list) { ?>

        <form method="post" action="index.php">

            <input type="hidden" name="c" value="invoices">
            <input type="hidden" name="a" value="commentsUpdateOk">
            <input type="hidden" name="invoice_id" value="<?php echo $id; ?>">
            <input type="hidden" name="doc_comment_id" value="1111">
            <input type="hidden" name="comments" value="<?php echo $comment_list['comments']; ?>">
            <input type="hidden" name="redi" value="1">

            <tr>
                <td><?php echo ($comment_list['comments']); ?></td>
                <td>
                    <button type="submit" class="btn btn-primary"><?php _t("Add comment"); ?></button>
                </td>
            </tr>


        </form>

    <?php } ?>

</tbody>

</table>
