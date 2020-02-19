<?php
include "../inc/connection.php";
$tarotSpreadsQuery = "SELECT * FROM tarot_spreads ORDER BY name ASC";
$tarotCardsQuery = "SELECT * FROM tarot_cards";
$tarotSpreadsArray = array();
$tarotCardsArray = array();
// Query our saved tarot spreads
if ($result = mysqli_query($connection, $tarotSpreadsQuery)) {
    /* fetch object array */
    while ($spread = $result->fetch_object()) {
        $spreadVal = strtolower(implode("-", explode(" ", $spread->name)));
        $tarotSpreadsArray[] = array(
            "id" => $spread->ID, "name" => $spread->name, "value" => $spreadVal,
            "number_of_cards" => $spread->number_of_cards, "layout" => $spread->layout
        );
    }
    // Then query our saved tarot cards
    if ($result = mysqli_query($connection, $tarotCardsQuery)) {
        while ($card = $result->fetch_object()) {
            $cardVal = strtolower(implode("-", explode(" ", $card->name)));
            $tarotCardsArray[] = array(
                "id" => $card->ID, "name" => $card->name, "value" => $cardVal,
                "image_url" => $card->image_url, "thumbnail" => $card->thumbnail
            );
        }
        // If both queries were successful, return a response
        echo json_encode(array(
            "status" => 0, "message" => "Successfully queried database!",
            "data" => array("spreads" => $tarotSpreadsArray, "cards" => $tarotCardsArray)
        ));
    }
} else {
    echo json_encode(array("status" => mysqli_errno($connection), "message" => mysqli_error($connection)));
}
