<table class="table table-striped table-condensed">
    <tbody>
        <?php foreach (docs_comments_search_by_controller($c) as $key => $comment) { ?>
        <form action="index.php" method="post" class="form-horizontal">
            <input type="hidden" name="c" value="invoices"> 
            <input type="hidden" name="a" value="commentsUpdateOk"> 
            <input type="hidden" name="invoice_id" value="<?php echo "$id"; ?>"> 
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
                    <a href="index.php?c=docs_comments&a=ok_delete&id=<?php echo $comment['id']; ?>&redi[redi]=1&redi[invoice_id]=<?php echo $id; ?>">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
        </form>
    <?php } ?>
</tbody>
</table>
<hr>


<p class="text-right">
    <?php if (permissions_has_permission($u_rol, 'docs_comments', "update")) { ?>
        <a href="index.php?c=docs_comments"><?php _t("See all comments"); ?></a>
    <?php } ?>
</p>


