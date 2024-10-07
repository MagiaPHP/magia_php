<?php
/**
 * <div class="panel panel-default">
  <div class="panel-heading">
  <?php echo icon("calendar"); ?>
  <?php _t('By date'); ?>
  </div>
  <div class="panel-body">



  <form action="index.php" method="get">

  <input type="hidden" name="c" value="projects">
  <input type="hidden" name="a" value="search">
  <input type="hidden" name="w" value="by_date_end">

  <div class="form-group">
  <label for="days"><?php _t("The project finished in x days"); ?></label>
  <input type="number" step="any" class="form-control" id="day" placeholder="" value="30">
  </div>


  <button type="submit" class="btn btn-default">Submit</button>

  </form>


  </div>
  </div>

 */
?>



<div class="panel panel-default">
    <div class="panel-heading">
        <?php _menu_icon("top", 'contacts'); ?>

        <?php _t("By contact"); ?>
    </div>

    <ul class="list-group">

        <li class="list-group-item"><a href="index.php?c=projects"><?php _t("All"); ?></a></li>

        <?php
        foreach (projects_unique_from_col('contact_id') as $key => $pufc) {

            $total_projects_by_contact = projects_total_by_contact_id($pufc['contact_id']);

            $icon_total_projects_by_contact = ($total_projects_by_contact) ? '<span class="badge">' . $total_projects_by_contact . '</span>' : '';

            echo '<li class="list-group-item"><a href="index.php?c=projects&a=search&w=by_contact_id&contact_id=' . $pufc['contact_id'] . '">' . contacts_formated($pufc['contact_id']) . '</a> ' . $icon_total_projects_by_contact . '</li>';
            //    vardump($pufc);
        }
        ?>

    </ul>
</div>


<div class="panel panel-default">
    <div class="panel-heading">
        <?php echo icon("time"); ?>

        <?php _t("By status"); ?>
    </div>

    <ul class="list-group">

        <li class="list-group-item"><a href="index.php?c=projects"><?php _t("All"); ?></a></li>

        <?php
        foreach (projects_status_list() as $key => $psl) {


            $icon_status = ($psl['icon']) ? '<span class="' . $psl['icon'] . '"></span>' : '';

            $total_projects_by_status = projects_total_by_status($psl['code']);

            $icon_total_projects_by_status = ($total_projects_by_status) ? '<span class="badge">' . $total_projects_by_status . '</span>' : '';

            echo '<li class="list-group-item">' . $icon_status . ' <a href="index.php?c=projects&a=search&w=by_status&status=' . $psl['code'] . '">' . ($psl['name']) . '</a> ' . $icon_total_projects_by_status . '</li>';
            //    vardump($pufc);
        }
        ?>

    </ul>
</div>