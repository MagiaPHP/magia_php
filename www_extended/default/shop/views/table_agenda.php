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
            <th><?php _t("Title"); ?></th>
            <th><?php _t("Place"); ?></th>
            <th><?php _t("City"); ?></th>
            <th><?php _t("Category"); ?></th>
            <th><?php _t("Public"); ?></th>     
            <th><?php _t("Status"); ?></th>  
            <th><?php _t("Action"); ?></th>                    
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("Title"); ?></th>
            <th><?php _t("Place"); ?></th>
            <th><?php _t("City"); ?></th>
            <th><?php _t("Category"); ?></th>
            <th><?php _t("Public"); ?></th>                                                                                                             
            <th><?php _t("Status"); ?></th>                                                                                                             
            <th><?php _t("Action"); ?></th>                      
        </tr>
    </tfoot>

    <tbody>
        <?php
        if (!$agenda) {
            message('info', "Not data");
        }

        foreach ($agenda as $key => $event) {

            $age = 120;
            ?>                                  

            <tr>                                                                
                <td><?php echo ($event["title"]); ?></td>                                                                
                <td>Place</td>                                                                
                <td>City</td>                                                                
                <td><?php echo (agenda_categories_field_id('category', $event["category_id"])); ?></td>                                  
                <td><?php echo (agenda_public_field_id('public', $event["public_id"])); ?></td>                                  
                <td><?php echo ($event["status"]); ?></td>                                  
                <td><a href="index.php?c=shop&a=agenda_details&id=<?php echo $event['id']; ?>">see</a></td>                                  
            </tr>
        <?php } ?>                                               
    </tbody>                                               
</table>

<?php
$pagination->createHtml();
?>