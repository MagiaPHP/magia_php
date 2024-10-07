

<table class="table table-striped">

    <thead>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Address"); ?></th>                    
            <th><?php _t("Postcode"); ?></th>
            <th><?php _t("Barrio"); ?></th>
            <th><?php _t("City"); ?></th>                    
            <th><?php _t("Country"); ?></th>
            <th><?php _t("Action"); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach ($addresses as $key => $value) {
            $menu = '<div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      ' . _tr("Action") . '
                      
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">                                            
                      <li><a href="index.php?c=shop&a=addressDetails&id=' . $value["id"] . '">' . _tr("Details") . '</a></li>
                      <li><a href="index.php?c=shop&a=addressUpdate&id=' . $value["id"] . '">' . _tr("Edit") . '</a></li>                            
                    </ul>
                  </div>';

            echo "<tr>                    
                    <td>$value[id]</td>
                    <td>$value[name]</td>
                    <td>$value[number], $value[address]</td>                                               
                    <td>$value[postcode]</td>                   
                    <td>$value[barrio]</td>                   
                    <td>$value[city]</td>                   
                                     
                                                         
                    <td>" . countries_name($value['country']) . "</td>                                       
                    <td>$menu</td>
                </tr>";
        }
        ?>

    </tbody>

</table>
