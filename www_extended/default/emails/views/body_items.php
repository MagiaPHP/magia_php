<?php if ($u_id == $email->getSender_id()) { ?>
    <div class = "panel panel-default">
        <div class="panel-body">
            <?php echo $email->getMessage(); ?>
        </div>
    </div>
<?php } else { ?>
    <div class = "panel panel-default">
        <div class = "panel-heading"><?php echo contacts_formated($email->getSender_id()); ?></div>
        <div class="panel-body">
            <?php echo $email->getMessage(); ?>
        </div>
    </div>
<?php } ?>





<?php
/**
 * 
 * <div class="media">
  <div class="media-left">
  <a href="#">
  <img class="media-object" src="https://picsum.photos/50" alt="...">
  </a>
  </div>
  <div class="media-body">
  <h4 class="media-heading"><?php echo contacts_formated($email->getSender_id()); ?></h4>
  <?php echo $email->getMessage(); ?>
  </div>
  </div>


  <div class="page-header">
  <h3>
  <?php echo contacts_formated($email->getSender_id()); ?>
  <small><?php echo $email->getDate_registre(); ?></small>

  <a data-toggle="collapse" href="#email_items_<?php echo $email->getId(); ?>" aria-expanded="false" aria-controls="email_items_<?php echo $email->getId(); ?>">
  <span class="glyphicon glyphicon-ok"></span>
  </a>

  </h3>
  </div>
  <div class="collapse" id="email_items_<?php echo $email->getId(); ?>">
  <div class="well">
  <p>Leido el: <?php echo $email->getDate_read(); ?></p>

  </div>
  </div>
  <p>
  <?php echo $email->getMessage(); ?>
  </p>

 */
?>