<?php

$modal = '<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#' . $ecat->getCode() . '"> + </button>
<div class="modal fade" id="' . $ecat->getCode() . '" tabindex="-1" role="dialog" aria-labelledby="' . $ecat->getCode() . 'Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="' . $ecat->getCode() . 'Label">
                    ' . _tr("Add category") . '
                </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="index.php">
                    <input type="hidden" name="c" value="expenses_categories">
                    <input type="hidden" name="a" value="ok_add">
                    <input type="hidden" name="father_code" value="' . $ecat->getCode() . '">                    
                    <input type="hidden" name="redi[redi]" value="5">


                    <div class="form-group">
                        <label for="father" class="col-sm-3 control-label">' . _tr("Father") . '</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon">' . $ecat->getCode() . '</div>
                                <input 
                                type="number" 
                                class="form-control" 
                                id="" name="" 
                                placeholder="" 
                                
                                disabled value="' . expenses_categories_field_code('category', $ecat->getCode()) . '" required>                                
                            </div>
                        </div>
                    </div>     



                    <div class="form-group">
                        <label for="code" class="col-sm-3 control-label">' . _tr("Code") . '</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon">' . $ecat->getCode() . '</div>
                                <input 
                                type="number" 
                                class="form-control" 
                                id="code" 
                                name="code" 
                                maxlength="2" pattern="[0-9]{1,2}" title="'._tr("Only number please").'" 
                                placeholder="">                                
                            </div>
                        </div>
                    </div>     

                    <div class="form-group">
                        <label for="category" class="col-sm-3 control-label">' . _tr("Category") . '</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="category"  name="category" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-primary">
                                ' . icon("plus") . ' 
                                ' . _tr("Add") . '
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>';
?>