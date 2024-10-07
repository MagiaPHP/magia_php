<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Provider"); ?>
    </div>
    <div class="panel-body">


        <form method="post" action="index.php">
            <input type="hidden" name="c" value="providers">
            <input type="hidden" name="a" value="ok_add_short">
            <input type="hidden" name="company_id" value="<?php echo $id; ?>">
            <input type="hidden" name="redi[redi]" value="8">

            <div class="form-group">
                <label for="client_number">
                    <?php _t("My client number"); ?>
                </label>
                <input 
                    type="text" 
                    id="client_number" 
                    name="client_number" 
                    class="form-control" 
                    aria-describedby="client_number"
                    required=""
                    value="<?php echo (providers_search_by('company_id', $id)[0]['client_number']) ?? null; ?>"
                    >                                
            </div>

            <button type="submit" class="btn btn-<?php echo (providers_search_by('company_id', $id)) ? "default" : "primary"; ?>">
                <?php echo icon("floppy-disk"); ?>
                <?php _t("Save"); ?>
            </button>

        </form>

    </div>
</div>

