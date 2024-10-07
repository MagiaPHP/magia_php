<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php echo _menu_icon('top', 'balance'); ?>
            <?php _t("Search"); ?>
        </h3>
    </div>
    <div class="panel-body">

        <form  action="index.php" method="get">

            <input type="hidden" name="c" value="balance">
            <input type="hidden" name="a" value="search">
            <input type="hidden" name="w" value="short">

            <div class="form-group">
                <label for="client_id">
                    <?php _t("Contact"); ?>
                </label>

                <select class="form-control selectpicker" data-live-search="true" name="client_id" required="">
                    <option value="all"><?php _t("All"); ?></option>

                    <?php foreach (contacts_headoffice_list(array("order_by" => 'ORDER BY name ASC')) as $key => $headoffice) { ?>
                        <option value="<?php echo $headoffice['owner_id']; ?>">
                            <?php echo contacts_formated($headoffice['owner_id']); ?>
                        </option>
                    <?php } ?>
                </select>

            </div>

            <div class="form-group">
                <label for="year"><?php _t('Year'); ?></label>
                <select class="form-control" name="year">                                                                      
                    <?php
                    for ($i = 2021; $i < date('Y') + 1; $i++) {
                        // selecciono el año presente
                        $selected = ($i == date('Y')) ? " selected " : "";
                        echo '<option value="' . $i . '"  ' . $selected . '  >' . $i . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="trimester">
                    <?php _t("Trimester"); ?>
                </label>
                <?php
                $selected_1 = false;
                $selected_2 = false;
                $selected_3 = false;
                $selected_4 = false;

                switch (date("m")) {
                    case "01":
                    case "02":
                    case "03":
                        $selected_1 = " selected ";
                        break;

                    case "04":
                    case "05":
                    case "06":
                        $selected_2 = " selected ";
                        break;

                    case "07":
                    case "08":
                    case "09":
                        $selected_3 = " selected ";
                        break;

                    case "10":
                    case "11":
                    case "12":
                        $selected_4 = " selected ";
                        break;

                    default:
                        break;
                }
                ?>

                <select class="form-control" name="m"> 

                    <?php
                    for ($i = 1; $i < 13; $i++) {

                        $selected = ($i == date('n')) ? " selected " : "";
                        ?> 
                        <option value="<?php echo $i; ?>"   <?php // echo $selected;                                           ?>   ><?php echo _tr(magia_dates_month($i)); ?></option>
                    <?php } ?>

                    <option value="null" disabled=""><?php _t("By Trimester"); ?></option>

                    <option value="t1" <?php echo $selected_1 ?>>
                        <?php _t("January"); ?>, 
                        <?php _t("February"); ?>, 
                        <?php _t("March"); ?>
                    </option>
                    <option value="t2" <?php echo $selected_2 ?>>
                        <?php _t("April"); ?>, 
                        <?php _t("May"); ?>, 
                        <?php _t("June"); ?>
                    </option>
                    <option value="t3" <?php echo $selected_3 ?>>
                        <?php _t("July"); ?>, 
                        <?php _t("August"); ?>, 
                        <?php _t("September"); ?>
                    </option>
                    <option value="t4" <?php echo $selected_4 ?>>
                        <?php _t("October"); ?>, 
                        <?php _t("November"); ?>, 
                        <?php _t("December"); ?>
                    </option>
                </select>
            </div>

            <?php
//            foreach (expenses_status_list() as $key => $ist) {
//                echo ' <div class="checkbox" >
//                <label>
//                    <input type="checkbox" name="status[]" value="' . $ist['code'] . '" checked> ' . $ist['name'] . '
//                </label>
//            </div>';
//            }
            ?>

            <div class="form-group">
                <select class="form-control" name="order_by">                                                                      
                    <?php
                    $order_by_list = array(
                        1 => "Id (Default)",
                        2 => "Client",
                        3 => "Expense id",
                        4 => "Invoice id",
                        5 => "Credit note id",
                        6 => "Type",
//                    7 => "Client",
//                    8 => "Client",
//                    9 => "Client",
                        10 => "Total",
                        11 => "Ref.",
//                    12 => "Client",
                        13 => "ce",
                        14 => "Date",
//                    15 => "Client",
//                    16 => "Client",
                        17 => "Canceled code",
                    );
                    foreach ($order_by_list as $key => $value) {
                        echo '<option value="' . $key . '">' . $key . ' - ' . $value . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="checkbox">
                <label>
                    <input name="only_cancelled" type="checkbox" value="true" > <?php _t("Only cancelled"); ?>
                </label>
            </div>

            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
                <?php _t("Search"); ?>
            </button>

        </form>

        <br>

        <a href="index.php?c=panels&a=ok_hidden&id=<?php echo $panel->getId(); ?>&redi=1"><?php echo icon("eye-close"); ?></a>


    </div>
</div>
