<?php include view("home", "header"); ?>
<div class="row">
    <div class="col-md-3">
        <?php include "izq_about.php"; ?>
    </div>
    <div class="col-md-9">              
        <?php // include "nav_address.php"; ?>
        <?php
        if ($error) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <h2><?php _t("GestionManager"); ?></h2>


        <?php
        /*
          <div>

          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">English</a></li>
          <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Hoalndes</a></li>
          <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Français</a></li>
          <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Español</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="home">
          <iframe id="inlineFrameExample"
          title="Inline Frame Example"
          width="100%"
          height="600"
          src="https://www.openstreetmap.org/export/embed.html?bbox=-0.004017949104309083%2C51.47612752641776%2C0.00030577182769775396%2C51.478569861898606&layer=mapnik">
          </iframe>
          </div>
          <div role="tabpanel" class="tab-pane" id="profile">...</div>
          <div role="tabpanel" class="tab-pane" id="messages">...</div>
          <div role="tabpanel" class="tab-pane" id="settings">...</div>
          </div>

          </div> */
        ?>





        <?php //include "form_myInfo_profile.php"; ?>

    </div> 
</div> 
<?php include view("home", "footer"); ?>