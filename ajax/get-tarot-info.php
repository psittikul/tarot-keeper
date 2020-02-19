<?php
include "../inc/connection.php";
$tarotSpreadsQuery = "SELECT * FROM tarot_spreads ORDER BY name ASC";
$tarotCardsQuery = "SELECT * FROM tarot_cards";
$tarotSpreadsArray = array();
$tarotCardsArray = array();
if ($result = mysqli_query($connection, $tarotSpreadsQuery)) {
    /* fetch object array */
    while ($spread = $result->fetch_object()) {
        $spreadVal = strtolower(implode("-", explode(" ", $spread->name)));
        $tarotSpreadsArray[] = array("id" => $spread->ID, "name" => $spread->name, "value"=>$spreadVal);
    }
    echo json_encode(array("status" => 0, "message" => "Successfully queried database!", "data"=>$tarotSpreadsArray));
} else {
    echo json_encode(array("status" => mysqli_errno($connection), "message" => mysqli_error($connection)));
}
