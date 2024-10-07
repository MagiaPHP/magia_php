<div class="well">
    <div class="media">
        <div class="media-left media-middle">
            <a href="#">
                <img class="media-object" src="https://picsum.photos/100" alt="...">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading"><?php echo contacts_formated(addresses_field_id('contact_id', $place['address_id'])) ?></h4>
            <?php echo addresses_field_id('address', $place['address_id']); ?> <br>
            <?php
            echo addresses_field_id('postalcode', $place['address_id']) . " ";
            echo addresses_field_id('city', $place['address_id']) . " ";
            echo addresses_field_id('province', $place['address_id']) . " ";
            ?> <br>
            Tel: xxxx

        </div>
    </div>
    <hr>


    <h3><?php _t("Fechas del evento"); ?></h3>
    <p>
        <?php _t("If it is not on the list, you can add a new place"); ?>
    </p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th><?php _t("Date start"); ?></th>
                <th><?php _t("Time start"); ?></th>
                <th><?php _t("Date end"); ?></th>
                <th><?php _t("Time end"); ?></th>
                <th><?php _t("Action"); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach (shop_agenda_places_dates_search_without_date($id, $place['address_id']) as $key => $agenda_places_dates) {
                echo '<tr>
                <td>' . $agenda_places_dates['date'] . '</td>
                <td>' . $agenda_places_dates['time'] . '</td>
                <td>' . $agenda_places_dates['date_end'] . '</td>
                <td>' . $agenda_places_dates['time_end'] . '</td>
                <td>xxx</td>
            </tr>';
            }
            ?>
        </tbody>



        <form class="form-horizontal" action="index.php" method="post">
            <input type="hidden" name="c" value="shop">
            <input type="hidden" name="a" value="ok_agenda_update_dates">   
            <input type="hidden" name="place_id" value="<?php echo $place['id']; ?>">   
            <input type="hidden" name="redi" value="2">          
            <tfoot>
                <tr>
                    <td><input type="date"  name="date" class="form-control" id="date" placeholder="dd-mm-aaaa"></td>
                    <td>
                        <select class="form-control" name="time">
                            <?php
                            for ($h = 0; $h < 24; $h++) {

                                $selected = ($h == 9 ) ? " selected " : "";

                                echo '<option value="' . (($h * 60) + 00) . '" ' . $selected . '>' . $h . ' h 00</option>';
                                echo '<option value="' . (($h * 60) + 15) . '">' . $h . ' h 15</option>';
                                echo '<option value="' . (($h * 60) + 30) . '">' . $h . ' h 30</option>';
                                echo '<option value="' . (($h * 60) + 45) . '">' . $h . ' h 45</option>';
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <input type="date"  name="date_end" class="form-control" id="date_end" placeholder="dd-mm-aaaa">
                    </td>
                    <td>
                        <select class="form-control" name="time_end">
                            <option value="null"><?php _t("Select one"); ?></option>
                            <?php
                            for ($h = 0; $h < 24; $h++) {
                                echo '<option value="' . (($h * 60) + 00) . '">' . $h . ' h 00</option>';
                                echo '<option value="' . (($h * 60) + 15) . '">' . $h . ' h 15</option>';
                                echo '<option value="' . (($h * 60) + 30) . '">' . $h . ' h 30</option>';
                                echo '<option value="' . (($h * 60) + 45) . '">' . $h . ' h 45</option>';
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
                    </td>
                </tr>
            </tfoot>
        </form>



    </table>

    ...</div>