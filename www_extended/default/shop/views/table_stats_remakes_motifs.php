        
<table class="table table-striped">           
    <thead>
        <tr>                    
            <th><?php _t("#"); ?></th>    
            <th><?php _t("Office"); ?></th>   
            <th class="text-center"><?php _t("Motifs"); ?></th>   
        </tr>
    </thead>
    <tfoot>

    </tfoot>

    <tbody>
        <?php
        $i = 1;

        if (offices_is_headoffice($office_id)) {
            $offices = offices_list_by_headoffice($office_id);
        } else {
            $offices = array(array("id" => $office_id));
        }



        foreach ($offices as $key => $office) {
            ?>                                  

            <tr>
                <td>
                    <?php echo $i; ?>
                </td>

                <td>
                    <?php echo $office['id'] . " " . contacts_formated($office['id']); ?>
                </td>



                <td>
                    <?php include "table_stats_remakes_motifs_by_office.php"; ?>
                </td> 







            </tr>
            <?php
            $i++;
        }
        ?>                                               
    </tbody>                                               
</table>








