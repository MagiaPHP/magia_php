<?php include view("home", "header"); ?> 

<?php //include "nav_details.php"; ?>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">HTML</a></li>
                <li role="presentation"><a href="#pdf" aria-controls="profile" role="tab" data-toggle="tab">PDF</a></li>
                <li role="presentation"><a href="#factux" aria-controls="messages" role="tab" data-toggle="tab">Factux</a></li>
                <li role="presentation"><a href="#xml" aria-controls="settings" role="tab" data-toggle="tab">XML</a></li>
                <li role="presentation"><a href="#api" aria-controls="api" role="tab" data-toggle="tab">Api</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <?php include "export_format_html.php"; ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="pdf">
                    <?php include "export_format_pdf.php"; ?>
                </div>

                <div role="tabpanel" class="tab-pane" id="factux">
                    <?php include "export_format_factux.php"; ?>
                </div>

                <div role="tabpanel" class="tab-pane" id="xml">
                    <?php include "export_format_xml.php"; ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="api">
                    <?php include "export_format_api.php"; ?>
                </div>
            </div>

        </div>





    </div>
    <div class="col-sm-0 col-md-0 col-lg-0">
        <?php // include "der.php"; ?> 
    </div>
</div>


<?php include view("home", "footer"); ?>