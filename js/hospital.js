
    $(function () {
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#txtPassportNumber").attr("disabled", "disabled");
            } else {
                $("#txtPassportNumber").removeAttr("disabled");
                $("#txtPassportNumber").focus();
            }
        });
    });


    $(document).ready(function () {
        $("#myInput").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
                                    