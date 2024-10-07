<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include "izq.php"; ?>
    </div>


    <div class="col-sm-12 col-md-10 col-lg-10">
        <?php include "nav.php"; ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php _t("File") ?></th>
                    <th><?php _t("Bank"); ?></th>
                    <th><?php _t("Action"); ?></th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 1;

                $directory = "www/gallery/img/_" . $config_db . "/";

                $scanned_directory = array_diff(scandir($directory), array('..', '.', '.*'));
                foreach ($scanned_directory as $archivo) {
                    if (!is_dir("$directory/$archivo")) {


                        echo '
                <tr>
                    <td>' . $i . '</td>
                    <td>
                        ' . $archivo . '
                    </td>
                    
                    <td>
                    <div class="dropdown">
                      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        ' . _tr("Select a bank account") . '
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">';

                        foreach (banks_list_by_contact_id_status($u_owner_id, 1) as $key => $bank) {
                            echo '<li><a href="index.php?c=banks_lines&a=import_check&file=' . $archivo . '&account_number=' . $bank['account_number'] . '&redi=1">' . $bank['bank'] . ' - ' . $bank['account_number'] . ' </a></li>';
                        }
                        echo '

    
                        </ul>
                      </div>

                      </td>
                    <td>
                        <a href="index.php?c=banks_lines&a=ok_delete_file&file=' . $archivo . '&redi[redi]=6">' . icon("trash") . ' ' . _tr("Delete") . '</a>
                    </td>

                 
                </tr>';
                    }
                    $i++;
                }
                ?>

            </tbody>
        </table>



        <?php
//vardump(files_get_total_files_in_folder('tmp')); 


        if (files_get_total_files_in_folder('tmp') >= 3) {
            message('info', 'You have reached the maximum number of possible files, delete some to continue uploading more files');
        } else {
            //  include view("banks_lines", "izq_import");
        }
        ?>




    </div>



</div>

<?php include view("home", "footer"); ?> 
