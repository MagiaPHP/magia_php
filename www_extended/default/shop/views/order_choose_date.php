<?php include view("home", "header"); ?>

<div class="row">
    <div class="col-md-0">
        <?php //include "izq_orders.php"; ?>
        <?php //include "izq_orderNew.php"; ?>
    </div>
    <div class="col-md-12">
        <?php
        farra_progreso(2, $config_orders_total_steps);
        //     vardump($_SESSION); 
        ?>
        <h1><?php _t("Manufacturing"); ?></h1>  
        <a name="order"></a>
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="thumbnail">
                    <img src="2.jpg" alt="..." width="150">
                    <div class="caption">
                        <h3>
                            <span class="glyphicon glyphicon-time"></span>
                            <?php _t("Manufacturing normal"); ?>
                        </h3>
                        <p>

                            <?php _t("This modality takes between 2 to 4 working days"); ?>
                        </p>

                        <form class="form-inline" action="index.php" method="get">
                            <input type="hidden" name="c" value="shop">
                            <input type="hidden" name="a" value="ok_order_new_choose_date">                                

                            <?php /* <input type="hidden" name="date_delivery" value="<?php echo substr(magia_dates_add_day(date("Y-m-d"), 4), 0, 10); ?>">                       */ ?>

                            <input type="hidden" name="date_delivery" value="null">                       
                            <input type="hidden" name="delivery_days" value="<?php echo DELIVERY_DAYS_NORMAL; ?>">                       

                            <button type="submit" class="btn btn-primary">
                                <?php _t("Next"); ?>
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </button>
                        </form>


                    </div>
                </div>
            </div>








            <div class="col-sm-12 col-md-4">
                <div class="thumbnail">
                    <img src="1.jpg" alt="..." width="150">
                    <div class="caption">
                        <h3>
                            <span class="label label-warning"><span class="glyphicon glyphicon-fire"></span></span>   
                            <?php _t("Manufacturing express"); ?>
                        </h3>

                        <p>
                            <?php message("info", "Any order placed after 12h will take more than 24 hours"); ?>
                        </p>

                        <p style="
                           background-color:  #f2b335 ;
                           border-radius: 10px;
                           ">
                               <?php //_t("Any order placed before 12h will take more than 24 hours"); ?>
                        </p>



                        <p>
                            <small>
                                <?php _t("With this modality, delivery will be made within 24 hours of receipt of the impressions, this will result in an additional charge on your invoicing"); ?>
                                <b><?php echo monedaf(10); ?></b> <?php _t('per piece'); ?> .

                            </small>
                        </p>

                        <form class="form-inline" action="index.php" method="get">
                            <input type="hidden" name="c" value="shop">
                            <input type="hidden" name="a" value="ok_order_new_choose_date">
                            <input type="hidden" name="order_id" value="<?php echo "$order_id"; ?>">

                            <?php /* <input type="hidden" name="date_delivery" value="<?php echo substr(magia_dates_add_day(date("Y-m-d"), 1), 0, 10); ?>">  */ ?>                     
                            <input type="hidden" name="date_delivery" value="null">  
                            <input type="hidden" name="delivery_days" value="<?php echo DELIVERY_DAYS_EXPRESS; ?>">  
                            <button type="submit" class="btn btn-primary">
                                <?php _t("Next"); ?> 
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>




            <div class="col-sm-12 col-md-4">
                <div class="thumbnail">
                    <img src="3.jpg" alt="..." width="150">
                    <div class="caption">
                        <h3>
                            <span class="glyphicon glyphicon-calendar"></span>
                            <?php _t("Manufacturing on a custom date"); ?>
                        </h3>
                        <?php // _t("Happy (x) day");  ?>

                        <p>


                            <?php // _t("If you want the delivery to be made on a certain date, you can specify it here");  ?>

                            <?php _t("Choose the date that suits you"); ?>
                        </p>



                        <?php /* ----------------------------------------------------------------------- */ ?>
                        <?php /* --------------- S E L E C T    P I C  K E R ---------------------------- */ ?>
                        <?php /* ----------------------------------------------------------------------- */ ?>
                        <?php /* ----------------------------------------------------------------------- */ ?>
                        <?php /* ----------------------------------------------------------------------- */ ?>
                        <?php
                        /* ----------------------------------------------------------------------- */

//https://stackoverflow.com/questions/15400775/jquery-ui-datepicker-disable-array-of-dates/15400806
                        ?>
                        <script>

                            jQuery(function ($) {

                                var disabledDays = [

                                    '2021-01-01',
                                    '2021-04-05',
                                    '2021-05-01',
                                    '2021-05-13',
                                    '2021-05-23',
                                    '2021-05-24',
                                    '2021-08-15',
                                    '2021-09-21',
                                    '2021-11-01',
                                    '2021-11-11',
                                    '2021-12-25',
                                    //
                                    '2022-01-01',
                                    '2022-04-17',
                                    '2022-04-18',
                                    '2022-05-01',
                                    '2022-05-26',
                                    '2022-06-05',
                                    '2022-06-06',
                                    '2022-07-21',
                                    '2022-08-15',
                                    '2022-11-01',
                                    '2022-11-11',
                                    '2022-12-25',
                                            //

                                ];

                                //replace these with the id's of your datepickers
                                $("#date_delivery").datepicker({
                                    changeMonth: true,
                                    minDate: +5,
                                    dateFormat: "yy-mm-dd",

                                    beforeShowDay: function (date) {

                                        var day = date.getDay();
                                        var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                                        var isDisabled = ($.inArray(string, disabledDays) != -1);

                                        //day != 0 disables all Sundays and saturday
                                        return [day != 0 && day != 6 && !isDisabled];
                                    }
                                });
                            });




                            $(function () {
                                $("#date_delivery").datepicker({
                                    minDate: +5,
                                    changeMonth: true,

                                    maxDate: "+12M +0D",
                                    dateFormat: "yy-mm-dd"

                                });
                            });
                        </script>  




                        <form class="form-inline" action="index.php" method="get">

                            <input type="hidden" name="c" value="shop">
                            <input type="hidden" name="a" value="ok_order_new_choose_date">
                            <input type="hidden" name="order_id" value="<?php echo "$order_id"; ?>"> 
                            <input type="hidden" name="delivery_days" value="null"> 

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
                                        value="<?php echo substr(magia_dates_add_day(date("y-m-d"), 10), 0, 10); ?>"
                                        readonly=""
                                        >


                                </div>
                            </div>
                            <button 
                                type="submit" 
                                class="btn btn-primary">
                                    <?php _t("Next"); ?> 
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </button>
                        </form>
                        <p></p>
                        <p></p>




                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                            <?php _t("Check the holidays"); ?>
                            <span class="glyphicon glyphicon-info-sign"></span>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">
                                            <?php _t("Holidays"); ?>
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                        <h1><?php _t("Holidays"); ?></h1>
                                        <p><?php _t("This is the list of days that our company takes a break, please check it, this may affect the delivery of your order"); ?></p>

                                        <div class="list-group">
                                            <?php
                                            $holidays = array();

                                            foreach (holidays_list() as $key => $value) {
                                                array_push($holidays, $value['date']);
                                                echo '<a href="#" class="list-group-item">' . magia_dates_formated($value['date']) . ' - ' . $value["description"] . '</a>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php ########################################################### ?>
            <?php shop_orders_button_cancel(); ?>
        </div>






        <?php
        /*

          <div>
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
          <li role="normal" class="active">
          <a href="#normal" aria-controls="normal" role="tab" data-toggle="tab">
          <?php _t("Normal delivery"); ?>
          </a>
          </li>
          <li role="express">
          <a href="#express" aria-controls="express" role="tab" data-toggle="tab">
          <?php _t("Express delivery"); ?>
          </a>
          </li>
          <li role="custom">
          <a href="#custom" aria-controls="custom" role="tab" data-toggle="tab">
          <?php _t("Delivery on custom date"); ?>
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


          <form class="form-inline" action="index.php" method="get">
          <input type="hidden" name="c" value="shop">
          <input type="hidden" name="a" value="orderNew">
          <input type="hidden" name="contact_id" value="<?php echo "$contact_id"; ?>">
          <input type="hidden" name="date_delivery" value="<?php echo substr(magia_dates_add_day(date("Y-m-d"), 4), 0, 10); ?>">
          <button type="submit" class="btn btn-primary"><?php _t("Next"); ?> >></button>
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

          <p>
          <?php _t("With this modality, delivery will be made within 24 hours of receipt of the impressions, this will result in an additional charge on your invoicing"); ?>



          <b><?php echo monedaf(10); ?></b> <?php _t('per piece'); ?> .</p>

          <p>
          <?php _t("Yes, I choose this option to be delivered within 24 hours"); ?>
          </p>


          <?php // _t("With this modality the delivery will be made in 24 hours, this may incur a surcharge on your billing") ; ?></p>
          <p><?php //_t("Yes, I choose this option to be delivered in 24 hours") ;  ?></p>




          <form class="form-inline" action="index.php" method="get">

          <input type="hidden" name="c" value="shop">
          <input type="hidden" name="a" value="orderNew">
          <input type="hidden" name="contact_id" value="<?php echo "$contact_id"; ?>">
          <input type="hidden" name="date_delivery" value="<?php echo magia_dates_add_day(date("Y-m-d"), 1); ?>">
          <button type="submit" class="btn btn-primary"><?php _t("Next"); ?> >></button>
          </form>





          </div>
          </div>




          </div>
          <div role="tabpanel" class="tab-pane" id="custom">

          <div class="panel panel-default">
          <div class="panel-heading">
          <h3 class="panel-title"><?php _t("Happy (x) day"); ?></h3>
          </div>
          <div class="panel-body">

          <p>

          <span class="glyphicon glyphicon-calendar"></span>
          <?php _t("If you want the delivery to be made on a certain date, you can specify it here"); ?>
          </p>



          <script>
          $(function () {
          $("#date_delivery").datepicker({
          minDate: +5,
          changeMonth: true,

          maxDate: "+12M +0D",
          dateFormat: "yy-mm-dd"

          });
          });
          </script>




          <form class="form-inline" action="index.php" method="get">

          <input type="hidden" name="c" value="shop">
          <input type="hidden" name="a" value="orderNew">
          <input type="hidden" name="contact_id" value="<?php echo "$contact_id"; ?>">

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
          <button
          type="submit"
          class="btn btn-primary">
          <?php _t("Next"); ?> >>
          </button>
          </form>


          </div>
          </div>




          </div>

          </div>

          </div>

         */
        ?>



    </div>

    <div class="col-md-2">
        <?php include "der_help.php"; ?>
    </div>


</div>

<?php include view("home", "footer"); ?>