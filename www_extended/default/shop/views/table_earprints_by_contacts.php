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
            <th>#</th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Side"); ?></th>
            <th><?php _t("Contact"); ?></th>
            <th><?php _t("Way"); ?></th>                        
            <th><?php _t("Date registre"); ?></th>                        
            <th><?php _t("Name original"); ?></th>                        
            <th><?php _t("Name actual"); ?></th>                                              
            <th><?php _t("Send by"); ?></th>                                            
            <th><span class="glyphicon glyphicon-download-alt"></span></th>                                            
        </tr>
    </thead>            
    <tfoot>
        <tr>
            <th>#</th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Side"); ?></th>
            <th><?php _t("Contact"); ?></th>
            <th><?php _t("Way"); ?></th>                        
            <th><?php _t("Date registre"); ?></th>                        
            <th><?php _t("Name original"); ?></th>                        
            <th><?php _t("Name actual"); ?></th>                                               
            <th><?php _t("Send by"); ?></th>                                            
            <th><span class="glyphicon glyphicon-download-alt"></span></th>                                            
        </tr>
    </tfoot>
    <tbody>

        <?php
        $i = 1;
        foreach ($earprints as $epbp) {
            ?>
            <tr>  

                <td>
                    <?php echo $i++; ?>
                </td>

                <td>
                    <?php echo $epbp["id"]; ?>

                </td>




                <td><?php echo $epbp["side"]; ?></td>


                <td>
                    <?php echo contacts_formated($epbp["contact_id"]); ?>
                </td>


                <td><?php echo $epbp["way"]; ?></td>
                <td><?php echo $epbp["date_registre"]; ?></td>
                <td><?php echo $epbp["name_original"]; ?></td>
                <td><?php echo $epbp["name_actual"]; ?></td>


                <td>
                    <?php echo contacts_formated($epbp["send_by"]); ?>
                </td>

                <td>
                    <?php
//                        modal(
//                                magia_uniqid(), 
//                                'Preview STL file', 
//                                array("btn"=>'default', "label"=>"See"), 
//                                array("c"=>"earprints","a"=>"preview"), 
//                                array(), 
//                                array());
                    ?>

                    <?php
                    $stl_file = "www/gallery/img/scan/" . $epbp['name_actual'];

                    if (file_exists($stl_file) && 1 === 22222222222222222222222222222222) {
                        ?>
                        <a href="<?php echo $stl_file; ?>">
                            <span class="glyphicon glyphicon-download-alt"></span>
                        </a>
                    <?php }
                    ?>
                </td>
            </tr>
        <?php }
        ?>
    </tbody>  
</table>

