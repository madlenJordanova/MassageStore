<?php
$procedure = "";

switch ($favcolor) {
    case "tBody":
        $procedureChoise = $tbody;
        break;
    case "massage":
        echo "Your favorite color is blue!";
        break;
    case "frisure":
        echo "Your favorite color is green!";
        break;
    default:
        echo "Your favorite color is neither red, blue, or green!";
}
?>