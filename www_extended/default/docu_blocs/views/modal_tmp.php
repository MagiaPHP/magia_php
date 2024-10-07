<?php

// enlace con el icon 
$html .= '<a href="#" data-toggle="modal" data-target="#' . $code . '">' . $icon . '</a>';
// modal 
$html .= '
<div class="modal fade" id="' . $code . '" tabindex="-1" role="dialog" aria-labelledby="' . $code . 'Label">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
        <h4 class="modal-title" id="' . $code . 'Label">' . _tr("Help") . ' : ' . $controller . ' : ' . $action . ' : ' . $b . ' - </h4>
            

      </div>
      <div class="modal-body">';
// LINK EDIT
// LINK EDIT
// LINK EDIT
// LINK EDIT
// LINK EDIT
if ($dbsbdib) {
    if (permissions_has_permission($u_rol, 'docu', 'update')) {
//        // Puede editar 
//        $html .= '<form class="" action="index.php" method="post" >
//    <input type="hidden" name="c" value="docu_blocs">
//    <input type="hidden" name="a" value="ok_edit_html">
//    <input type="hidden" name="order_by" value="1">
//    <input type="hidden" name="status" value="1">
//    <input type="hidden" name="id" value="' . $bloc->getId() . '">
//
//    <div class="form-group">
//        <label class="control-label" for="title">' . _tr("Title") . '</label>
//        <div>
//            <input type="text" name="title" class="form-control" id="title" placeholder="title" value="' . $bloc->getTitle() . '" >
//        </div>	
//    </div>
//      
//    <div class="form-group">
//        <label class="control-label" for="post_' . $bloc->getId() . '">' . _tr("Post") . '</label>
//        <div>
//            <textarea name="post" class="form-control" id="post_' . $bloc->getId() . '" placeholder="" >' . $bloc->getPost() . '</textarea>
//        </div>	
//    </div>
//    
//    <script>
//        ClassicEditor
//                .create(document.querySelector("#post_' . $bloc->getId() . '"))
//                .catch(error => {
//                    console.error(error);
//                });
//    </script>   
//    <div class="form-group">
//        <label class="control-label" for=""></label>
//        <div>    
//            <input class="btn btn-primary active" type ="submit" value ="' . _tr("Save") . '">
//        </div>      							
//    </div>      							
//
//</form>
//<br>
//<br>
// ';

        $html .= '<p><a href="index.php?c=docu_blocs&a=edit&id=' . $bloc->getId() . '">' . _tr("Edit") . '</a></p>';
    } else {
        // No puede editar
        $html .= "<h2>" . $bloc->getId() . " " . $bloc->getTitle() . "</h2>";
    }
// LINK EDIT
// LINK EDIT
    $html .= "<p><b>" . $bloc->getTitle() . "</b></p>";
    $html .= $bloc->getPost();
} else {
    // agregar
//        $html .= '<a href="index.php?c=docu&a=edit">' . _tr("Add") . '</a>';
    $html .= 'Agregar primero';
    $html .= "<p>$docu_id</p>";
    // 
}
$html .= '</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">' . _tr("Close") . '</button>
      </div>
    </div>
  </div>
</div>';
