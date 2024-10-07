<div class="panel panel-default">

    <div class="panel-body">
        <h3 class="text-center">
            12<br>
            DICIEMBRE<br>
            2023
        </h3>

    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Details"); ?>
    </div>
    <div class="panel-body">

        <table class="table table-condensed">
            <tr><td><?php _t("Date"); ?></td><td></td></tr>
            <tr><td><?php _t("Time"); ?></td><td></td></tr>
            <tr><td><?php _t("Price"); ?></td><td></td></tr>
            <tr><td><?php _t("More info"); ?></td><td></td></tr>
            <tr><td></td><td></td></tr>
        </table>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php _t("Place"); ?></h3>
    </div>
    <div class="panel-body">
        Teatro Nacional Sucre<br>
        Guayaquil &, Manabi, Quito 170401<br>
        Quito, Pichincha Ecuador<br>

    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php _t("Who organizes"); ?></h3>
    </div>
    <div class="panel-body">

        <?php
        foreach (agenda_organizers_search_by('agenda_id', $id) as $key => $value) {
            echo ' <div class="media">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img class="media-object" src="https://picsum.photos/50" alt="...">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="#">' . contacts_formated($agenda['contact_id']) . '</a></h4>
                            
                        </div>
                    </div>';
        }
        ?>

    </div>
</div>