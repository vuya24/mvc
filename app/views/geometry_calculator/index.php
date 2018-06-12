<?php

header('Content-Type: application/json');
echo json_encode($view_data->circle_data, JSON_PRETTY_PRINT);
echo "\n\n";
echo json_encode($view_data->triangle_data, JSON_PRETTY_PRINT);
echo "\n\n";
echo json_encode($view_data->surface_data,JSON_PRETTY_PRINT);
echo "\n\n";
echo json_encode($view_data->circumference_data,JSON_PRETTY_PRINT);

?>