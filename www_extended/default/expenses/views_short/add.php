
<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include "izq_add.php"; ?>
    </div>

    <div class="col-sm-12 col-md-8 col-lg-8">






        <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                        <?php _t("My providers"); ?>
                    </a>
                </li>
                <li role="presentation">
                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                        <?php _t("New providers"); ?>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">


                    <p></p>

                    <?php
                    include "form_add.php";
                    ?>


                </div>
                <div role="tabpanel" class="tab-pane" id="profile">


                    <?php
                    include "form_add_new_provider.php";
                    ?>

                </div>
            </div>

        </div>




        <?php
        $redi = 3;
//        include view("contacts", 'form_contacts_company_add'); 
        ?>




    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php // include "der_add.php";   ?>

    </div>
</div>

<?php include view("home", "footer"); ?>

