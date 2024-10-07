<?php
//vardump($tmp);
?>
<form method="post" action="index.php">
    <input type="hidden" name="c" value="emails">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi" value="2">

    <div class="form-group">
        <label for="sender_id"><?php _t("From"); ?></label>
        <input 
            type="email" 
            class="form-control" 
            id="sender_id" 
            name="<?php echo $u_id; ?>" 
            placeholder="<?php echo contacts_formated($u_id); ?>" 
            readonly="">
    </div>


    <div class="form-group">
        <label for="reciver_id"><?php _t("To"); ?></label>

        <select 
            class="form-control selectpicker" data-live-search="true" 
            name="reciver_id" 
            required="">
            <option value="null"><?php _t("Select one"); ?></option>    
            <?php
            foreach (contacts_list() as $key => $contacts_list) {

                $selected = (isset($reciver_id) && $reciver_id == $contacts_list['id'] ) ? " selected " : "";

                echo '<option value="' . $contacts_list["id"] . '" ' . $selected . '>';
                echo ' ' . contacts_formated($contacts_list['id']) . ' (' . $contacts_list['id'] . ') [' . directory_by_contact_name($contacts_list['id'], "Email") . ']';
                echo '</option>  ';
            }
            ?>
        </select>    
    </div>


    <div class="form-group">
        <label for="subjet"><?php _t("Subjet"); ?></label>
        <input 
            type="text" 
            class="form-control" 
            id="subjet" 
            name="subjet" 
            placeholder=""
            value="<?php //echo $tmp->getTmp();    ?>"

            >
    </div>


    <div class="form-group">
        <label for="message"><?php _t("Message"); ?></label>



        <script src="includes/tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>

        <script>
            tinymce.init({
                selector: 'textarea#message'
            });
        </script>

        <textarea class="form-control" id="message" name="message" id="message" rows="15"><?php //echo $tmp->getBody();    ?>
            <?php echo user_options_search_by_user_option($u_id, 'emails_signature')['data']; ?>
        </textarea>


    </div>


    <?php
    /**
     *     <div class="checkbox">
      <label>
      <input type="checkbox"> Save like tamplate
      </label>
      </div>

     */
    ?>
    <button type="submit" class="btn btn-default">
        <span class="glyphicon glyphicon-send"></span>
        <?php _t("Send"); ?>
    </button>



    <?php
    /**
     *     <!-- Button trigger modal -->
      <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">
      <span class="glyphicon glyphicon-time"></span>
      </button>

      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">
      Envios Programados
      </h4>
      </div>
      <div class="modal-body">
      Envio programado para

      <form class="form-inline">
      <div class="form-group">
      <label for="exampleInputName2">Fecha</label>
      <input type="date" class="form-control" id="exampleInputName2" placeholder="Fecha">
      </div>
      <div class="form-group">
      <label for="exampleInputEmail2">Hora</label>
      <input type="time" class="form-control" id="exampleInputEmail2" placeholder="10:30">
      </div>
      <button type="submit" class="btn btn-default">Send invitation</button>
      </form>


      </div>


      </div>
      </div>
      </div>


     */
    ?>

</form>




