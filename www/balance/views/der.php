<?php

// crea html 
if (modules_field_module("status", "tasks") && permissions_has_permission($u_rol, "tasks", "read")) {
    $args = array(
        "c" => $c,
        "name" => 'robinson',
        "id" => $id,
        "form" => array(
            "category_id" => null,
            "contact_id" => $u_id,
            "controller" => $c,
            "doc_id" => $id,
            "redi" => array(
                "redi" => "40",
                "c" => $c,
                "id" => $id
            )
        ),
    );

    tasks_create_html('tmp_der_details', $args);
}
?>
<?php

/**
 * 
  <div class="panel panel-default">
  <div class="panel-heading">
  <h3 class="panel-title">
  <?php _t("Balance"); ?>
  </h3>
  </div>
  <div class="panel-body">




  <table class="table table-bordered">
  <tr>
  <td>1</td>
  <td>1</td>
  <td>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">
  see
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="myModalLabel">Picture detatails</h4>
  </div>
  <div class="modal-body">
  ...




  </div>

  <div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary">Save changes</button>
  </div>

  </div>
  </div>
  </div>


  </td>
  </tr>
  </table>





  </div>
  </div>
 */
?>