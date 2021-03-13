
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
