$(function () {
    /**
     * Populate necessary fields on index page
     */
    // populateIndexFields();
    $.ajax({
        "method": "GET",
        "dataType":"json",
        "url":"ajax/get-tarot-info.php",
        success:function(response) {
            console.log(response);
            // If there was an error, do something about it lmao
            if (response["status"] != 0) {

            }
            // Otherwise, populate fields using the returned data
            else {
                populateIndexFields(response["data"]);
            }
        }
    });
});

function populateIndexFields(data) {
    // Populate the tarot spread selection dropdown using our list of saved tarot spreads

    $.each(data, function(index, value) {
        var spreadID = value["value"];
        var spreadName = value["name"];
        $("#tarotSpreadSelect").append("<option value='" + spreadID + "'>"+spreadName+"</option>");
    });
}