<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("budgets", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("budgets", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <?php
// https://api.jquery.com/prop/
        ?>


        <?php //include "form_make_actions.php"; ?>



        <?php
        // con esto seleciona todo 
        ?>
        <script>
            function sellectAll(source) {
                var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i] != source)
                        checkboxes[i].checked = source.checked;
                }
            }
        </script>



        <h2>Crear una factura </h2>


        <ul>
            <li>Todos los presupuestos pertenecen a un mismo cliente?</li>
        </ul>



        <form method="get" action="index.php" class="form-inline">
            <input type="hidden" name="c" value="budgets">
            <input type="hidden" name="a" value="ok_invoice_create_mensual">



            <div class="form-group">
                <label class="sr-only" for="exampleInputEmail3">Email address</label>
                <input type="checkbox" onclick="sellectAll(this);" /> ALL
            </div>






            <select>
                <option>Factura mensual</option>
            </select>


            <button type="submit" class="btn btn-default">ok</button>



            <table class="table table-striped">
                <thead>
                    <tr>         
                        <th><input type="checkbox" onclick="sellectAll(this);" /></th>
                        <th><?php _t("Id"); ?></th>
                        <th><?php _t("Invoice"); ?></th>                                                            
                        <th><?php _t("Date_registre"); ?></th>                    
                        <th><?php _t("Cliente_id"); ?></th>                    
                        <th class="text-right"><?php _t("Total"); ?></th>                                                            
                        <th><?php _t("Status"); ?></th>                    
                        <th><?php _t("Action"); ?></th>                                                                      
                    </tr>
                </thead>
                <tfoot>
                    <tr>         
                        <th></th>
                        <th><?php _t("Id"); ?></th>
                        <th><?php _t("Invoice_id"); ?></th>                                                            
                        <th><?php _t("Date_registre"); ?></th>                    
                        <th><?php _t("Cliente_id"); ?></th>                    
                        <th class="text-right"><?php _t("Total"); ?></th>                                                            
                        <th><?php _t("Status"); ?></th>                    
                        <th><?php _t("Action"); ?></th>                                                                      
                    </tr>
                </tfoot>
                <tbody>





                    <?php
                    if (!isset($budgets)) {
                        message("info", "No items");
                    } else {
                        //foreach ($liste_info as $address) {
                        foreach ($budgets as $budget) {
                            ?>                
                            <tr>
                                <td>
                                    <div class="checkbox">
                                        <label>
                                            <input name="id[]" type="checkbox" id="uno" value="<?php echo "$budget[id]"; ?>">
                                        </label>
                                    </div>


                                </td>
                                <td><?php echo "$budget[id]"; ?></td>

                                <td><a href="index.php?c=invoices&a=details&id=<?php echo "$budget[invoice_id]"; ?>"><?php echo "$budget[invoice_id]"; ?></a></td>                            
                                <td><?php echo "$budget[date_registre]"; ?></td>

                                <td>
                                    <a href="index.php?c=contacts&a=details&id=<?php echo $budget['client_id']; ?>">
                                        <?php echo contacts_formated($budget['client_id']); ?>
                                    </a>
                                </td>

                                <td class="text-right"><?php echo monedaf($budget['total'] + $budget['tax']); ?></td>
                                <td><?php echo budget_status_by_status($budget['status']); ?></td>

                                <td>
                                    <div class="dropdown">
                                        <button 
                                            class="btn btn-default dropdown-toggle" 
                                            type="button" 
                                            id="dropdownMenu1" 
                                            data-toggle="dropdown" 
                                            aria-haspopup="true" 
                                            aria-expanded="true">

                                            <?php _t("Actions"); ?>
                                            <span class="caret"></span>                                        
                                        </button>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li><a href="index.php?c=budgets&a=details&id=<?php echo "$budget[id]"; ?>"><?php _t("Details"); ?></a></li>
                                            <li><a href="index.php?c=budgets&a=edit&id=<?php echo "$budget[id]"; ?>"><?php _t("Edit"); ?></a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="index.php?c=budgets&a=edit&id=<?php echo "$budget[id]"; ?>"><?php _t("Pdf"); ?></a></li>
                                        </ul>
                                    </div>
                                </td>



                            </tr>

                            <?php
                        }
                    }
                    ?>	





                </tbody>


            </table>

        </form>

        <?php
        /*
          Export:
          <a href="index.php?c=addresses&a=export_json">JSON</a>
          <a href="index.php?c=addresses&a=export_pdf">pdf</a>
         */
        ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 




