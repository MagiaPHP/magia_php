

<ul class="nav nav-tabs">

    <li role="presentation" <?php echo ($a == 'details' ) ? ' class="active" ' : '' ?>><a href="index.php?c=projects&a=details&id=<?php echo $id; ?>"><?php _t("Details"); ?></a></li>


    <?php
    if (modules_field_module("status", "tasks") && permissions_has_permission($u_rol, "tasks", "read")) {
        ?>
        <li role="presentation" <?php echo ($a == 'tasks' ) ? ' class="active" ' : '' ?>><a href="index.php?c=projects&a=tasks&id=<?php echo $id; ?>"><?php _t("Tasks"); ?></a></li>
    <?php } ?>


    <?php if (modules_field_module('status', 'hr') && permissions_has_permission($u_rol, "hr", "read")) { ?>
        <li role="presentation" <?php echo ($a == 'hours_worked' ) ? ' class="active" ' : '' ?>><a href="index.php?c=projects&a=hours_worked&id=<?php echo $id; ?>"><?php _t("Hours worked"); ?></a></li>
    <?php } ?>

    <?php
    /**
     * 
      <li role="presentation" >

      </li>


      <li role="presentation" <?php echo ($a == 'hours_worked' ) ? ' class="active" ' : '' ?>  class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      <?php _t("Hours worked"); ?>

      <span class="caret"></span>

      </a>


      <ul class="dropdown-menu">
      <li>
      <a href="index.php?c=projects&a=hours_worked&id=<?php echo $id; ?>"><?php _t("By month"); ?></a>
      </li>

      <li><a href="#"><?php _t("By day"); ?></a></li>

      </ul>
      </li>
     */
    ?>




</ul>

<br>



