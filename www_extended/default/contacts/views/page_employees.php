<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">        
        <?php include view("contacts", 'izq_details'); ?>
    </div>


    <div class="col-sm-10 col-md-10 col-lg-10">

        <?php include "nav_employees.php"; ?> 

        <?php include "top_details_company.php"; ?>

        <?php // include "part_contacts_nav_pills.php"; ?>

        <p></p>
        <p>
            <?php _t("An employee is a contact who works for the company"); ?>
        </p>




        <?php if (permissions_has_permission($u_rol, 'configdddddddddd', 'update')) { ?>
            <p>
                <a href="index.php?c=config&a=ok_contacts_view&data=cdv&redi[redi]=3&redi[id]=<?php echo $id; ?>"><span class="glyphicon glyphicon-th-large"></span></a>
                <a href="index.php?c=config&a=ok_contacts_view&data=list&redi[redi]=3&redi[id]=<?php echo $id; ?>"><span class="glyphicon glyphicon-th-list"></span></a>
                <?php
                if (modules_field_module('status', "docu")) {
                    echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
                }
                ?>
            </p>
        <?php } ?>

        <?php
//        vardump($employees_list);                
//        vardump(_options_option('config_contacts_view'));

        switch (_options_option('config_contacts_view')) {
            case 'list':
                include "table_contacts_employees.php";
                break;

            case 'cdv':
                include "part_contacts_cv.php";
                break;

            default:
                include "table_contacts_employees.php";

                //include "part_index_list_alt.php";

                break;
        }



        // vista lista, 
        // vista cdv
//        vardump($employees_list);
//
//        if ($employees_list) {
//
//
//            include "table_contacts_employees.php";
////            include "table_contacts_employees2.php";
//        } else {
//            message('info', 'No items');
//        }
//        
//        
        ?>

    </div>
</div>
<?php include view("home", "footer"); ?>  









