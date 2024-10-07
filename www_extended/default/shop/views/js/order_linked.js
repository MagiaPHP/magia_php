document.addEventListener("DOMContentLoaded", function ()
{

    $(".modele_id_R").on('change', function () {
        var selected_modele = $(this).val();
        var $radios = $('input:radio[class=modele_id_L]');
        showImage(selected_modele, "modeles", "r");
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_modele + ']').prop('checked', true);
            showImage(selected_modele, "modeles", "l");
        }

    });

    $(".modele_id_L").on('change', function () {
        var selected_modele = $(this).val();
        var $radios = $('input:radio[class=modele_id_R]');
        showImage(selected_modele, "modeles", "l");
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_modele + ']').prop('checked', true);
            showImage(selected_modele, "modeles", "r");
        }

    });

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
    $(".mesure_id_R").on('change', function () {
        var selected_mesure = $(this).val();
        var $radios = $('input:radio[class=mesure_id_L]');
        showImage(selected_mesure, "mesure_snr", "r");
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_mesure + ']').prop('checked', true);
            showImage(selected_mesure, "mesure_snr", "l");
        }

    });

    $(".mesure_id_L").on('change', function () {
        var selected_mesure = $(this).val();
        var $radios = $('input:radio[class=mesure_id_R]');
        showImage(selected_mesure, "mesure_snr", "l");
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_mesure + ']').prop('checked', true);
            showImage(selected_mesure, "mesure_snr", "r");
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
        showImage(selected_forme, "formes", "r");
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_forme + ']').prop('checked', true);
            showImage(selected_forme, "formes", "l");
        }
    });
    $(".forme_id_L").on('change', function () {
        var selected_forme = $(this).val();
        var $radios = $('input:radio[class=forme_id_R]');
        showImage(selected_forme, "formes", "l");
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_forme + ']').prop('checked', true);
            showImage(selected_forme, "formes", "r");
        }
    });
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
    $(".material_id_R").on('change', function () {
        var selected_material = $(this).val();
        var $radios = $('input:radio[class=material_id_L]');
        showImage(selected_material, "materials", "r");
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_material + ']').prop('checked', true);
            showImage(selected_material, "materials", "l");
        }

    });

    $(".material_id_L").on('change', function () {
        var selected_material = $(this).val();
        var $radios = $('input:radio[class=material_id_R]');
        showImage(selected_material, "materials", "l");
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_material + ']').prop('checked', true);
            showImage(selected_material, "materials", "r");
        }

    });
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
    $(".colour_id_R").on('change', function () {
        var selected_colour = $(this).val();
        var $radios = $('input:radio[class=colour_id_L]');
        showImage(selected_colour, "couleurs", "r");
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_colour + ']').prop('checked', true);
            showImage(selected_colour, "couleurs", "l");
        }
    });

    $(".colour_id_L").on('change', function () {
        var selected_colour = $(this).val();
        var $radios = $('input:radio[class=colour_id_R]');
        showImage(selected_colour, "couleurs", "l");
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_colour + ']').prop('checked', true);
            showImage(selected_colour, "couleurs", "r");
        }

    });
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    $(".perte_id_R").on('change', function () {
        var selected_perte = $(this).val();
        var $radios = $('input:radio[class=perte_id_L]');
        showImage(selected_perte, "perte_auditive", "r");
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_perte + ']').prop('checked', true);
            showImage(selected_perte, "perte_auditive", "l");
        }

    });

    $(".perte_id_L").on('change', function () {
        var selected_perte = $(this).val();
        var $radios = $('input:radio[class=perte_id_R]');
        showImage(selected_perte, "perte_auditive", "l");
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_perte + ']').prop('checked', true);
            showImage(selected_perte, "perte_auditive", "r");
        }
    });
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    $(".marque_id_R").on('change', function () {
        var selected_marque = $(this).val();
        var $radios = $('input:radio[class=marque_id_L]');
        showImage(selected_marque, "marques", "r");
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_marque + ']').prop('checked', true);
            showImage(selected_marque, "marques", "l");
        }
    });

    $(".marque_id_L").on('change', function () {
        var selected_marque = $(this).val();
        var $radios = $('input:radio[class=marque_id_R]');
        showImage(selected_marque, "marques", "l");
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_marque + ']').prop('checked', true);
            showImage(selected_marque, "marques", "r");
        }
    });
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    $(".ecouteur_id_R").on('change', function () {
        var selected_ecouteur = $(this).val();
        var $radios = $('input:radio[class=ecouteur_id_L]');
        showImage(selected_ecouteur, "ecouteurs", "r");
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_ecouteur + ']').prop('checked', true);
            showImage(selected_ecouteur, "ecouteurs", "l");
        }
    });

    $(".ecouteur_id_L").on('change', function () {
        var selected_ecouteur = $(this).val();
        var $radios = $('input:radio[class=ecouteur_id_R]');
        showImage(selected_ecouteur, "ecouteurs", "l");
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_ecouteur + ']').prop('checked', true);
            showImage(selected_ecouteur, "ecouteurs", "r");
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
        showImage(selected_event, "events", "r");
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_event + ']').prop('checked', true);
            showImage(selected_event, "events", "l");
        }
    });

    $(".event_id_L").on('change', function () {
        var selected_event = $(this).val();
        var $radios = $('input:radio[class=event_id_R]');
        showImage(selected_event, "events", "l");
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_event + ']').prop('checked', true);
            showImage(selected_event, "events", "r");
        }
    });
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    $(".diametre_id_R").on('change', function () {
        var selected_diametre = $(this).val();
        var $radios = $('input:radio[class=diametre_id_L]');
        showImage(selected_diametre, "diametre", "r");
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_diametre + ']').prop('checked', true);
            showImage(selected_diametre, "diametre", "l");
        }
    });

    $(".diametre_id_L").on('change', function () {
        var selected_diametre = $(this).val();
        var $radios = $('input:radio[class=diametre_id_R]');
        showImage(selected_diametre, "diametre", "l");
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_diametre + ']').prop('checked', true);
            showImage(selected_diametre, "diametre", "r");
        }
    });
    ////////////////////////////////////////////////////////////////////////
    $(".longuer_id_R").on('change', function () {
        var selected_longuer = $(this).val();
        var $radios = $('input:radio[class=longuer_id_L]');
        showImage(selected_longuer, "longueurs", "r");
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_longuer + ']').prop('checked', true);
            showImage(selected_longuer, "longueurs", "l");
        }
    });

    $(".longuer_id_L").on('change', function () {
        var selected_longuer = $(this).val();
        var $radios = $('input:radio[class=longuer_id_R]');
        showImage(selected_longuer, "longueurs", "l");
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_longuer + ']').prop('checked', true);
            showImage(selected_longuer, "longueurs", "r");
        }
    });
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    $(".constitution_id_R").on('change', function () {
        var selected_constitution = $(this).val();
        var $radios = $('input:radio[class=constitution_id_L]');
        showImage(selected_constitution, "constitution", "r");
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_constitution + ']').prop('checked', true);
            showImage(selected_constitution, "constitution", "l");
        }
    });

    $(".constitution_id_L").on('change', function () {
        var selected_constitution = $(this).val();
        var $radios = $('input:radio[class=constitution_id_R]');
        showImage(selected_constitution, "constitution", "l");
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_constitution + ']').prop('checked', true);
            showImage(selected_constitution, "constitution", "r");
        }
    });
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    $(".selected_option_id_R").on('change', function () {
        var selected_selected_option = $(this).val();
        var $radios = $('input:radio[class=selected_option_id_L]');
        showImage(selected_selected_option, "options", "r");
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_selected_option + ']').prop('checked', true);
            showImage(selected_selected_option, "options", "l");
        }
    });

    $(".selected_option_id_L").on('change', function () {
        var selected_selected_option = $(this).val();
        var $radios = $('input:radio[class=selected_option_id_R]');
        showImage(selected_selected_option, "options", "l");
        if ($radios.is(':checked') === false) {
            $radios.filter('[value=' + selected_selected_option + ']').prop('checked', true);
            showImage(selected_selected_option, "options", "r");
        }
    });
});


// Image in shop web and audio
function UrlExists(url)
{
    if (url) {
        var req = new XMLHttpRequest();
        req.open('GET', url, false);
        req.send();
        return req.status === 200;
    } else {
        return false;
    }
}
function updateImages(module, name, side) {
    var id = document.querySelector('input[name="' + name + '"]:checked').value;
    showImage(id, module, side);
}
function showImage(id, module, side)
{
    var image = "www/gallery/img/jiho_audio/" + module + "_" + side + "_" + id + ".jpg";
    if (UrlExists(image)) {
        document.getElementById(side + "_side").src = image;
    } else {
        document.getElementById(side + "_side").src = side + ".jpg";
    }
}
