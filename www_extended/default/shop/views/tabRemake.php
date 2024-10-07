

<div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="normal" class="active">
            <a href="#normal" aria-controls="normal" role="tab" data-toggle="tab">
                <span class="glyphicon glyphicon-time"></span>
                <?php _t("Normal"); ?>
            </a>
        </li>
        <li role="express">
            <a href="#express" aria-controls="express" role="tab" data-toggle="tab"> 
                <span class="label label-warning"><span class="glyphicon glyphicon-fire"></span></span> 
                <?php _t("Express"); ?>
            </a>
        </li>
        <li role="custom">
            <a href="#custom" aria-controls="custom" role="tab" data-toggle="tab">
                <span class="glyphicon glyphicon-calendar"></span>
                <?php _t("Custom date"); ?>
            </a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="normal">


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <?php _t("3, 4 days"); ?>
                    </h3>
                </div>
                <div class="panel-body">
                    <p>
                        <span class="glyphicon glyphicon-time"></span>
                        <?php _t("This modality takes between 3 to 4 working days"); ?>
                    </p>

                    <form action="index.php" method="post">
                        <input type="hidden" name="c" value="shop">
                        <input type="hidden" name="a" value="ok_order_remake">    
                        <input type="hidden" name="id" value="<?php echo $id; ?>">   


                        <?php /* <input type="hidden" name="date_delivery" value="<?php echo substr(magia_dates_add_day(date("Y-m-d") , 4) , 0 , 10) ; ?>"> */ ?>
                        <input type="hidden" name="delivery_days" value="<?php echo DELIVERY_DAYS_NORMAL; ?>"> 


                        <?php include "formRemake.php"; ?>
                        <button type="submit" class="btn btn-primary"><?php echo _t("Send"); ?></button>
                    </form>


                </div>
            </div>




        </div>
        <div role="tabpanel" class="tab-pane" id="express">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">

                        <?php _t("24 hours"); ?>
                    </h3>
                </div>
                <div class="panel-body">
                    <p>
                        <span class="label label-warning"><span class="glyphicon glyphicon-fire"></span></span>   
                        <?php _t("With this modality the delivery will be made in 24 hours, this may incur a surcharge on your billing"); ?>
                    </p>



                    <form action="index.php" method="post">
                        <input type="hidden" name="c" value="shop">
                        <input type="hidden" name="a" value="ok_order_remake">    
                        <input type="hidden" name="id" value="<?php echo $id; ?>">   


                        <?php /* <input type="hidden" name="date_delivery" value="<?php echo substr(magia_dates_add_day(date("Y-m-d") , 1) , 0 , 10) ; ?>">     */ ?>

                        <input type="hidden" name="delivery_days" value="<?php echo DELIVERY_DAYS_EXPRESS; ?>"> 


                        <?php include "formRemake.php"; ?>
                        <button type="submit" class="btn btn-primary"><?php echo _t("Send"); ?></button>
                    </form>



                </div>
            </div>




        </div>
        <div role="tabpanel" class="tab-pane" id="custom">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php _t("Custom date"); ?></h3>
                </div>
                <div class="panel-body">

                    <p>

                        <span class="glyphicon glyphicon-calendar"></span>
                        <?php _t("If you want the delivery to be made on a certain date, you can specify it here"); ?>
                    </p>


                    <?php /* ------------------------------------------ */ ?>
                    <?php /* ---- S E L E C T    P I C  K E R --------- */ ?>
                    <?php /* ------------------------------------------ */ ?>
                    <?php /* ------------------------------------------ */ ?>
                    <?php /* ------------------------------------------ */ ?>
                    <?php /* ------------------------------------------ */ ?>
                    <script>
                        $(function () {
                            $("#date_delivery").datepicker({
                                minDate: +5,
                                maxDate: "+12M +0D",
                                dateFormat: "yy-mm-dd"

                            });
                        });
                    </script>  


                    <form action="index.php" method="post">
                        <input type="hidden" name="c" value="shop">
                        <input type="hidden" name="a" value="ok_order_remake">    
                        <input type="hidden" name="id" value="<?php echo $id; ?>">   

                        <div class="form-group">
                            <label class="sr-only" for="date_delivery">Date</label>
                            <div class="input-group">

                                <input 
                                    type="text" 
                                    id="date_delivery" 
                                    name="date_delivery" 
                                    class="form-control" 
                                    size="10" 
                                    maxlength="10" 
                                    value="<?php echo substr(magia_dates_add_day(date("y-m-d"), 5), 0, 10); ?>"
                                    readonly=""
                                    >


                            </div>
                        </div>

                        <?php include "formRemake.php"; ?>
                        <button type="submit" class="btn btn-primary"><?php echo _t("Send"); ?></button>
                    </form>


                </div>
            </div>




        </div>

    </div>

</div>






