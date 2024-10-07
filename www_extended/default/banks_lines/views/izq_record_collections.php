<form  class="form-inline" method="get" action="index.php">

    <input type="hidden" name="c" value="banks_lines">
    <input type="hidden" name="a" value="record_collections">


    <div class="form-group">
        <label for="bank_line" class="sr-only"><?php _t("bank_line"); ?></label>
        <input 
            type="text" 
            class="form-control" 
            name="bank_line" 
            id="bank_line" 
            placeholder=""
            required=""
            >
    </div>

    <div class="form-group">
        <label for="FiledName" class="sr-only"><?php _t("FiledName"); ?></label>
        <select class="form-control">
            <option>All</option>
        </select>
    </div>

    <button type="submit" class="btn btn-default">
        <?php echo icon("ok"); ?> 
        <?php _t("Search"); ?>
    </button>
</form>


<br>

<?php echo icon("wrench"); ?>

<table class="table table-condensed">
    <thead>
        <tr>
            <th>Date</th>
            <th>Total</th>
            <th>Sender</th>            
            <th></th>            
        </tr>
    </thead>

    <tbody>        
        <?php
        foreach (banks_lines_search_by('status', 30) as $key => $blsb) {

            $bank_line = new Banks_lines();
            $bank_line->setBanks_lines($blsb['id']);
            echo '<tr>
            <td><a href="index.php?c=banks_lines&a=record_collections&show_invoice=1&txt=' . $bank_line->getDate_value() . '">' . $bank_line->getDate_value() . '</a></td>
            <td><a href="index.php?c=banks_lines&a=record_collections&show_invoice=1&txt=' . $bank_line->getTotal() . '">' . $bank_line->getTotal() . '</a></td>            
            <td><a href="index.php?c=banks_lines&a=record_collections&show_invoice=1&txt=' . $bank_line->getAccount_sender() . '">' . $bank_line->getAccount_sender() . '</a></td>            
             
            <td>>></td>                        
        </tr>';
        }
        ?>
    </tbody>

</table>