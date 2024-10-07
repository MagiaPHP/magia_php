$(document).ready(function () {
    $(".selected_option_R").on("change", function () {
        var clicked_id = $(this).attr('tmfid');
        var clickedidd = $(this).attr('id');
        var clickedvalue = $(this).attr('value');

        $.ajax
                ({
                    type: "POST",
                    url: "www_extended/default/shop/op3.php",
                    data: {
                        selected_id: clicked_id,
                        calltype: 'options_disabled',
                        dir: 'right'
                    },
                    cache: false,
                    success: function (response2) {
                        var newres2 = JSON.parse(response2);
                        var disabled_ids = JSON.stringify(newres2[0]['disabled_ids']);
                        //alert(disabled_ids);
                        var newval = JSON.parse(disabled_ids);
                        //alert(newval);
                        $('.selected_option_R').each(function () {
                            //alert(parseInt($(this).val()));
                            if (newval.indexOf($(this).val()) !== -1) {
                                //if ($.inArray(parseInt($(this).val()), JSON.parse(disabled_ids) ) > 0) {
                                //if ($.inArray( $(this).val(),disabled_ids)) {
                                //if (contains.call(disabled_ids, $(this).val())) {
                                //	alert("exist"+$(this).val());
                                var clickedvv = $(this).val();
                                if ($("#" + clickedidd).is(':checked'))
                                {
                                    var splitid = clickedidd.split("_");
                                    //alert(splitid[3]);
                                    if (parseInt($(this).val()) !== parseInt(splitid[3]))
                                    {
                                        //	alert("here");
                                        //			alert($(this).val());
                                        $(this).prop('disabled', true);
                                        $(this).prop('checked', false);
                                        $(this).closest("label").css("background-color", "#ffe6e6");
                                    }


                                } else
                                {
                                    $("#option_id_R_" + clickedvv).prop('disabled', false);
                                    $(this).closest("label").css("background-color", "white");
                                }

                            } else
                            {
                                //	alert("not exist"+$(this).val());
                            }
                        });
                        if ($("#option_id_R_" + clickedvalue).is(':checked')) {
                            if ($("#option_id_L_" + clickedvalue).is(':disabled')) {

                            } else
                            {
                                $("#option_id_L_" + clickedvalue).prop('checked', true);
                                $('.selected_option_L').each(function () {
                                    //alert($(this).val());
                                    if (newval.indexOf($(this).val()) !== -1) {
                                        //if (contains.call(disabled_ids, $(this).val())) {
                                        //	alert("exist"+$(this).val());
                                        var clickedvv = $(this).val();
                                        if ($("#" + clickedidd).is(':checked'))
                                        {
                                            var splitid = clickedidd.split("_");
                                            //alert(splitid[3]);
                                            if ($(this).val() != splitid[3])
                                            {
                                                //	alert("here");
                                                //			alert($(this).val());
                                                $(this).prop('disabled', true);
                                                $(this).prop('checked', false);
                                                $(this).closest("label").css("background-color", "#ffe6e6");
                                            }


                                        } else
                                        {
                                            $("#option_id_L_" + clickedvv).prop('disabled', false);
                                            $(this).closest("label").css("background-color", "white");
                                        }

                                    } else
                                    {

                                    }
                                });
                            }




                        }
                    }
                });


    });
    $(".selected_option_L").on("change", function () {
        var clicked_id = $(this).attr('tmfid');
        var clickedidd = $(this).attr('id');
        var clickedvalue = $(this).attr('value');


        $.ajax
                ({
                    type: "POST",
                    url: "www_extended/default/shop/op3.php",
                    data: {
                        selected_id: clicked_id,
                        calltype: 'options_disabled',
                        dir: 'left'
                    },
                    cache: false,
                    success: function (response2) {
                        var newres2 = JSON.parse(response2);
                        var disabled_ids = JSON.stringify(newres2[0]['disabled_ids']);
                        //alert(disabled_ids);
                        var newval = JSON.parse(disabled_ids);
                        $('.selected_option_L').each(function () {
                            //alert($(this).val());
                            if (newval.indexOf($(this).val()) !== -1) {
                                //if (contains.call(disabled_ids, $(this).val())) {
                                //	alert("exist"+$(this).val());
                                var clickedvv = $(this).val();
                                if ($("#" + clickedidd).is(':checked'))
                                {
                                    //$(this).prop('disabled', true);
                                    //$(this).prop('checked', false);
                                    //alert(clickedidd);
                                    //alert(clickedvv);
                                    //alert($(this).val());
                                    var splitid = clickedidd.split("_");
                                    //alert(splitid[3]);
                                    if ($(this).val() != splitid[3])
                                    {
                                        //	alert("here");
                                        //			alert($(this).val());
                                        $(this).prop('disabled', true);
                                        $(this).prop('checked', false);
                                        $(this).closest("label").css("background-color", "#ffe6e6");
                                    }


                                } else
                                {
                                    $("#option_id_L_" + clickedvv).prop('disabled', false);
                                    $(this).closest("label").css("background-color", "white");

                                }

                            } else
                            {
                                //	alert("not exist"+$(this).val());
                            }
                        });

                        if ($("#option_id_L_" + clickedvalue).is(':checked')) {
                            if ($("#option_id_R_" + clickedvalue).is(':disabled')) {

                            } else
                            {
                                $("#option_id_R_" + clickedvalue).prop('checked', true);
                                $('.selected_option_R').each(function () {
                                    //alert($(this).val());
                                    if (newval.indexOf($(this).val()) !== -1) {
                                        //if (contains.call(disabled_ids, $(this).val())) {
                                        //	alert("exist"+$(this).val());
                                        var clickedvv = $(this).val();
                                        if ($("#" + clickedidd).is(':checked'))
                                        {
                                            var splitid = clickedidd.split("_");
                                            //alert(splitid[3]);
                                            if ($(this).val() != splitid[3])
                                            {
                                                //	alert("here");
                                                //			alert($(this).val());
                                                $(this).prop('disabled', true);
                                                $(this).prop('checked', false);
                                                $(this).closest("label").css("background-color", "#ffe6e6");
                                            }


                                        } else
                                        {
                                            $("#option_id_R_" + clickedvv).prop('disabled', false);
                                            $(this).closest("label").css("background-color", "white");
                                        }

                                    } else
                                    {
                                    }
                                });
                            }



                        }

                    }
                });


    });


});
