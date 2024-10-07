
<div class="row">

    <?php
    foreach ($contacts as $key => $contact) {

        if ($contact['type'] == 1 && $contact['tva']) {
            $type = 1; // headoffice
        }


        if ($contact['type'] == 1 && !$contact['tva']) {
            $type = 2; // oficina
        }

        if ($contact['type'] == 0) {
            $type = 3; // contacto
        }

        // esta en la tabla de pacientes
        if (patients_field_by_contact_id('company_id', $contact['id'])) {
            $type = 4; // contacto y paciente
        }



        // depende el tipo se muestra
        switch ($type) {
            case "1": // headoffice
                include "cv_index_item_headoffice.php";
                break;

            case "2": // office
                include "cv_index_item_office.php";
                break;

            case "3": // contact
                include "cv_index_item_contact.php";
                break;

            case "4": // patient
                include "cv_index_item_patient.php";
                break;

            default: // por defecto 

                break;
        }
    }
    ?>

</div>