$(document).ready(function () {
    document.getElementById("name").addEventListener("keyup", autoCompleteNew);

    function autoCompleteNew(e) {
        var value = $(this).val();
        $("#slug").val(value.replace(/\s/g, "-").toLowerCase());
    }

    $("#slug").prop("disabled", true);
});
