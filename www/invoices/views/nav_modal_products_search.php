<div>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#types" aria-controls="types" role="tab" data-toggle="tab"><?php _t("Types"); ?></a></li>
        <li role="presentation"><a href="#modeles" aria-controls="modeles" role="tab" data-toggle="tab"><?php _t("Modeles"); ?></a></li>
        <li role="presentation"><a href="#mesures" aria-controls="mesures" role="tab" data-toggle="tab"><?php _t("Mesures"); ?></a></li>
        <li role="presentation"><a href="#formes" aria-controls="formes" role="tab" data-toggle="tab"><?php _t("Formes"); ?></a></li>
        <li role="presentation"><a href="#materials" aria-controls="materials" role="tab" data-toggle="tab"><?php _t("Material"); ?></a></li>
        <li role="presentation"><a href="#color" aria-controls="color" role="tab" data-toggle="tab"><?php _t("Color"); ?></a></li>
        <li role="presentation"><a href="#marques" aria-controls="marques" role="tab" data-toggle="tab"><?php _t("Marque"); ?></a></li>
        <li role="presentation"><a href="#ecouteurs" aria-controls="ecouteurs" role="tab" data-toggle="tab"><?php _t("Ecouteur"); ?></a></li>
        <li role="presentation"><a href="#options" aria-controls="options" role="tab" data-toggle="tab"><?php _t("Options"); ?></a></li>
        <li role="presentation"><a href="#transport" aria-controls="transport" role="tab" data-toggle="tab"><?php _t("Transport"); ?></a></li>
    </ul>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="types">
            <h2><?php _t("Types"); ?></h2>
            <?php include "table_types_list.php"; ?>
        </div>

        <div role="tabpanel" class="tab-pane" id="modeles">
            <h2><?php _t("Modeles"); ?></h2>
            <?php include "table_modeles_list.php"; ?>
        </div>

        <div role="tabpanel" class="tab-pane" id="mesures">
            <h2><?php _t("Mesures"); ?></h2>
            <?php include "table_mesures_list.php"; ?>
        </div>

        <div role="tabpanel" class="tab-pane" id="formes">
            <h2><?php _t("Formes"); ?></h2>
            <?php include "table_formes_list.php"; ?>
        </div>

        <div role="tabpanel" class="tab-pane" id="materials">
            <h2><?php _t("Materials"); ?></h2>
            <?php include "table_materials_list.php"; ?>
        </div>

        <div role="tabpanel" class="tab-pane" id="color">
            <h2><?php _t("Colors"); ?></h2>
            <?php include "table_colors_list.php"; ?>
        </div>

        <div role="tabpanel" class="tab-pane" id="marques">
            <h2><?php _t("Marques"); ?></h2>
            <?php include "table_marques_list.php"; ?>
        </div>

        <div role="tabpanel" class="tab-pane" id="ecouteurs">
            <h2><?php _t("Ecouteurs"); ?></h2>
            <?php include "table_ecouteurs_list.php"; ?>
        </div>

        <div role="tabpanel" class="tab-pane" id="options">
            <h2><?php _t("Options"); ?></h2>
            <?php include "table_options_list.php"; ?>
        </div>


        <div role="tabpanel" class="tab-pane" id="transport">
            <h2><?php _t("Transport"); ?></h2>
            <?php include "table_transport_list.php"; ?>
        </div>        

    </div>

</div>