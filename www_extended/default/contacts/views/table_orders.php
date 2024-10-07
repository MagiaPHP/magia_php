<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<script>
    function sellectAll(source) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
</script>

<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr class="info">
            <th><?php _t("Order id"); ?></th>
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Client ref"); ?></th>
            <th><?php _t("Patient"); ?></th>                        
            <th><?php _t("Bac"); ?></th>                                            
            <th><?php _t("Action"); ?></th>
        </tr>
    </thead>            
    <tfoot>
        <tr>
            <th><?php _t("Order id"); ?></th>
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Client ref"); ?></th>
            <th><?php _t("Patient"); ?></th>                        
            <th><?php _t("Bac"); ?></th>                                            
            <th><?php _t("Action"); ?></th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($orders_list as $orders_list_by_patient_id) { ?>
            <tr>                                            
                <td><?php echo $orders_list_by_patient_id["id"]; ?></td>
                <td><?php echo $orders_list_by_patient_id["date"]; ?></td>
                <td><?php echo $orders_list_by_patient_id["client_ref"]; ?></td>
                <td><?php echo contacts_formated($orders_list_by_patient_id["patient_id"]); ?></td>
                <td><?php echo $orders_list_by_patient_id["bac"]; ?></td>                    
                <td>
                    <a href="index.php?c=orders&a=details&id=<?php echo $orders_list_by_patient_id['id']; ?>" class="btn btn-default"><?php _t("Details"); ?></a>
                </td>        
            </tr>
        <?php } ?>
    </tbody>  
</table>