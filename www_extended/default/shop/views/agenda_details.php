<?php include view("home", "header"); ?>
<div class="row">

    <div class="col-md-2">
        <hr>
    </div>

    <div class="col-md-8">    

        <h1><?php echo $agenda['title']; ?></h1>
        <h3><?php _t("Category"); ?> : <?php echo $agenda['category']; ?></h3>
        <h3><?php _t("Public"); ?> : <?php echo $agenda['public']; ?></h3>
        <p><?php echo $agenda['description']; ?></p>

        <h2><?php _t("Organizer"); ?></h2>

        <?php
        foreach ($agenda['agenda_organizers'] as $key => $organizer) {
//            vardump($organizer);
            $organizer['name'] = contacts_field_id('name', $organizer['contact_id']);
            $organizer['tel'] = directory_by_contact_name($organizer['contact_id'], 'Tel');
            $organizer['email'] = directory_by_contact_name($organizer['contact_id'], 'Email');

            echo '<p>' . $organizer['name'] . '</p>
        <p>' . _tr("Tel") . ' ' . $organizer['tel'] . '</p>
        <p>' . _tr("Email") . ' ' . $organizer['email'] . '</p>';
        }
        ?>





        <h2>Fechas del evento</h2>
        <A NAME="dates"></A>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?php _t("Ciudad"); ?></th>
                    <th><?php _t("Start date"); ?></th>
                    <th><?php _t("Start time"); ?></th>
                    <th><?php _t("End date"); ?></th>
                    <th><?php _t("End time"); ?></th>
                    <th><?php _t("Place"); ?></th>
                    <th><?php _t("Precio"); ?></th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 1;
                foreach ($agenda['places_dates'] as $key => $pd) {

                    echo '<tr>

                    <td>' . addresses_field_id('city', $pd['address_id']) . '</td>
                    <td>' . contacts_field_id('name', addresses_field_id('contact_id', $pd['address_id'])) . '</td>
                    <td>' . $pd["date"] . '</td>
                    <td>' . $pd["time"] . '</td>
                    <td>' . $pd["date_end"] . '</td>
                    <td>' . $pd["time_end"] . '</td>

                    <td>';
                    include view('shop', 'agenda_details_part_price');
                    echo '</td>
                </tr>';
                }
                ?>
            </tbody>
        </table>

        <h2>Add place</h2>
        <A NAME="places"></A>

        <form class="form-inline" method="get" action="index.php#places">
            <input type="hidden" name="c" value="shop">
            <input type="hidden" name="a" value="agenda_details">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="add_place" value="1">


            <div class="form-group">
                <label class="sr-only" for="exampleInputEmail3">Email address</label>
                <input type="text" name="txt" class="form-control" id="txt" placeholder="place" value="<?php // echo (isset($txt)) ? $txt : "";       ?>">
            </div>


            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
                <?php _t("Search"); ?>
            </button>

        </form>



        <br>
        <br>





        <table class="table table-bordered">
            <thead>
                <tr>
                    <th><?php _t("Province"); ?></th>
                    <th><?php _t("City"); ?></th>
                    <th><?php _t("Place"); ?></th>
                    <th><?php _t("Address"); ?></th>
                    <th><?php _t("Tel"); ?></th>
                    <th><?php _t("Web"); ?></th>
                    <th><?php _t("Action"); ?></th>
                </tr>
            </thead>

            <tbody>
                <?php
                if ($add_place) {
                    foreach (addresses_search($txt) as $key => $addresses_places) {
                        echo '                <tr>
                    <td>' . $addresses_places['province'] . '</td>
                    <td>' . $addresses_places['city'] . '</td>
                    <td>' . contacts_formated($addresses_places['contact_id']) . '</td>
                    <td>' . $addresses_places['number'] . ' ' . $addresses_places['address'] . ' </td>
                    <td>' . directory_by_contact_name($addresses_places['contact_id'], 'Tel') . '</td>
                    <td>' . directory_by_contact_name($addresses_places['contact_id'], 'Url') . '</td>
                    <td><a href="index.php?c=agenda_places_dates&a=ok_add&agenda_id=' . $id . '&address_id=' . $addresses_places["id"] . '&redi=4" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> ' . _tr("Add") . ' </a></td>
                </tr>';
                    }
                }
                ?>
            </tbody>
        </table>


    </div>


    <div class="col-md-2">
        <hr>
        <?php include "der_agenda.php"; ?>
    </div>

</div>

<?php include view("home", "footer"); ?>