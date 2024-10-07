<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                ...
                Crea un folder, anade el email a ese folder y regresa al email

                <form method="post" action="index.php">
                    <input type="hidden" name="c" value="emails">
                    <input type="hidden" name="a" value="ok_push_folder">
                    <input type="hidden" name="id" value="<?php echo $email->getId(); ?>">
                    <input type="hidden" name="redi" value="2">


                    <div class="form-group">
                        <label for="folder">
                            <?php _t("Folder name"); ?>
                        </label>
                        <input type="text" class="form-control" name="folder" id="folder" placeholder="<?php _t("Folder name"); ?>">
                    </div>
                    <button type="submit" class="btn btn-default">
                        <?php _t("Save"); ?>
                    </button>
                </form>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>  



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
    <input type="hidden" name="id" value="<?php echo $email->getId(); ?>">
    <input type="hidden" name="redi" value="4">



    <div class="form-group">
        <label for="message"><?php _t("Message"); ?></label>
        <textarea class="form-control" name="message" id="message" rows="5"></textarea>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>


</form>
