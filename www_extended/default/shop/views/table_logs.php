<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>


<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr class="info">
    <thead>
        <tr>
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Who"); ?></th>
            <th><?php _t("Action"); ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Who"); ?></th>
            <th><?php _t("Action"); ?></th>
        </tr>
    </tfoot>
    <tbody>                
        <?php foreach ($logs as $key => $log) { ?>                                        
            <tr>
                <td><?php echo $log['date']; ?></td>
                <td><?php echo contacts_formated($log['u_id']); ?></td>
                <td><?php echo $log['description']; ?></td>
            </tr>                
        <?php } ?>                                


    </tbody>
</table>   

