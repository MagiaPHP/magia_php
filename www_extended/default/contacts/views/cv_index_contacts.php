
<div class="row">
    <?php
    foreach ($contacts as $key => $contact) {



        // si contacto y paciente
        // es paciente si esta en la lista de pacientes
        // esto me regresa la oficina a la cual un paciente pertenece
        if (patients_company_by_patient_id($contact['id'])) {

            include "cv_index_item_patient.php";
        } else {
            include "cv_index_item_contact.php";
        }
    }
    ?>
</div>