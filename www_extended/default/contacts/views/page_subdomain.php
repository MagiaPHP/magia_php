<?php include view("contacts", "page_header"); ?>  

<?php
include "nav_details_company.php";
?>   

<?php if ($company->getTva()) { ?>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">



            <h3><?php _t("New account"); ?></h3>
            <p>
                <?php _t("This form is to create a new account in this site"); ?> <b><?php echo $cpanel3['domain']; ?></b>
            </p>




            <table class="table table-condensed">
                <tr>
                    <td><b><?php _t("Company name"); ?></b></td>
                    <td><?php echo ($company->getName()); ?></td>
                    <td><?php echo (!$company->getName()) ? message("error", "Company name is mandatory") : "ok"; ?></td>
                </tr>

                <tr>
                    <td><?php _t("Vat number"); ?></td>                
                    <td><?php echo $company->getTva(); ?></td>
                    <td><?php echo (!$company->getTva()) ? message("error", "Vat number is mandatory") : "ok"; ?></td>
                </tr>

                <tr>
                    <td><?php _t("Email"); ?></td>                
                    <td><?php echo $company->getDirectory("Email"); ?></td>
                    <td><?php echo (!$company->getDirectory("Email")) ? message("error", "Email is mandatory") : "ok"; ?></td>
                </tr>

                <tr>
                    <td><?php _t("Billing address"); ?></td>

                    <?php
                    if ($company->getAddresses("Billing")) {
                        echo "<td>";
                        echo ($company->getAddresses("Billing")->getNumber());
                        ?> - 

                    <?php echo ($company->getAddresses("Billing")->getAddress()); ?><br>
                    <?php echo ($company->getAddresses("Billing")->getPostcode()); ?> - 
                    <?php
                    echo ($company->getAddresses("Billing")->getCity());
                    echo "<br>";
                    echo ($company->getAddresses("Billing")->getCountry());

                    echo "</td>";

                    echo "<td>ok</td>";
                } else {
                    echo "<td></td>";
                    echo "<td>" . message("error", "Billing address is mandatory") . "</td>";
                }
                ?>
                </tr>

            </table>


            <h3><?php _t("Contacts"); ?></h3>
            <table class="table table-condensed">

                <?php
                foreach (cloud_employees_list_by_contact_id($company->getId()) as $key => $cloud_employe) {

                    $cc_ee = cloud_contact_details($cloud_employe['contact_id']);

                    echo '<tr>';
                    echo '<td>' . $cc_ee['name'] . '</td>';
                    echo '<td>' . $cc_ee['lastname'] . '</td>';
                    echo '<td>' . cloud_directory_list_by_contact_name($cloud_employe['contact_id'], 'email') . '</td>';
                    echo '</tr>';
                }
                ?>

            </table>


            <h3><?php _t("Subdomain"); ?></h3>


            <table class="table table-condensed">                
                <tr>
                    <td><?php _t("Subdomain"); ?></td>

                    <td>
                        <a href="https://<?php echo $company->getSubdomain_Data("subdomain_domain"); ?>" target="_new"><?php echo $company->getSubdomain_Data("subdomain_domain"); ?></a>
                    </td>

                    <td>
                        <?php
                        if (!cpanel3_sub_domain_exist($company->getSubdomain_Data("subdomain_domain"))) {
                            echo _tr("The subdomain can be created");
                        } else {
                            message('warning', 'The subdomain already exists');
                        }
                        ?>
                    </td>
                </tr>



                <tr>
                    <td><?php _t("DB"); ?></td>
                    <td>
                        <?php echo $company->getSubdomain_Data("db_name"); ?>
                    </td>
                    <td>
                        <?php
                        echo (cpanel3_db_exist($company->getSubdomain_Data("db_name"))) ? message('warning', 'Db already exist') : "Is free to registre";
                        ?>
                    </td>
                </tr>

                <tr>
                    <td><?php _t("DB user"); ?></td>
                    <td>
                        <?php echo $company->getSubdomain_Data("db_user"); ?>
                    </td>
                    <td>
                        <?php
                        echo (cpanel3_db_user_exist($company->getSubdomain_Data("db_user"))) ? message('warning', 'Db user already exist') : "Is free to registre";
                        ?>
                    </td>
                </tr>

                <tr>
                    <td><?php echo _t("config_file"); ?></td>
                    <td>
                        <?php echo $company->getSubdomain_Data("config_file"); ?>
                    </td>
                    <td>

                        <?php
                        if (!file_exists('admin/' . $company->getSubdomain_data()['config_file'])) {
                            echo _tr("The file can be created");
                        } else {
                            message('warning', 'The file already exists');
                        }
                        ?>

                    </td>
                </tr>


            </table>



            <p>
                <?php
                _t("If there is not error, you can registre a new account");
                ?>
            </p>

            <?php
            if ($company->Why_can_not_add_a_subdomain()) {
                echo "<h3>" . _tr("Errors") . "</h3>";
                foreach ($company->Why_can_not_add_a_subdomain() as $key => $value) {
                    message('info', $value);
                }
            } else {
                ?>
                <p>
                    <?php echo "<h3>" . _t("Create subdomain") . "</h3>"; ?>
                </p>
                <p>
                    <a href="index.php?c=contacts&a=ok_subdomain_create&id=<?php echo $company->getId(); ?>" class="btn btn-primary" ><?php _t("Click here to create"); ?></a>
                </p>
            <?php } ?>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

            <h3><?php _t("Subdomains of this contact"); ?></h3>

            <table class="table table-responsive">
                <tr>
                    <th><?php _t("Subdomain"); ?></th>
                    <th><?php _t("Plan"); ?></th>
                    <th><?php _t("Creation date"); ?></th>
                </tr>

                <?php
                foreach (subdomains_search_by('contact_id', $id) as $key => $ssb) {
                    echo '<tr>
                    <td><a href="https://' . $ssb['subdomain'] . '.' . $ssb['domain'] . '" target="_new">https://' . $ssb['subdomain'] . '.' . $ssb['domain'] . '</a></td>
                    <td>' . $ssb['plan'] . '</td>
                    <td>' . $ssb['date_registre'] . '</td>
                </tr>
                ';
                }


//                DELETE FROM `subdomains`; 
//                ALTER TABLE `subdomains` ADD `contact_id` INT(11) NOT NULL AFTER `id`;
//                        ALTER TABLE `subdomains` ADD FOREIGN KEY(`contact_id`) REFERENCES `contacts`(`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
                ?>

                <form class="form-horizontal" action="index.php" method="post" >
                    <input type="hidden" name="c" value="subdomains">
                    <input type="hidden" name="a" value="ok_add">
                    <input type="hidden" name="contact_id" value="<?php echo $id; ?>">
                    <input type="hidden" name="create_by" value="<?php echo contacts_field_id('tva', $u_owner_id); ?>">
                    <input type="hidden" name="prefix" value="<?php echo $company->getSubdomain_Data("prefix"); ?>">
                    <input type="hidden" name="domain" value="<?php echo $company->getSubdomain_Data("domain"); ?>">
                    <input type="hidden" name="code" value="<?php echo magia_uniqid(); ?>">
                    <input type="hidden" name="create_by" value="<?php echo contacts_field_id('tva', $id); ?>">

                    <input type="hidden" name="redi[redi]" value="5">
                    <input type="hidden" name="redi[c]" value="contacts">
                    <input type="hidden" name="redi[a]" value="subdomain">
                    <input type="hidden" name="redi[params]" value="id=<?php echo $id; ?>">


                    <tr>
                        <td>

                            <div class="input-group">
                                <div class="input-group-addon">https://</div>
                                <input 
                                    type="text" 
                                    name="subdomain" 
                                    class="form-control" 
                                    id="subdomain" 
                                    placeholder="https://xxxxxxxx.web.com" 
                                    value="<?php echo $company->getSubdomain_Data("subdomain"); ?>" 
                                    >
                                <div class="input-group-addon">
                                    .<?php echo $company->getSubdomain_Data("domain"); ?>
                                </div>
                            </div>



                        </td>
                        <td>
                            <select class="form-control" name="plan">
                                <?php
                                foreach (subdomains_plan_list() as $key => $sbpl) {
                                    echo '<option value="' . $sbpl['plan'] . '">' . $sbpl['plan'] . '</option>';
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>

                        </td>
                    </tr>
            </table>

            <p>
                <a href="index.php?c=subdomains"><?php _t("See all subdomains"); ?></a>
            </p>


            <hr>
            <h3></h3>
            <?php
//        vardump($company);
//        vardump($company->getEmployees()[0]);
//        var_dump($company->getEmployees()[0]->getName());
//        var_dump($company->getEmployees()[0]->getLastname());
//        cpanel3_db_fill($hostname, $db_user, $db_pass, $db_name, $company);
            // Mi coneccion actual a cloud
//        vardump( $cpanel3);
//        vardump( $cpanel3['sql_file_path_update']);
//        
//        db_fill( $cpanel3['sql_file_path_update'], $hostname, $db_user, $db_pass, $db_name, true);
//        
//        db_update($cpanel3['sql_file_path_update'], $hostname, $db_user, $db_pass, $db_name, $company->getTva(), 1);
            ?>
        </div>
    </div>


<?php } else { ?>
    Subdomain Only for a companies
<?php } ?>



<?php include view("contacts", "page_footer"); ?>  

