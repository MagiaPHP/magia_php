<div class="panel panel-default">
    <div class="panel-heading">
        <?php echo $projects->getName(); ?>
    </div>
    <div class="panel-body">






        <?php
        // #################################################################
        // address_update
        ?>
        <p>            
            <?php if (permissions_has_permission($u_rol, 'projects', 'update')) { ?>
                <?php echo $projects->getDescription(); ?>
                <a href="#" data-toggle="modal" data-target="#description_update">
                    <?php echo icon("pencil"); ?>                             
                </a>
                <?php include "modal_description_update.php"; ?>                    
            <?php } else { ?> 
                <?php echo $projects->getDescription(); ?>
            <?php } ?>
        </p>

        <?php
        // address_update
        // #################################################################
        ?>





        <table class="table table-condensed">
            <tr>
                <td><?php echo icon("user"); ?></td>
                <td class="text-right">
                    <?php
                    if ($projects->getContact_id() != 1022) {
                        echo contacts_formated($projects->getContact_id());
                    } else {
                        include "modal_projectsDetailsAddContact.php";
                    }
                    ?>
                </td>
            </tr>  


            <?php
            // #################################################################
            // date_start
            ?>
            <tr>                                
                <?php if (permissions_has_permission($u_rol, 'projects', 'update')) { ?>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#date_start_update">
                            <?php echo icon("calendar"); ?> 
                            <?php _t("Start date"); ?>
                        </a>
                        <?php include "modal_date_start_update.php"; ?>                    
                    </td>     

                <?php } else { ?>
                    <td>
                        <?php echo icon("calendar"); ?> 
                        <?php _t("Start date"); ?>
                    </td>     

                <?php } ?>
                <td class="text-right"><?php echo $projects->getDate_start(); ?></td>
            </tr>           
            <?php
            // date_start
            // #################################################################
            ?>


            <?php
            // #################################################################
            // getDate_end
            ?>
            <tr>                                
                <?php if (permissions_has_permission($u_rol, 'projects', 'update')) { ?>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#date_end_update">
                            <?php echo icon("calendar"); ?> 
                            <?php _t("End date"); ?>
                        </a>
                        <?php include "modal_date_end_update.php"; ?>                    
                    </td>     

                <?php } else { ?>
                    <td>
                        <?php echo icon("calendar"); ?> 
                        <?php _t("Start"); ?>
                    </td>     

                <?php } ?>
                <td class="text-right"><?php echo $projects->getDate_end(); ?></td>
            </tr>            
            <?php
            // getDate_end
            // #################################################################
            ?>


            <?php
            // #################################################################
            // address_update
            ?>
            <tr>                                
                <?php if (permissions_has_permission($u_rol, 'projects', 'update')) { ?>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#address_update">
                            <?php echo icon("map-marker"); ?>                             
                        </a>
                        <?php include "modal_address_update.php"; ?>                    
                    </td>     

                <?php } else { ?>
                    <td>
                        <?php echo icon("map-marker"); ?>                         
                    </td>     

                <?php } ?>
                <td class="text-right"><?php echo $projects->getAddress(); ?></td>
            </tr>            
            <?php
            // address_update
            // #################################################################
            ?>                   
        </table>
    </div>
</div>





<?php
/**
 * 
  <div class="panel panel-default">
  <div class="panel-heading">
  <?php _t("Other projects of this contact"); ?>
  </div>
  <div class="panel-body">
  <table class="table table-condensed">
  <?php
  foreach (projects_search_by('contact_id', $projects->getContact_id()) as $key => $psbci) {
  $proyects_list = new Projects();
  $proyects_list->setProjects($psbci['id']);

  $icon = ($projects->getId() == $psbci['id'] ) ? icon('chevron-right') : null;

  echo '   <tr>
  <td><a href="index.php?c=projects&a=details&id=' . $proyects_list->getId() . '">' . $icon . ' ' . $proyects_list->getName() . '</td>
  <td></td>
  </tr>';
  }
  ?>
  </table>
  <form method="post" action="index.php">
  <input type="hidden" name="c" value="projects">
  <input type="hidden" name="a" value="ok_add_short">
  <input type="hidden" name="contact_id" value="<?php echo $projects->getContact_id(); ?>">
  <input type="hidden" name="redi[redi]" value="4">

  <div class="form-group">
  <label for="name"><?php _t("Add project"); ?></label>
  <input
  type="text"
  class="form-control"
  id="name"
  name="name"
  placeholder="<?php _t("Title"); ?>"
  >
  </div>

  <div class="form-group">
  <label for="description" class="sr-only"><?php _t("Description"); ?></label>
  <textarea class="form-control" name="description" placeholder="<?php _t("Description"); ?>"></textarea>
  </div>
  <button type="submit" class="btn btn-default">
  <?php echo icon("plus"); ?>
  <?php _t("Add"); ?>
  </button>
  </form>
  </div>
  </div>

 */
?>