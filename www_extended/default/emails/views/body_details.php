
<h2> 
    <?php echo $email->getSubjet(); ?>
</h2>

<?php
include "body_items.php";
?>



<br>

<?php
foreach (emails_search_by('father_id', $id) as $key => $emails_search_by) {
    $email = new Emails();
    $email->setEmails($emails_search_by['id']);
    include "body_items.php";
}

//vardump(emails_search_by('father_id', $id));
?>



<form method="post" action="index.php">
    <input type="hidden" name="c" value="emails">
    <input type="hidden" name="a" value="ok_reply">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="redi" value="2">

    <div class="form-group">
        <label for="message"><?php _t("Reply"); ?></label>
        <textarea class="form-control" name="message" rows="15"></textarea>
    </div>
    <button type="submit" class="btn btn-default">
        <?php _t("Send"); ?>
    </button>
</form>
