<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("config", "izq_contacts"); ?>
    </div>

    <div class="col-lg-8">
        <?php include view("config", "nav"); ?>


        <?php
        if ($m) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1>
            <span class="glyphicon glyphicon-user"></span>
            <?php _t("Contacts format"); ?>
        </h1>



        <?php
        $arg['redi'] = '5';
        $arg['c'] = 'config';
        $arg['a'] = 'credit_notes_id_format';
        $arg['params'] = "";

        include view('config', 'form_contacts_format');
        ?>


        <br>
        <br>

        <p>
            <code>
                {title} 
                {name} 
                {lastname} 
                {name_initials}
                {lastname_initials}

            </code>
        </p>



        <h3>
            <?php _t("Example"); ?>: 
        </h3>

        <br>
        
        <p>
            <b><?php _t("My info") ?></b>
        </p>

        <?php echo contacts_formated($u_id); ?>
        <br>
        <br>
        
        <p>
            <b><?php _t("My company info") ?></b>
        </p>

        <?php echo contacts_formated($u_owner_id); ?>




    </div>
</div>

<?php include view("home", "footer"); ?> 

