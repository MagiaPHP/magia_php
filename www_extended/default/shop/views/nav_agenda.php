<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <?php _menu_icon("top", "agenda"); ?>
                <?php _t("My events"); ?>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">





            </ul>


            <form action="index.php" method="" class="navbar-form navbar-left">
                <input type="hidden" name="c" value="shop">
                <input type="hidden" name="a" value="agenda_search">
                <input type="hidden" name="formId" value="nav">
                <div class="form-group">
                    <input 
                        name="txt" 
                        type="search" 
                        class="form-control" 
                        placeholder="<?php _t("Search"); ?>" 
                        required=""
                        autofocus>
                </div>

                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                    <?php _t("Search"); ?>
                </button>
            </form>


            <form class="navbar-form navbar-right" action="" method="get">
                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#contactsAdd">
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <?php _t("New event"); ?>
                </button>
            </form>



        </div>
    </div>
</nav>


<div class="modal fade" id="contactsAdd" tabindex="-1" role="dialog" aria-labelledby="contactsAddLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="contactsAddLabel"><?php _t("Add new contact"); ?></h4>
            </div>
            <div class="modal-body">
                <?php include "form_contacts_new.php"; ?>
            </div>

        </div>
    </div>
</div>