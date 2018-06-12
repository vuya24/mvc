<?php

header('Content-Type: application/json');
echo json_encode($view_data->circle_data, JSON_PRETTY_PRINT);

?>