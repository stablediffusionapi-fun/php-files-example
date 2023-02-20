<?php

    $json = file_get_contents('php://input');

    $fileName = "image.json";
    file_put_contents($fileName, $json);

?>
