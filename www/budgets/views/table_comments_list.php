<table class="table table-striped">
    <tbody>
        <?php foreach (docs_comments_search_by_controller($c) as $key => $comment) { ?>

        <form action="index.php" method="post" class="form-horizontal">
            <input type="hidden" name="c" value="budgets"> 
            <input type="hidden" name="a" value="commentsUpdateOk"> 
            <input type="hidden" name="budget_id" value="<?php echo "$id"; ?>"> 
            <input type="hidden" name="comments" value="<?php echo $comment['comments']; ?>"> 
            <input type="hidden" name="save" value="true"> 
            <input type="hidden" name="redi" value="2"> 
            <tr>
                <td>
                    <?php echo $comment['comments']; ?>
                </td>
                <td>
                    <button type="submit" class="btn btn-default">
                        <?php echo icon("plus"); ?>                        
                    </button>
                </td>
                <td>
                    <a class="btn btn-default" href="index.php?c=docs_comments&a=ok_delete&id=<?php echo $comment['id']; ?>&redi[redi]=2&redi[budget_id]=<?php echo $id; ?>#comments">
                        <?php echo icon("trash"); ?>
                    </a>
                </td>
            </tr>
        </form>
    <?php } ?>
</tbody>
</table>

