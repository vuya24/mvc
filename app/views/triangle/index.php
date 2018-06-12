<?php

header('Content-Type: application/json');
echo json_encode($view_data->triangle_data, JSON_PRETTY_PRINT);

?>