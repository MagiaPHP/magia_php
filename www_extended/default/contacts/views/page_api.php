<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">        
        <?php include view("contacts", 'izq_details'); ?>
    </div>

    <div class="col-sm-10 col-md-10 col-lg-10">

        <?php
        if ($_REQUEST && $a) {
            foreach ($error as $key => $value) {
                message("warning", "$value");
            }
        }
        ?>

        <?php
        if ((isset($smst) && $smst != false ) && (isset($smst) && $smst != false)) {
            message($smst, $smsm);
        }
        ?>

        <?php // include view('contacts', 'nav_contacts_api') ?>
        <?php //include "nav_details_company.php"; ?>   
        <?php //include "top_details_company.php"; ?>   
        <h1><?php // _t("Api key");    ?></h1>

        <div class="text-center">

            <img 
                src="https://d301sr5gafysq2.cloudfront.net/frontbucket/assets/present/4c223587e96bc17b2e44acea353ff6b47c962033/security-shield.429c18dc.svg" 
                width="200" 
                alt="alt"/>

            <p>
                <?php _t("Use API keys to gain read-only access to this repository"); ?>.
            </p>
            <?php _t("Learn more about using API keys"); ?>.
            </p>




            <?php if (permissions_has_permission($u_rol, "api", "create")) { ?>
                <button 
                    type="button" 
                    class="btn btn-primary" 
                    data-toggle="modal" data-target="#contacts_api_add"
                    >
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <?php _t("Add"); ?>
                </button>
                <div class="modal fade" id="contacts_api_add" tabindex="-1" role="dialog" aria-labelledby="contacts_api_addLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button 
                                    type="button" 
                                    class="close" 
                                    data-dismiss="modal" 
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="contacts_api_addLabel">
                                    <?php echo _t("Add KEY API"); ?>
                                </h4>
                            </div>
                            <div class="modal-body">                                      
                                <?php
                                $redi = 5;
                                include "form_contacts_api_add.php";
//                include view("api", 'form_add');
                                ?>         
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>


        </div>










        <?php if ($api) { ?> 
            <h3><?php _t('Api key list'); ?></h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><?php _t("Contact"); ?></th>
                        <th><?php _t("API KEY"); ?></th>
                        <th><?php _t("Crud"); ?></th>
                        <th><?php _t("Date_start"); ?></th>
                        <th><?php _t("Date_end"); ?></th>
                        <th><?php _t("Action"); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        if (!$api) {
                            message("info", "No items");
                        }



                        foreach ($api as $api_details) {


                            $menu = '<div class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          Actions
          <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <li><a href="index.php?c=api&a=details&id=' . $api_details["id"] . '">' . _tr("Details") . '</a></li>
          <li><a href="index.php?c=api&a=edit&id=' . $api_details["id"] . '">' . _tr("Edit") . '</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="index.php?c=api&a=delete&id=' . $api_details["id"] . '">' . _tr("Delete") . '</a></li>
          </ul>
          </div>';
                            //   $photo = addresses_photos_principal($address["id"]);
                            //   $contact_name = contacts_field_id("name", $api_details["contact_id"]);
                            //   $contact_lastname = contacts_field_id("lastname", $api_details["contact_id"]);
                            echo "<tr id=\"$api_details[id]\">";
//                        echo "<td>$api_details[id]</td>";
                            echo "<td>" . contacts_formated($api_details['contact_id']) . "</td>";
                            echo "<td>$api_details[api_key]</td>";
                            echo "<td>$api_details[crud]</td>";
                            echo "<td>$api_details[date_start]</td>";
                            echo "<td>$api_details[date_end]</td>";
//                        echo "<td>$api_details[order_by]</td>";
//                        echo "<td>$api_details[status]</td>";
//                        echo "<td>$menu</td>";
                            echo '<td>
                        <a href="#" data-toggle="modal" data-target="#apiDelete_' . $api_details['id'] . '">
                                <span class="glyphicon glyphicon-trash"></span></a>
                                


        <div class="modal fade" id="apiDelete_' . $api_details['id'] . '" tabindex="-1" role="dialog" aria-labelledby="apiDeleteLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="apiDeleteLabel">
                            ' . _tr("Delte Api") . ' ' . $api_details['id'] . '
                        </h4>
                    </div>
                    <div class="modal-body">
                        ' . _tr("Do you want to delete this access key?") . '

                        <form action="index.php" method="post">
                            <input type="hidden" name="c" value="api">
                            <input type="hidden" name="a" value="ok_delete">
                            <input type="hidden" name="id" value="' . $api_details['id'] . '">
                            <input type="hidden" name="contact_id" value="' . $id . '">
                            <input type="hidden" name="redi" value="5">
                            
                            
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="sure" required> ' . _tr("Yes, I'm sure") . '
                                </label>
                            </div>
                            
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            
                            <button type="submit" class="btn btn-danger">
                                ' . _tr("Delete") . '
                            </button>
                        </form>





                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            ' . _tr("Close") . '
                        </button>
                    </div>
                </div>
            </div>
        </div>
                                </td>';
                            echo "</tr>";
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        <?php }
        ?>




    </div>

</div>


<?php include view("home", "footer"); ?>  

