$(document).ready(function () {
    $(".selected_option_R").on("change", function () {
        var clicked_id = $(this).attr('tmfid');
        var clickedidd = $(this).attr('id');

        $.ajax
                ({
                    type: "POST",
                    url: "www_extended/default/shop/holidays.php",
                    data: {
                        date: clicked_id,
                        calltype: 'holidays',
                        dir: 'right'
                    },
                    cache: false,
                    success: function (response2) {
                        var newres2 = JSON.parse(response2);
                        var disabled_ids = JSON.stringify(newres2[0]['disabled_ids']);
                        //alert(disabled_ids);

                        $('.selected_option_R').each(function () {
                            //alert($(this).val());
                            if (disabled_ids.indexOf($(this).val()) !== -1) {
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
                                //	alert("not exist"+$(this).val());
                            }
                        });
                    }
                });
    });
});