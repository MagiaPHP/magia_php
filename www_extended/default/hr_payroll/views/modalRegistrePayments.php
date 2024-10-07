<?php

$modal = '

<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModalRegistrePayments_' . $bl->getId() . '">
    ' . _tr("Add") . ' 
</button>


<div class="modal fade" id="myModalRegistrePayments_' . $bl->getId() . '" tabindex="-1" role="dialog" aria-labelledby="myModalRegistrePayments_' . $bl->getId() . 'Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalRegistrePayments_' . $bl->getId() . 'Label">
                    ' . _tr("Register a payment") . ' : 
                </h4>
            </div>
            <div class="modal-body">

<div class="panel panel-default">
  <div class="panel-body">
                
                <p><b>' . _tr("Bank line id") . '</b> : ' . ($bl->getId()) . '</p>
                <p><b>' . _tr("My account number") . '</b> : ' . ($bl->getMy_account()) . '</p>
                <p><b>' . _tr("Operation") . '</b> : ' . ($bl->getOperation()) . '</p>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-body">                
                <p><b>' . _tr("Date operation") . '</b> : ' . ($bl->getDate_operation()) . '</p>
                <p><b>' . _tr("Sender") . '</b> : ' . ($bl->getSender()) . '</p>
                <p><b>' . _tr("Sender account") . '</b> : ' . ($bl->getAccount_sender()) . '</p>
                <p><b>' . _tr("Description") . '</b> : ' . ($bl->getDescription()) . '</p>
                <p><b>' . _tr("Details") . '</b> : ' . ($bl->getDetails()) . '</p>
                <p><b>' . _tr("Comunication") . '</b> : ' . ($bl->getComunication()) . '</p>
                <p><b>' . _tr("Ce") . '</b> : ' . ($bl->getCe()) . '</p>                    
  </div>
</div>


                    
<a class="" role="" data-toggle="collapse" href="#more_refs" aria-expanded="false" aria-controls="more_refs">
' . icon('chevron-down') . '  ' . _tr("more") . '
</a>



<div class="collapse" id="more_refs">
  <div class="well">   
                <p><b>' . _tr("Ref") . '</b> : ' . ($bl->getRef()) . '</p>                    
                <p><b>' . _tr("Ref2") . '</b> : ' . ($bl->getRef2()) . '</p>
                <p><b>' . _tr("Ref3") . '</b> : ' . ($bl->getRef3()) . '</p>
                <p><b>' . _tr("Ref4") . '</b> : ' . ($bl->getRef4()) . '</p>
                <p><b>' . _tr("Ref5") . '</b> : ' . ($bl->getRef5()) . '</p>
                <p><b>' . _tr("Ref6") . '</b> : ' . ($bl->getRef6()) . '</p>
                <p><b>' . _tr("Ref7") . '</b> : ' . ($bl->getRef7()) . '</p>
                <p><b>' . _tr("Ref8") . '</b> : ' . ($bl->getRef8()) . '</p>
                <p><b>' . _tr("Ref9") . '</b> : ' . ($bl->getRef9()) . '</p>
                <p><b>' . _tr("Ref10") . '</b> : ' . ($bl->getRef10()) . '</p>
  </div>
</div>



<div class="panel panel-default">
  <div class="panel-body">               
    <p><h3>' . _tr("Total") . '</b> : ' . moneda($bl->getTotal()) . '</h3>
  </div>
</div>

<br>


<form action="index.php" method="post" >
    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_payement_registre">
    <input type="hidden" name="use_banks_lines" value="1">
    <input type="hidden" name="payroll_id" value="' . $hr_payroll->getId() . '">    
    <input type="hidden" name="banks_lines_id" value="' . $bl->getId() . '">    
    <input type="hidden" name="account_number" value="' . $bl->getMy_account() . '">    
    <input type="hidden" name="total" value="' . $bl->getTotal() . '">    
    <input type="hidden" name="ref" value="' . $bl->getOperation() . '">    
    <input type="hidden" name="description" value="' . $bl->getDescription() . '">    
    <input type="hidden" name="comunication" value="' . $bl->getComunication() . '">    
    <input type="hidden" name="details" value="' . $bl->getDetails() . '">    
    <input type="hidden" name="message" value="' . $bl->getMessage() . '">    
    <input type="hidden" name="ce" value="' . $bl->getCe() . '">    
    <input type="hidden" name="date_operation" value="' . $bl->getDate_operation() . '">    
    <input type="hidden" name="redi[redi]" value="3">  
    
<div class="form-group">
    <label for="notes">' . _tr("Notes") . '</label>
    <textarea class="form-control" name="notes" id="notes"></textarea>
  </div>
  

  
   
<button type="submit" class="btn btn-danger">
' . _tr("Register this payment for this expense") . '
</button>

</form>

            </div>
            <div class="modal-footer">        
                

      <a class="btn btn-primary" href="index.php?c=banks_lines&a=details&id=' . $bl->getId() . '">' . icon('eye-open') . ' ' . _tr("Details") . '</a>                


                
            </div>
        </div>
    </div>
</div>';
?>