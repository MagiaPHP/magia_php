<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">           
            <?php
            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc($c, $a, 'panel_status', array('c' => $c, 'a' => $a, 'id' => $id));
            }
            ?>
            <?php _menu_icon("top", 'expenses'); ?>


            <?php _t("Expenses"); ?>
        </h3>
    </div>
    <div class="panel-body">

        <table class="table table-striped">
            <tr>
                <td>

                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'status', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>


                    <?php _t("Status"); ?>
                </td>
                <td>
                    <?php
//                    vardump($expense->getStatus()); 

                    if ($expense->getStatus() == 0) { // Draf
                        include "modal_change_status_to_registred.php";
                    }

                    if ($expense->getStatus() == 10) { // To pay
                        include "modal_change_status_to_draf.php";
                    }
                    ?>

                    <?php echo _tr(expenses_status_by_status($expense->getStatus())); ?>

                    <?php //echo $expenses['status'] ;   ?>


                </td>
            </tr>

            <?php
            /**
             * 
              <tr>
              <td>
              <?php
              if (modules_field_module('status', "docu")) {
              echo docu_modal_bloc($c, $a, 'type', array('c' => $c, 'a' => $a, 'id' => $id));
              }
              ?>



              <?php _t("Type"); ?></td>
              <td>
              <?php // echo _t(expenses_type($expense->getType())); ?>
              </td>
              </tr>
             */
            ?>

            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'id', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>



                    <?php _t("Expense id"); ?></td>
                <td>
                    <?php echo $expense->getId(); ?>
                </td>
            </tr>


            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'id', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>



                    <?php _t("Office"); ?></td>
                <td>
                    <?php echo contacts_formated($expense->getOffice_id()); ?>
                </td>
            </tr>





            <?php
            /**
             *             <tr>
              <td>
              <?php
              if (modules_field_module('status', "docu")) {
              echo docu_modal_bloc($c, $a, 'from_budget', array('c' => $c, 'a' => $a, 'id' => $id));
              }
              ?>
              <?php _t("From budget"); ?></td>
              <td>
              <?php
              include "modal_budget_id_push.php";
              echo $expense->getBudget_id();
              ?>

              </td>
              </tr>

             */
            ?>

            <?php
            /**
             * 
              <tr>
              <td>
              <?php
              if (modules_field_module('status', "docu")) {
              echo docu_modal_bloc($c, $a, 'credit_note_id', array('c' => $c, 'a' => $a, 'id' => $id));
              }
              ?>



              <?php _t("Credit note"); ?></td>
              <td>
              <a href="index.php?c=credit_notes&a=details&id=<?php echo $expense->getCredit_note_id(); ?>">
              <?php
              echo $expense->getCredit_note_id();
              ?>
              </a>
              </td>
              </tr>
             */
            ?>

            <?php
            /*
              <tr>
              <td><?php _t("Seller") ; ?></td>
              <td><?php echo contacts_formated(expenses_field_id("seller_id" , $id)) ; ?></td>
              </tr>
             * 
             * 
             * 
             *             <tr>
              <td>
              <?php
              if (modules_field_module('status', "docu")) {
              echo docu_modal_bloc($c, $a, 'client', array('c' => $c, 'a' => $a, 'id' => $id));
              }
              ?>
              <?php _t("Provider"); ?>
              </td>
              <td>

              <?php echo $expense->getProvider_id(); ?> -
              <a href="index.php?c=contacts&a=details&id=<?php echo $expense->getProvider_id(); ?>">
              <?php echo contacts_formated(expenses_field_id("provider_id", $id), array('c' => $c, 'a' => $a, 'id' => $id)); ?>
              </a>
              </td>
              </tr>
             */
            ?>


            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'my_ref', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>
                    <?php _t("My reference"); ?>
                </td>  
                <td>                    
                    <?php
                    if ($expense->getMy_ref()) {
                        include "modal_my_ref_update.php";
                        echo $expense->getMy_ref();
                    } else {
                        include "form_my_ref_update.php";
                    }
                    ?>
                </td>                    
            </tr>




            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'category_code', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>
                    <?php _t("Expense category"); ?>


 <?php
                    if (permissions_has_permission($u_rol, 'expenses_categories', 'update')) {
                        echo '<a href="index.php?c=expenses_categories">' . icon("cog") . '</a>';
                    }
                    ?>


                </td>  
                <td>
                    <?php
                    if (permissions_has_permission($u_rol, $c, 'update')) {
                        include "form_category_code_update.php";
                    } else {
                        echo expenses_categories_search_by_unique('category', 'code', $expense->getCategory_code());
                    }
                    ?>


                    <?php
                    //include "modal_category_code_update.php";
                    ?>

                    <?php //echo expenses_categories_search_by_unique('category', 'code', $expense->getCategory_code());  ?>

                   

                </td>                    
            </tr>




            <?php
            /**
             *  <tr>
              <td>
              <?php
              if (modules_field_module('status', "docu")) {
              echo docu_modal_bloc($c, $a, 'client', array('c' => $c, 'a' => $a, 'id' => $id));
              }
              ?>
              <?php _t("invoice number provider"); ?>
              </td>
              <td>
              <?php
              include "modal_invoice_number_update.php";
              ?>
              </td>
              </tr>
             */
            ?>



            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'client', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>
<?php _t("Provider"); ?>:
                </td>
                <td>                  
                    <a href="index.php?c=contacts&a=details&id=<?php echo ($expense->getProvider_id()); ?>"><?php echo ($expense->getProvider_id()); ?></a>
                    -
                    <a href="index.php?c=contacts&a=details&id=<?php echo ($expense->getProvider_id()); ?>"><?php echo contacts_formated($expense->getProvider_id()); ?></a>
                </td>
            </tr>

            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'date', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>
                    <?php _t("Date invoice"); ?>:
                </td>
                <td>                  
<?php echo magia_dates_formated($expense->getDate()); ?>
                </td>
            </tr>

            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'deadline', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>
                    <?php _t("Deadline"); ?>:
                </td>
                <td>                                                          
<?php echo magia_dates_formated($expense->getDeadline()); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'date_registre', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>
                    <?php _t("Date registre"); ?>:
                </td>
                <td>                                                          
<?php echo ($expense->getDate_registre()); ?>
                </td>
            </tr>




            <tr>
                <td>

                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'title', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>


                    <?php _t("Expense title"); ?>:
                </td>
                <td>
                    <?php
//                    if ($expense->getTitle()) {
//                        if (permissions_has_permission($u_rol, 'expenses', "update")) {
//                            modal(uniqid(), "Edit",
//                                    array("btn" => 'default', "label" => 'Edit'),
//                                    array("c" => 'expenses', "a" => 'form_title_update'),
//                                    $params = array("id" => $expense->getId()), '$rename');
//                        }
//                        echo $expense->getTitle();
//                    } else {
//                        if (permissions_has_permission($u_rol, 'expenses', "update")) {
//                            modal(uniqid(), "Add title",
//                                    array("btn" => 'default', "label" => 'Add'),
//                                    array("c" => 'expenses', "a" => 'form_title_update'),
//                                    $params = array("id" => $expense->getId()), '$rename');
//                        }
//                    }
                    ?>
                    <?php
                    if ($expense->getTitle()) {
                        include "modal_title_update.php";
                        echo $expense->getTitle() . " ";
                    } else {
                        include "form_title_update.php";
                    }
                    ?>

                </td>
            </tr>



            <?php
            /**
             *             <tr>
              <td>

              <?php
              if (modules_field_module('status', "docu")) {
              echo docu_modal_bloc($c, $a, 'seller', array('c' => $c, 'a' => $a, 'id' => $id));
              }
              ?>



              <?php _t("Seller"); ?>:
              </td>

              <td>


              <?php //if ($expense->getSeller_id()) {   ?>
              <?php
              //                        if (permissions_has_permission($u_rol, 'expenses', "update")) {
              //                            modal(uniqid(), "Edit seller",
              //                                    array("btn" => 'default', "label" => 'Edit'),
              //                                    array("c" => 'expenses', "a" => 'form_seller_id_update'),
              //                                    $params = array(
              //                                "id" => $id,
              //                                "seller_id" => $expenses['seller_id'],
              //                                    ), '$rename');
              //                        }
              //                        //echo $expenses['title'];
              //                    } else {
              //                        if (permissions_has_permission($u_rol, 'expenses', "update")) {
              //                            modal(uniqid(), "Add seller",
              //                                    array("btn" => 'default', "label" => 'Add'),
              //                                    array("c" => 'expenses', "a" => 'form_seller_id_update'),
              //                                    $params = array(
              //                                "id" => $id,
              //                                "seller_id" => $u_id,
              //                                    ), '$rename');
              //                        }
              ?>
              <?php // } ?>

              <?php echo $expense->getSeller_id(); ?> -
              <a href="index.php?c=contacts&a=details&id=<?php echo $expense->getSeller_id(); ?>">
              <?php echo contacts_formated(expenses_field_id("seller_id", $expense->getId())); ?>
              </a>


              </td>
              </tr>


             */
            ?>



                    <?php if (modules_field_module('status', 'projectssssssssssss')) { ?>
                <tr>
                    <td>
                        <?php
                        if (modules_field_module('status', "docu")) {
                            echo docu_modal_bloc($c, $a, 'project', array('c' => $c, 'a' => $a, 'id' => $id));
                        }
                        ?>




                        <?php _t("Project"); ?>
                    </td>
                    <td>
                        <?php
                        // vardump(projects_list_by_expense($id));
                        if (permissions_has_permission($u_rol, 'expenses', "update")) {
//                            if (projects_inout_search_by_expense_id($id)) {
                            if (projects_inout_by_expense_id($expense->getId())) {
                                echo "Project: " . projects_inout_by_expense_id($expense->getId())['project_id'];
                                echo "<br>";
                                include "modal_project_update.php";
                            } else {
                                include "modal_project_insert.php";
                            }
                        } else {
                            // solo ve
                            echo "solo ve";
                        }
                        ?>       
                    </td>
                </tr>
<?php } ?>



            <?php
            if (
                    _options_option("config_expenses_see_via_web") &&
                    modules_field_module('status', 'app')
            ) {
                ?>
                <tr>
                    <td>

                        <?php
                        if (modules_field_module('status', "docu")) {
                            echo docu_modal_bloc($c, $a, 'see_via_app', array('c' => $c, 'a' => $a, 'id' => $id));
                        }
                        ?>



                        <?php _t("View via the web"); ?>
                    </td>
                    <td>
                        <?php
                        include "modal_expenses_see_via_web.php";
                        ?>       
                    </td>
                </tr>
<?php } ?>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
