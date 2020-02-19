/**
 * Global variables
 */
var tarotSpreads = new Array(); // Array to hold tarot spreads, their names, layouts, etc.
var tarotCards = new Array(); // Array to hold tarot cards, their names, image URLs, etc.

//Attach event handlers
$(document).on("change", "#tarotSpreadSelect", function () {
    // Once a tarot spread has been selected, display the appropriate card layout for user to fill in
    var selected = $(this).find("option:selected").data("index");
    console.log("Spread index " + selected + " selected");
    initSpreadLayout(selected);
});

$(document).on("change", ".tarot-card-select", function () {
    console.log($(this).find("option:selected"));
    var selected = $(this).find("option:selected").data("index");
    var image_url = tarotCards[selected]["image_url"];
    console.log(image_url);
    // Update the image and info of this card
    $(this).parent().find("img.tarot-card-image").attr("src", image_url);
    $(this).parent().parent().find(".card-title").append(": " + tarotCards[selected]["name"]);
    $(this).css("display", "none");
    $(this).parent().parent().find("button.change-tarot-btn").css("display", "block");
});

$(document).on("click", ".reverse-card-btn", function () {
    var cardImage = $(this).parent().parent().find("img.tarot-card-image");
    $(cardImage).css("transform", function () {
        // Rotate card accordingly
        return $(cardImage).attr("style") == "transform: rotate(180deg);" ? "rotate(0deg)" : "rotate(180deg)";
    });
});

$(function () {
    /**
     * Populate necessary fields on index page
     */
    // populateIndexFields();
    $.ajax({
        "method": "GET",
        "dataType": "json",
        "url": "ajax/get-tarot-info.php",
        success: function (response) {
            console.log(response);
            // TO-DO: If there was an error, do something about it lmao
            if (response["status"] != 0) {

            }
            // Otherwise, populate fields using the returned data, and update global vars too
            else {
                populateIndexFields(response["data"]);
                tarotSpreads = response["data"]["spreads"];
                tarotCards = response["data"]["cards"];
            }
        }
    });
});

function populateIndexFields(data) {
    // Populate the tarot spread selection dropdown using our list of saved tarot spreads

    $.each(data["spreads"], function (index, value) {
        var spreadID = value["value"];
        var spreadName = value["name"];
        $("#tarotSpreadSelect").append("<option data-index='" + index + "' value='" + spreadID + "'>" + spreadName + "</option>");
    });

    // Populate tarot card select dropdown
    $.each(data["cards"], function (index, value) {
        var cardID = value["value"];
        var cardName = value["name"];
        $(".tarot-card-select").append("<option data-index='" + index + "' value='" + cardID + "'>" + cardName + "</option>");
    });
};

function initSpreadLayout(index) {
    // Set up the correct number of blank cards for this spread
    var spread = tarotSpreads[index];
    console.log(tarotSpreads[index]);
    var spreadLayout = spread["layout"].split(";");
    for (var i = 0; i < spread["number_of_cards"]; i++) {
        var newCard = $("#blankCard").clone().removeAttr("id");
        $(newCard).find("select.tarot-card-select").attr("name", "tarot-card-" + i + "-select");
        $(newCard).find(".card-title").text(spreadLayout[i]);
        $("#blankSpread").append(newCard);
    }
    $("#blankSpread").css("display", "flex");
}