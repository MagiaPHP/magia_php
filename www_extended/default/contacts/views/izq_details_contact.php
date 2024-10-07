<?php
// si el id es igual al propietrario etonces en una sede
$pic = contacts_picture_src($id);
echo '<p class="text-center">';
//echo contacts_picture($id, 150, 'image img-circle img-responsive img-thumbnail');
echo '<img src="' . $pic . '" class="img-thumbnail img-responsive" data-toggle="modal" data-target="#modal_pic_user_add" alt="Headoffice"/><br>';
echo '</p>';
?>


<div class="modal fade" id="modal_pic_user_add" tabindex="-1" role="dialog" aria-labelledby="modal_pic_user_addLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title" id="modal_pic_user_addLabel">
                    <?php _t("Change picture"); ?>
                </h4>

            </div>
            <div class="modal-body">

                <form enctype="multipart/form-data" method="post" action="index.php">
                    <input type="hidden" name="c" value="gallery">
                    <input type="hidden" name="a" value="ok_pic_user_add">    
                    <input type="hidden" name="contact_id"  value="<?php echo $id; ?>">
                    <input type="hidden" name="redi" value="2">
                    <div class="form-group">
                        <label for="file"><?php _t("Pic"); ?></label>
                        <input type="file" id="file" name="file">
                        <p class="help-block"><?php //echo _t("Only these file extensions are accepted");                                                                 ?></p>
                    </div>  
                    <button type="submit" class="btn btn-default"><?php _t("Submit"); ?></button>
                </form>

            </div>
        </div>
    </div>
</div>



<?php
/**
 * 
  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php echo icon("user"); ?>
  <?php echo contacts_formated($id) ?>
  </a>
  <a href="index.php?c=contacts&a=details&id=<?php echo offices_headoffice_of_office(contacts_field_id("owner_id", $id)); ?>" class="list-group-item">
  <?php _t("Headoffice"); ?>: <?php echo contacts_formated(offices_headoffice_of_office(contacts_field_id("owner_id", $id))); ?>
  </a>
  <a href="index.php?c=contacts&a=details&id=<?php echo contacts_field_id("owner_id", $id); ?>" class="list-group-item">
  <?php _t("Office"); ?>: <?php echo contacts_formated(contacts_field_id("owner_id", $id)); ?>
  </a>
  </div>
 */
?>


<?php
// 
//if (patients_field_by_contact_id('id', $id)) {
//    include "izq_patient.php";
//    include "izq_contact.php";
//} else {
//    include "izq_contact.php";
//}


// si es empleado de una de mis oficinas 
// 
// 
// sino 
//
// es empleado de mi emprea o mis ofcinas 
if (1 == 1) {
    include "izq_employee.php";
} else {
    include "izq_contact.php";
}
?>



<?php
/**
 * 
  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php echo icon("user"); ?>
  <?php _t("Human Resources"); ?>
  </a>
  <a class="list-group-item" href="index.php?c=contacts&a=details&id=<?php echo $id; ?>"><?php _t("Details"); ?></a>
  <a class="list-group-item" href="index.php?c=contacts&a=hr_employee_nationality&id=<?php echo $id; ?>"><?php _t("Nationality"); ?></a>
  <a class="list-group-item" href="index.php?c=contacts&a=hr_employee_family_dependents&id=<?php echo $id; ?>"><?php _t("Persons in charge"); ?></a>
  <a class="list-group-item" href="index.php?c=contacts&a=hr_employee_category&id=<?php echo $id; ?>"><?php _t("Category"); ?></a>
  <a class="list-group-item" href="index.php?c=contacts&a=hr_employee_documents&id=<?php echo $id; ?>"><?php _t("Documents"); ?></a>
  <a class="list-group-item" href="index.php?c=contacts&a=hr_employee_sizes_clothes&id=<?php echo $id; ?>"><?php _t("Clothes"); ?></a>
  <a class="list-group-item" href="index.php?c=contacts&a=hr_employee_worked_days&id=<?php echo $id; ?>"><?php _t("Worked days"); ?></a>
  <a class="list-group-item" href="index.php?c=contacts&a=hr_employee_salary&id=<?php echo $id; ?>"><?php _t("Salary"); ?></a>
  <a class="list-group-item" href="index.php?c=contacts&a=hr_employee_benefits&id=<?php echo $id; ?>"><?php _t("Benefits"); ?></a>
  <a class="list-group-item" href="index.php?c=contacts&a=hr_payroll&id=<?php echo $id; ?>"><?php _t("Payroll"); ?></a>

  </div>

 */
?>