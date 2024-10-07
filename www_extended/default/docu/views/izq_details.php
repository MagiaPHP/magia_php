

<div class="panel panel-default" id="docu_izq">
    <div class="panel-body">

        <b><?php _t("Documentation"); ?></b>
        <ul>
            <li><a href="index.php?c=docu"><?php _t('Indice'); ?></a></li>
            <?php
            foreach (docu_list_widthout_father() as $key => $h1) {
                $icon_edit = (permissions_has_permission($u_rol, 'docu', "update")) ? '<a href="index.php?c=docu&a=edit&id=' . $h1["id"] . '"><span class="glyphicon glyphicon-pencil"></span></a>' : "";
                echo '<li>' . $icon_edit . ' <a href="index.php?c=docu&a=details&id=' . $h1['id'] . '">' . _tr($h1['title']) . '</a></li>';

                // h2
                echo "<ul>";
                foreach (docu_list_of_children($h1['id']) as $key => $hx) {
                    $icon_edit = (permissions_has_permission($u_rol, 'docu', "update")) ? '<a href="index.php?c=docu&a=edit&id=' . $hx["id"] . '"><span class="glyphicon glyphicon-pencil"></span></a>' : "";
                    echo '<li>' . $icon_edit . ' <a href="index.php?c=docu&a=details&id=' . $h1['id'] . '#' . $hx['id'] . '">' . _tr($hx['title']) . '</a></li>';

                    // h3
                    echo "<ul>";
                    foreach (docu_list_of_children($hx['id']) as $key => $hx) {
                        $icon_edit = (permissions_has_permission($u_rol, 'docu', "update")) ? '<a href="index.php?c=docu&a=edit&id=' . $hx["id"] . '"><span class="glyphicon glyphicon-pencil"></span></a>' : "";

                        echo '<li>' . $icon_edit . ' <a href="index.php?c=docu&a=details&id=' . $h1['id'] . '#' . $hx['id'] . '">' . _tr($hx['title']) . '</a></li>';

                        // h4
                        echo "<ul>";
                        foreach (docu_list_of_children($hx['id']) as $key => $hx) {
                            $icon_edit = (permissions_has_permission($u_rol, 'docu', "update")) ? '<a href="index.php?c=docu&a=edit&id=' . $hx["id"] . '"><span class="glyphicon glyphicon-pencil"></span></a>' : "";

                            echo '<li>' . $icon_edit . ' <a href="index.php?c=docu&a=details&id=' . $h1['id'] . '#' . $hx['id'] . '">' . _tr($hx['title']) . '</a></li>';
                            //
                            // h5
                            echo "<ul>";
                            foreach (docu_list_of_children($hx['id']) as $key => $hx) {
                                $icon_edit = (permissions_has_permission($u_rol, 'docu', "update")) ? '<a href="index.php?c=docu&a=edit&id=' . $hx["id"] . '"><span class="glyphicon glyphicon-pencil"></span></a>' : "";
                                echo '<li>' . $icon_edit . ' <a href="index.php?c=docu&a=details&id=' . $h1['id'] . '#' . $hx['id'] . '">' . _tr($hx['title']) . '</a></li>';
                                //
                                //
                                //
                                // h6
                                echo "<ul>";
                                foreach (docu_list_of_children($hx['id']) as $key => $hx) {
                                    $icon_edit = (permissions_has_permission($u_rol, 'docu', "update")) ? '<a href="index.php?c=docu&a=edit&id=' . $hx["id"] . '"><span class="glyphicon glyphicon-pencil"></span></a>' : "";
                                    echo '<li>' . $icon_edit . ' <a href="index.php?c=docu&a=details&id=' . $h1['id'] . '#' . $hx['id'] . '">' . _tr($hx['title']) . '</a></li>';
                                }
                                echo "</ul>"; //6
                            }
                            echo "</ul>"; //5
                        }
                        echo "</ul>"; //4
                    }
                    echo "</ul>"; //3
                }
                echo "</ul>"; //2
            }
            ?>
        </ul>
    </div>
</div>

<?php if (permissions_has_permission($u_rol, 'docu', "create")) { ?>
    <div class = "panel panel-default" id = "docu_izq">
        <div class = "panel-body">
            <a href = "index.php?c=docu&a=add"><?php _t("Add"); ?></a>
        </div>        
    </div>  
<?php } ?>