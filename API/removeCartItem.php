<?php
    include '../../service/db_con.php';
	include '../../core.php';
    header('Content-Type', 'application/json');
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    $user = $_SESSION['user_id'];
    if(!$user){
        header('Location: login.php');
    }
    if($data -> recipe_id){
        $recipe_id = $data->recipe_id;
        $sql = "DELETE 
        from cartitem
        where `user_id` = '$user' AND `recipe_id` = '$data->recipe_id'";

        if($con->query($sql) === TRUE){
            echo json_encode(array('message' => 'Item Deleted'));
        }else{
            header('Status: 404 Not Found');
            echo json_encode(array('message' => 'Item Not Deleted'));
        }
    }else{
        header('Status: 400 Bad request');
        echo json_encode(array('message' => 'Bad request'));
    }
?>