<div class="row">
    <?php
    //vardump(tasks_status_list());
    foreach (tasks_status_list() as $key => $tasks_status) {
        ?>
        <div class="col-sm-12 col-md-2 col-lg-2">
            <h4>
                <?php echo $tasks_status['icon']; ?>
                <?php echo _tr(tasks_status_field_code('name', $tasks_status['code'])); ?>
            </h4>
            <?php

            foreach (tasks_list() as $key => $tasks_by_code) {
                if ($tasks_by_code['status'] == $tasks_status['code']) {
                    echo tasks_create_html($tasks_status['code'], $tasks_by_code);
                }
            }
            ?>
        </div>
    <?php }
    ?>
</div>