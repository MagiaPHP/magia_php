<?php
//vardump(docu_list_controllers_by_lang($u_language));
?>
<div class="text-center">
    <a 
        class="btn btn-warning" 
        href="index.php?c=docu&a=export_pdf"
        target="docu"
        >
        <span class="glyphicon glyphicon-print"></span> 
        <?php _t("PDF") ?>

    </a>
</div>

<br>

<?php
/**
 * <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><?php echo $controllers; ?></div>
  <div class="panel-body">

  <form action="index.php" method="get" class="navbar-form navbar-left">
  <input type="hidden" name="c" value="docu">
  <input type="hidden" name="a" value="edit">
  <input type="hidden" name="id" value="<?php echo $id; ?>">



  <div class="form-group">
  <select class="form-control selectpicker" data-live-search="true" name="controllers" required="">
  <option value="all"><?php _t('All'); ?></option>
  <?php
  foreach (docu_list_controllers_by_lang($u_language) as $key => $dlcbl) {

  $selected = ( $dlcbl['controllers'] == $controllers ) ? " selected " : "";

  echo '<option value="' . $dlcbl['controllers'] . '" ' . $selected . '>' . $dlcbl['controllers'] . '</option>';
  }
  ?>

  </select>
  </div>
  <button type="submit" class="btn btn-default"><?php _t("Search"); ?></button>
  </form>


  </div>

  <!-- List group -->
  <ul class="list-group">
  <?php
  foreach (docu_list_actions_by_controllers_and_lang($controllers, $u_language) as $key => $dlabcal) {
  echo '<li class="list-group-item"><a href="index.php?c=docu&a=edit&id=' . $dlabcal["id"] . '">' . $dlabcal["action"] . '</a></li>';
  }
  ?>
  </ul>
  </div>

 */
?>
<?php
/**
 * <?php
  foreach (docu_list_controllers_by_lang($u_language) as $key => $clc) {

  $class_controller = ($clc['controllers'] == $docu->getControllers()) ? "primary" : "default";

  echo '
  <div class="panel panel-' . $class_controller . '">
  <div class="panel-heading"> ';
  echo _menu_icon('top', $clc['controllers']);
  echo " ";
  echo _tr($clc['controllers']);
  echo '</div>';

  echo '<ul class="list-group">';
  foreach (docu_list_actions_by_controllers_and_lang($clc["controllers"], $u_language) as $key => $dlabc) {

  $class_dlabc = ($id == $dlabc["id"]) ? " list-group-item-warning " : "";

  echo '<li class="list-group-item ' . $class_dlabc . '">';
  echo '<span class="glyphicon glyphicon-menu-right"></span>';
  echo '<a href="index.php?c=docu&a=edit&id=' . $dlabc["id"] . '">' . $dlabc['title'] . '</a>';
  echo '</li>';

  foreach (docu_blocs_search_by_docu_id($dlabc['id']) as $key => $dbsbdi) {

  $class_bloc = ($dbsbdi['id'] == $id && $c == 'docu_blocs') ? " list-group-item-warning " : "";

  echo '<ul>';
  echo '<li class="list-group-item ' . $class_bloc . '">';
  echo '<span class="glyphicon glyphicon-menu-right"> ';
  echo '<a href="index.php?c=docu_blocs&a=edit&id=' . $dbsbdi['id'] . '">' . $dbsbdi['bloc'] . '</a>';
  echo '</li>';
  echo '</ul>';
  }
  }

  echo '</ul>
  </div>';
  }
  ?>

  <li class="list-group-item list-group-item-warning">Porta ac consectetur ac</li>


 */
?>


<br>
<br>

<ul>
    <?php
    foreach (docu_list_controllers_by_lang($u_language) as $key => $clc) {
        echo '<li>' . _tr($clc['controllers']) . '</li>';
        echo "<ul>";
        foreach (docu_list_actions_by_controllers_and_lang($clc["controllers"], $u_language) as $key => $dlabc) {
            $selected = ($id == $dlabc["id"]) ? " list-group-item list-group-item-warning " : "";
            echo '<li class="' . $selected . '"><a href="index.php?c=docu&a=edit&id=' . $dlabc["id"] . '">' . $dlabc["title"] . '</a></li>';
            echo "<li>";

            echo "<ul>";
            foreach (docu_blocs_search_by_docu_id($dlabc['id']) as $key => $dbsbdi) {
                echo '<li><a href="index.php?c=docu_blocs&a=edit&id=' . $dbsbdi['id'] . '">' . $dbsbdi['title'] . '</a></li>';
            }

            echo "</ul>";

            echo "</li>";
        }
        echo "</ul>";
    }
    ?>           
</ul>

