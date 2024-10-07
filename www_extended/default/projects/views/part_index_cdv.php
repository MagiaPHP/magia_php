
<div class="row">
    <?php
    foreach ($projects as $key => $pl) {
        $projects = new Projects();
        $projects->setProjects($pl['id']);

        $tasks_total_by_controller = tasks_total_by_controller_doc_id('projects', $projects->getId()) ?? "";

        echo '<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="thumbnail">                                        
                    <div class="caption">
                        <h3><a href="index.php?c=projects&a=details&id=' . $projects->getId() . '">' . $projects->getName() . '</a></h3>
                            
                        <p>' . icon('user') . '  ' . contacts_formated($projects->getContact_id()) . '</p>
                            
                        <p>' . icon('calendar') . ' ' . _tr("End") . ' : ' . ($projects->getDate_end()) . '</p>
                        
                        <p>' . _tr("Status") . ': ' . _tr(projects_status_field_code('name', $projects->getStatus())) . ' - ' . icon('pushpin') . ': ' . $tasks_total_by_controller . '</p>
                            


                    </div>
                </div>
            </div>';
    }
    ?>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
        <div class="panel panel-default">
            <div class="panel-body">


                <?php include "form_add_short.php"; ?>


            </div>
        </div>
    </div>
</div>
