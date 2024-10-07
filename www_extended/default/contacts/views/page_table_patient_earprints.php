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
            <th><?php _t("Path server"); ?></th>                        
            <th><?php _t("Path local"); ?></th>                        
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
            <th><?php _t("Path server"); ?></th>                        
            <th><?php _t("Path local"); ?></th>                        
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
                    <a 
                        href="index.php?c=orders&a=details&id=<?php echo $epbp['id']; ?>"

                        ><?php echo $epbp["id"]; ?></a>

                </td>




                <td><?php echo $epbp["side"]; ?></td>


                <td>
                    <a 
                        href="index.php?c=contacts&a=details&id=<?php echo $epbp['contact_id'] ?>"
                        ><?php echo contacts_formated($epbp["contact_id"]); ?>
                    </a>
                </td>


                <td><?php echo $epbp["way"]; ?></td>
                <td><?php echo $epbp["date_registre"]; ?></td>
                <td><?php echo $epbp["name_original"]; ?></td>
                <td><?php echo $epbp["name_actual"]; ?></td>
                <td><?php echo $epbp["path_server"]; ?></td>
                <td>
                    <?php echo $epbp["path_local"]; ?>
                </td>

                <td>
                    <a 
                        href="index.php?c=contacts&a=details&id=<?php echo $epbp['send_by'] ?>"
                        ><?php echo contacts_formated($epbp["send_by"]); ?>
                    </a>
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

                    if (file_exists($stl_file)) {
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

