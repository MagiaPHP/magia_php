<table class="table table-striped">           
    <thead>
        <tr>                    
            <th><?php _t("#"); ?></th>    
            <th><?php _t("Motif"); ?></th>    
            <th><?php _t("Totals"); ?></th>                
        </tr>
    </thead>
    <tfoot>


    </tfoot>

    <tbody>
        <?php
        $i = 1;
        foreach (shop_stats_remakes_motifs_by_office_year_month($office['id'], $year, $month) as $key => $value) {
            ?>                                  

            <tr>
                <td>
                    <?php echo $i; ?>
                </td>
                <td>
                    <?php echo remake_motifs_field_id("motif", $value['motif_id']); ?>
                </td>

                <td>
                    <?php echo $value['total']; ?>
                </td>



            </tr>
            <?php
            $i++;
        }
        ?>                                               
    </tbody>                                               
</table>