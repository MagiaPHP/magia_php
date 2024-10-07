<h3><?php _t("Frecuency"); ?></h3>
<p>
    <?php _t('If you have recurring expenses, this is the time to record them'); ?>
</p>



<div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#once" aria-controls="once" role="tab" data-toggle="tab"><?php echo _t('Only this time'); ?></a></li>
        <li role="presentation"><a href="#every" aria-controls="every" role="tab" data-toggle="tab"><?php echo _t("x_times"); ?></a></li>
        <li role="presentation"><a href="#times" aria-controls="times" role="tab" data-toggle="tab">X veces </a></li>
        <li role="presentation"><a href="#undefined" aria-controls="undefined" role="tab" data-toggle="tab">Indefinido</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="once">
            <h3>
                <?php _t("Individual invoice"); ?>
            </h3>


            <a name="05"></a>
            <form method="post" action="index.php">
                <input type="hidden" name="c" value="expenses">
                <input type="hidden" name="a" value="ok_add_05">
                <input type="hidden" name="expense_id" value="<?php echo $expense->getId(); ?>">
                <input type="hidden" name="every" value="once">
                <input type="hidden" name="times" value="1">
                <input type="hidden" name="redi" value="5">
                <button type="submit" class="btn btn-default">
                    <?php _t("Next"); ?>
                    <?php echo icon("chevron-right"); ?>
                </button>
            </form>



        </div>

        <div role="tabpanel" class="tab-pane" id="every">


            <h3>Cada x tiempo </h3>

            <p>
                Pago de una cantidad cada cierto tiempo y conoces una fecha de incio y yna fecha de fin 
            </p>




            <form method="post" action="index.php">
                <input type="hidden" name="c" value="expenses">
                <input type="hidden" name="a" value="ok_add_05">
                <input type="hidden" name="expense_id" value="<?php echo $expense->getId(); ?>">
                <input type="hidden" name="redi" value="5">

                <div class="form-group">
                    <label for="exampleInputPassword1"><?php _t("Frecuency"); ?></label>
                    <select class="form-control" name="every">
                        <option value="day"><?php _t("Every day"); ?></option>
                        <option value="month"><?php _t("Every month"); ?></option>
                        <option value="tri"><?php _t("Every trimestre"); ?></option>
                        <option value="sem"><?php _t("Every semestre"); ?></option>
                        <option value="year"><?php _t("Every year"); ?></option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="date_start"><?php _t("Date stat"); ?></label>
                    <input class="form-control" name="date_start" id="date_start" value="<?php echo date("Y-m-d"); ?>" placeholder="Y-m-d">
                </div>

                <div class="form-group">
                    <label for="date_end"><?php _t("Date end"); ?></label>
                    <input 
                        class="form-control" 
                        name="date_end" 
                        id="date_end" 
                        value="2025-01-01" 
                        placeholder="Y-m-d">
                </div>


                <button type="submit" class="btn btn-default">
                    <?php _t("Next"); ?>
                    <?php echo icon("chevron-right"); ?>
                </button>

            </form>
        </div>

        <div role="tabpanel" class="tab-pane" id="times">
            <h3>x veces </h3>


            <p>
                Son pagos que sabes exactamente cuantas veces debes pagar
            </p>

            <p>Ejemplos</p>
            <ul>
                <li>Creditos (auto, casa )</li>
                <li>Plan de pagos (Facturas u otros)</li>
                <li>Compras de un articulo a plazos</li>
            </ul>






            <form method="post" action="index.php">
                <input type="hidden" name="c" value="expenses">
                <input type="hidden" name="a" value="ok_add_05">
                <input type="hidden" name="expense_id" value="<?php echo $expense->getId(); ?>">
                <input type="hidden" name="redi" value="5">


                <div class="form-group">
                    <label for="times"><?php _t("times"); ?></label>
                    <input 
                        class="form-control" 
                        name="times" 
                        id="times" 
                        value="" 
                        placeholder=""
                        required=""
                        >
                </div>


                <div class="form-group">
                    <label for="exampleInputPassword1"><?php _t("Frecuency"); ?></label>
                    <select class="form-control" name="every">
                        <option value="day"><?php _t("Every day"); ?></option>
                        <option value="month" selected=""><?php _t("Every month"); ?></option>
                        <option value="tri"><?php _t("Every trimestre"); ?></option>
                        <option value="sem"><?php _t("Every semestre"); ?></option>
                        <option value="sem"><?php _t("Every year"); ?></option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="date_start"><?php _t("Date stat"); ?></label>
                    <input 
                        class="form-control" 
                        name="date_start" 
                        id="date_start" 
                        value="<?php echo date("Y-m-d"); ?>" 
                        placeholder="Y-m-d"
                        >
                </div>





                <button type="submit" class="btn btn-default">
                    <?php _t("Save"); ?>
                </button>
            </form>
        </div>

        <div role="tabpanel" class="tab-pane" id="undefined">
            <h3>Indefinido </h3>


            <p>
                Son pagos que no sabes hasta cuando vas a seguir con este provehedor
            </p>

            <p>Ejemplos</p>
            <ul>
                <li>Abonamiento del Telefono</li>
                <li>Abonamiento del Internet</li>
                <li>Abonamiento del Servicios (Agua, Luz, Calenfacion)</li>
                <li>Nombre de dominios</li>
                <li>Hosting</li>
                <li>Membresia de Factux</li>
            </ul>



            <form method="post" action="index.php">
                <input type="hidden" name="c" value="expenses">
                <input type="hidden" name="a" value="ok_add_05">
                <input type="hidden" name="expense_id" value="<?php echo $expense->getId(); ?>">
                <input type="hidden" name="redi" value="5">
                <div class="form-group">
                    <label for="exampleInputPassword1"><?php _t("Frecuency"); ?></label>
                    <select class="form-control" name="every">
                        <option value="day"><?php _t("Every day"); ?></option>
                        <option value="month"><?php _t("Every month"); ?></option>
                        <option value="tri"><?php _t("Every trimestre"); ?></option>
                        <option value="sem"><?php _t("Every semestre"); ?></option>
                        <option value="sem"><?php _t("Every year"); ?></option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="date_start"><?php _t("Date stat"); ?></label>
                    <input class="form-control" name="date_start" id="date_start" value="<?php echo date("Y-m-d"); ?>" placeholder="Y-m-d">
                </div>


                <button type="submit" class="btn btn-default">
                    <?php _t("Save"); ?>
                </button>
            </form>






        </div>
    </div>

</div>


