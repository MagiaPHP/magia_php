<ul class="nav nav-pills">    

    <li role="presentation" class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-folder-close"></span>
            <?php echo $email->getFolder() ?>

            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">

            <?php
            foreach (emails_folders_search_by('contact_id', $u_id) as $key => $emails_folders_search_by) {
                echo '<li><a href="index.php?c=emails&a=ok_update_folder&id=' . $email->getId() . '&folder=' . $emails_folders_search_by["folder"] . '">' . $emails_folders_search_by["icon"] . ' ' . $emails_folders_search_by["folder"] . '</a></li>';
            }
            ?>
            <li role="separator" class="divider"></li>
            <li><a href="#"><?php _t("New folder"); ?></a></li>

        </ul>
    </li>

    <li role="presentation"><a href="#"><span class="glyphicon glyphicon-share-alt"></span> Renviar</a></li>
    <li role="presentation"><a href="index.php?c=emails&a=ok_update_folder&id=<?php echo $email->getId(); ?>&folder=Trash"><span class="glyphicon glyphicon-trash"></span> <?php _t("Trash"); ?></a></li>
    <li role="presentation"><a href="#"><span class="glyphicon glyphicon-print"></span> Print</a></li>
</ul>



<div class="page-header">
    <h2> 
        <?php echo $email->getSubjet(); ?>
    </h2>
    <h3>
        <?php echo contacts_formated($email->getReciver_id()); ?> 
        <small><?php echo $email->getDate_registre(); ?></small>
        <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <span class="glyphicon glyphicon-ok"></span>
        </a>
    </h3>
</div>
<div class="collapse" id="collapseExample">
    <div class="well">
        <p>Leido el: <?php echo $email->getDate_read(); ?></p>
        <p>Leido el: </p>
    </div>
</div>
<p>
    <?php echo $email->getMessage(); ?>
</p>


<?php
//vardump(emails_search_by('father_id', $email->getId()));

foreach (emails_search_by('father_id', $email->getId()) as $key => $email_r) {
    $email_reply = new Emails();
    $email_reply->setEmails($email_r['id']);
    echo '<div class="panel panel-default">';
//    echo '<div class="panel-heading">' . contacts_formated($email_reply->getSender_id()) . '</div>';
    echo '<div class="panel-body">';
    echo "<h4>" . contacts_formated($email_reply->getSender_id()) . "</h4>";
    echo "<p>" . $email_reply->getMessage() . "</p>";
    echo '</div>';
    echo '</div>';
}
?>



<form method="post" action="index.php">
    <input type="hidden" name="c" value="emails">
    <input type="hidden" name="a" value="ok_reply">
    <input type="hidden" name="redi" value="5">
    <input type="hidden" name="id" value="<?php echo $email->getId(); ?>">

    <div class="form-group">
        <label for="message"><?php _t("Responder"); ?></label>
        <textarea class="form-control" name="message" id="message" rows="5"></textarea>
    </div>
    <button type="submit" class="btn btn-default">
        <?php _t("Send"); ?>
    </button>
</form>
