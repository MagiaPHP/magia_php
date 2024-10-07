<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("magia_table_lines", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">
        <?php include view("magia_table_lines", "nav"); ?>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php // include view("magia_table_lines", "top"); ?>
        <?php
        if ($magia_table_lines) {
            include view("magia_table_lines", "table_index");
        } else {
            message("info", "No items");
        }
        ?>

        <div class="container-fluid">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <?php
                $pagination->createHtml();
                ?>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6 text-right">
                <?php
                include view($c, "form_pagination_items_limit");
                ?>
            </div>
        </div>






        <div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><?php echo icon("plus"); ?></a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">

                    <br>
                    <br>
                    <table class="table table-condensed table-bordered">
                        <tr>
                            <th><?php echo _t('Icon'); ?></th>
                            <th><?php echo _t('header_pre_label'); ?></th>
                            <th><?php echo _t('header_label'); ?></th>
                            <th><?php echo _t('header_post_label'); ?></th>
                        </tr>
                        <tr>
                            <td><?php include "modal_header_icon_update.php"; ?></td>
                            <td><?php include "form_header_pre_label_update.php"; ?></td>
                            <td><?php include "form_header_label_update.php"; ?></td>
                            <td><?php include "form_header_post_label_update.php"; ?></td>
                        </tr>
                    </table>



                </div>
                <div role="tabpanel" class="tab-pane" id="profile">...</div>
                <div role="tabpanel" class="tab-pane" id="messages">...</div>
                <div role="tabpanel" class="tab-pane" id="settings">...</div>
            </div>

        </div>



        <br>
        <br>
        <br>
        <br>



























        <h1>Contacts</h1>

        <?php
        include "modal_table_plus.php";
        ?>


        <table class="table table-condensed">


            <?php
            echo '<thead>';
            echo '<tr>';
            foreach (magia_table_lines_list() as $key => $table_lines) {

//                if($table_lines['header_url']) {
//                    $header_url = str_replace("#header_label#", $table_lines['header_label'], $table_lines['header_url']);
//                }

                echo '<th class="info">';
                echo ($table_lines['header_icon']) ? icon($table_lines['header_icon']) : false . ' ';
                echo $table_lines['header_pre_label'] . ' ';
                echo $table_lines['header_label'] . '  ';
                echo $table_lines['header_post_label'] . ' ';
                include 'dropdown.php';
                echo '</th>';
                //
            }
            //
            echo '<th>';
            include "modal_table_plus.php";
            echo '</th>';

            echo '</tr>';

            echo '</thead>';
            ?>





            <tbody>
                <tr>
                    <?php
                    $f_col = null;
                    $update_f_col = true;

                    foreach (contacts_list() as $key => $contact) {

                        foreach (magia_table_lines_list() as $key => $table_lines) {

                            if ($update_f_col) {
                                $f_col = $table_lines['body_label'];
                            }

                            if ($f_col == $table_lines['body_label']) {
                                $update_f_col = false;
                                echo '</tr></tr>';
                            }


                            echo '<td>';
                            echo ($table_lines['body_pre_label']) . ' ';
                            echo contacts_field_id($table_lines['body_label'], $contact['id']) . ' ';
                            echo ($table_lines['body_post_label']) . ' ';
                            echo '</td>';
                        }
                    }
                    ?>

                </tr>
            </tbody>




        </table>



        <?php
        ($get_defined_functions = get_defined_functions());
        
        vardump($get_defined_functions['user'])
        ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 
