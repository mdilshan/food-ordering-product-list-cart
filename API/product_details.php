<?php 
    include '../../service/db_con.php';

    $recipe_id = strval($_REQUEST['id']);

    $sqlQuery = "SELECT * 
        FROM layersinrecipe
        INNER JOIN layer 
        ON layer.layer_id = layersinrecipe.layer_id
        where layersinrecipe.recipe_id = ".$recipe_id."";
    $result = $con->query($sqlQuery);
    $data = array();
    while($row = $result->fetch_assoc()){
        $data[] = $row;      
    }
    echo json_encode($data);
?>