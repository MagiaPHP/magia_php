<?php include "header.php"; ?>
<p class="text-center">
    <?php logo(200, "img-responsive"); ?>
</p>
<hr>

<div class="container-fluid">
    <div class="col-lg-4">
        <?php include "izq_new.php"; ?>
    </div>
    <div class="col-lg-8">

        <h1><?php _t("Users"); ?></h1>

        <p>            
            <?php _t("For the daily management of the office we will create a user account"); ?>
        </p>





        <form class="form-horizontal" action ="index.php" method="post" >
            <input type="hidden" name="c" value="contacts">
            <input type="hidden" name="a" value="add_contact">
            <input type="hidden" name="owner_id" value="<?php echo $id; ?>">



            <div class="form-group">
                <label class="control-label col-sm-2" for="title"><?php _t("Title"); ?></label>
                <div class="col-sm-8">
                    <select class="selectpicker" data-live-search="true" name="title" id="title" required="">
                        <?php
                        foreach (contacts_title_list() as $title) {
                            echo "<option value=\"$title[title]\" >" . _tr($title[title]) . "</option>\n";
                        }
                        ?>
                    </select>
                </div>
            </div>




            <div class="form-group">
                <label class="control-label col-sm-2" for="name"><?php _t("Name"); ?></label>
                <div class="col-sm-8">
                    <input class="form-control" type ="text " name ="name" id="name" required=""/>
                </div>
            </div>



            <div class="form-group">
                <label class="control-label col-sm-2" for="name"><?php _t("Lastname"); ?></label>
                <div class="col-sm-8">
                    <input class="form-control" type ="text " name ="lastname" id="lastname" required="" />
                </div>
            </div>




            <div class="form-group">
                <label class="control-label col-sm-2" for="name"><?php _t("Anniversary"); ?></label>
                <div class="col-sm-8">


                    <div class="row">

                        <div class="col-xs-2">
                            <select class="form-control" name="day">
                                <?php
                                for ($i = 1; $i <= 31; $i++) {
                                    echo "<option value=\"$i\">$i</option>";
                                }
                                ?>

                            </select>
                        </div>
                        <div class="col-xs-3">
                            <select class="form-control" name="month">
                                <?php
                                for ($i = 1; $i <= 12; $i++) {
                                    echo "<option value=\"$i\">$i " . _tr($months[$i]) . "</option>";
                                }
                                ?>

                            </select>
                        </div>
                        <div class="col-xs-4">
                            <select class="form-control" name="year">
                                <?php
                                for ($i = 1900; $i <= date("Y"); $i++) {
                                    echo "<option value=\"$i\">$i</option>";
                                }
                                ?>

                            </select>
                        </div>
                    </div>


                </div>
            </div>


            <hr>

            <div class="form-group">
                <label class="control-label col-sm-2" for="name"><?php _t("Username"); ?></label>
                <div class="col-sm-8">
                    <input class="form-control" type ="text " name ="lastname" id="lastname" required="" />
                </div>
            </div>



            <div class="form-group">
                <label class="control-label col-sm-2" for="name"><?php _t("Password"); ?></label>
                <div class="col-sm-8">
                    <input class="form-control" type ="text " name ="lastname" id="lastname" required="" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="name"></label>
                <div class="col-sm-8">
                    <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
                </div>
            </div>



        </form>



        <?php // ------------------------------------------------------------ ?>
        <hr>
        <a href="index.php?c=home&a=new_account_sucursal_send" class="btn btn-primary"><?php _t("Next"); ?></a>






    </div>
    <div class="col-lg-4"></div>
</div>




<?php include "footer.php"; ?>
