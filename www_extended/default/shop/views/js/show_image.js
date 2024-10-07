$(document).ready(function ()
{

    $(".modele_id_R").on('change', function () {
        var selected_modele = $(this).val();
        var $radios = $('input:radio[class=modele_id_L]');
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_modele + ']').prop('checked', true);
            //
            document.getElementById("der").src = "www/gallery/img/jiho_audio/modeles_r_" + selected_modele + ".jpg";
        }

    });

    $(".modele_id_L").on('change', function () {
        var selected_modele = $(this).val();
        var $radios = $('input:radio[class=modele_id_R]');
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_modele + ']').prop('checked', true);
            //
            document.getElementById("izq").src = "www/gallery/img/jiho_audio/modeles_l_" + selected_modele + ".jpg";
        }

    });

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
    $(".mesure_id_R").on('change', function () {
        var selected_mesure = $(this).val();
        var $radios = $('input:radio[class=mesure_id_L]');
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_mesure + ']').prop('checked', true);
            //
            document.getElementById("der").src = "www/gallery/img/jiho_audio/mesures_r_" + selected_mesure + ".jpg";
        }

    });

    $(".mesure_id_L").on('change', function () {
        var selected_mesure = $(this).val();
        var $radios = $('input:radio[class=mesure_id_R]');
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_mesure + ']').prop('checked', true);
            document.getElementById("izq").src = "www/gallery/img/jiho_audio/mesures_l_" + selected_mesure + ".jpg";
        }

    });
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
// F O R M E S 
////////////////////////////////////////////////////////////////////////////////
    $(".forme_id_R").on('change', function () {
        var selected_forme = $(this).val();
        var $radios = $('input:radio[class=forme_id_L]');
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_forme + ']').prop('checked', true);

            // esto es para que se muestre la imagen 
            document.getElementById("der").src = "www/gallery/img/jiho_audio/formes_r_" + selected_forme + ".jpg";
        }

    });

    $(".forme_id_L").on('change', function () {
        var selected_forme = $(this).val();
        var $radios = $('input:radio[class=forme_id_R]');
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_forme + ']').prop('checked', true);
            // para que se muestre le imagen 
            document.getElementById("izq").src = "www/gallery/img/jiho_audio/formes_l_" + selected_forme + ".jpg";
        }

    });
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
    $(".material_id_R").on('change', function () {
        var selected_material = $(this).val();
        var $radios = $('input:radio[class=material_id_L]');
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_material + ']').prop('checked', true);
            // imagen de derecha
            document.getElementById("der").src = "www/gallery/img/jiho_audio/materials_r_" + selected_material + ".jpg";

        }

    });

    $(".material_id_L").on('change', function () {
        var selected_material = $(this).val();
        var $radios = $('input:radio[class=material_id_R]');
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_material + ']').prop('checked', true);
            //
            document.getElementById("izq").src = "www/gallery/img/jiho_audio/materials_l_" + selected_material + ".jpg";
        }

    });
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
    $(".colour_id_R").on('change', function () {
        var selected_colour = $(this).val();
        var $radios = $('input:radio[class=colour_id_L]');
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_colour + ']').prop('checked', true);
            //
            document.getElementById("der").src = "www/gallery/img/jiho_audio/couleurs_r_" + selected_colour + ".jpg";
        }

    });

    $(".colour_id_L").on('change', function () {
        var selected_colour = $(this).val();
        var $radios = $('input:radio[class=colour_id_R]');
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_colour + ']').prop('checked', true);
            //
            document.getElementById("izq").src = "www/gallery/img/jiho_audio/couleurs_l_" + selected_colour + ".jpg";
        }

    });
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    $(".perte_id_R").on('change', function () {
        var selected_perte = $(this).val();
        var $radios = $('input:radio[class=perte_id_L]');
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_perte + ']').prop('checked', true);
            //
            document.getElementById("der").src = "www/gallery/img/jiho_audio/perte_auditive_r_" + selected_perte + ".jpg";
        }

    });

    $(".perte_id_L").on('change', function () {
        var selected_perte = $(this).val();
        var $radios = $('input:radio[class=perte_id_R]');
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_perte + ']').prop('checked', true);
            //
            document.getElementById("izq").src = "www/gallery/img/jiho_audio/perte_auditive_l_" + selected_perte + ".jpg";
        }

    });
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    $(".marque_id_R").on('change', function () {
        var selected_marque = $(this).val();
        var $radios = $('input:radio[class=marque_id_L]');
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_marque + ']').prop('checked', true);
            //
            document.getElementById("der").src = "www/gallery/img/jiho_audio/marques_r_" + selected_marque + ".jpg";
        }

    });

    $(".marque_id_L").on('change', function () {
        var selected_marque = $(this).val();
        var $radios = $('input:radio[class=marque_id_R]');
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_marque + ']').prop('checked', true);
            //
            document.getElementById("izq").src = "www/gallery/img/jiho_audio/marques_r_" + selected_marque + ".jpg";
        }

    });
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    $(".ecouteur_id_R").on('change', function () {
        var selected_ecouteur = $(this).val();
        var $radios = $('input:radio[class=ecouteur_id_L]');
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_ecouteur + ']').prop('checked', true);
            //
            document.getElementById("der").src = "www/gallery/img/jiho_audio/ecouteurs_r_" + selected_ecouteur + ".jpg";
        }

    });

    $(".ecouteur_id_L").on('change', function () {
        var selected_ecouteur = $(this).val();
        var $radios = $('input:radio[class=ecouteur_id_R]');
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_ecouteur + ']').prop('checked', true);
            //
            document.getElementById("izq").src = "www/gallery/img/jiho_audio/ecouteurs_l_" + selected_ecouteur + ".jpg";
        }

    });
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    $(".event_id_R").on('change', function () {
        var selected_event = $(this).val();
        var $radios = $('input:radio[class=event_id_L]');
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_event + ']').prop('checked', true);
            //
            document.getElementById("der").src = "www/gallery/img/jiho_audio/events_r_" + selected_event + ".jpg";
        }

    });

    $(".event_id_L").on('change', function () {
        var selected_event = $(this).val();
        var $radios = $('input:radio[class=event_id_R]');
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_event + ']').prop('checked', true);
            //
            document.getElementById("izq").src = "www/gallery/img/jiho_audio/events_l_" + selected_event + ".jpg";
        }

    });
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    $(".diametre_id_R").on('change', function () {
        var selected_diametre = $(this).val();
        var $radios = $('input:radio[class=diametre_id_L]');
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_diametre + ']').prop('checked', true);
            //
            document.getElementById("der").src = "www/gallery/img/jiho_audio/diametre_r_" + selected_diametre + ".jpg";
        }

    });

    $(".diametre_id_L").on('change', function () {
        var selected_diametre = $(this).val();
        var $radios = $('input:radio[class=diametre_id_R]');
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_diametre + ']').prop('checked', true);
            //
            document.getElementById("izq").src = "www/gallery/img/jiho_audio/diametre_l_" + selected_diametre + ".jpg";
        }

    });
    ////////////////////////////////////////////////////////////////////////
    $(".longuer_id_R").on('change', function () {
        var selected_longuer = $(this).val();
        var $radios = $('input:radio[class=longuer_id_L]');
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_longuer + ']').prop('checked', true);
            //
            document.getElementById("der").src = "www/gallery/img/jiho_audio/longueurs_r_" + selected_longuer + ".jpg";
        }

    });

    $(".longuer_id_L").on('change', function () {
        var selected_longuer = $(this).val();
        var $radios = $('input:radio[class=longuer_id_R]');
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_longuer + ']').prop('checked', true);
            //
            document.getElementById("izq").src = "www/gallery/img/jiho_audio/longueurs_r_" + selected_longuer + ".jpg";
        }

    });
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    $(".constitution_id_R").on('change', function () {
        var selected_constitution = $(this).val();
        var $radios = $('input:radio[class=constitution_id_L]');
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_constitution + ']').prop('checked', true);
            //
            document.getElementById("der").src = "www/gallery/img/jiho_audio/constitution_r_" + selected_constitution + ".jpg";
        }

    });

    $(".constitution_id_L").on('change', function () {
        var selected_constitution = $(this).val();
        var $radios = $('input:radio[class=constitution_id_R]');
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_constitution + ']').prop('checked', true);
            //
            document.getElementById("izq").src = "www/gallery/img/jiho_audio/constitution_r_" + selected_constitution + ".jpg";
        }

    });
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    $(".selected_option_id_R").on('change', function () {
        var selected_selected_option = $(this).val();
        var $radios = $('input:radio[class=selected_option_id_L]');
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_selected_option + ']').prop('checked', true);
            //
            document.getElementById("der").src = "www/gallery/img/jiho_audio/options_r_" + selected_selected_option + ".jpg";
        }

    });

    $(".selected_option_id_L").on('change', function () {
        var selected_selected_option = $(this).val();
        var $radios = $('input:radio[class=selected_option_id_R]');
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_selected_option + ']').prop('checked', true);
            //
            document.getElementById("izq").src = "www/gallery/img/jiho_audio/options_r_" + selected_selected_option + ".jpg";
        }

    });



});	