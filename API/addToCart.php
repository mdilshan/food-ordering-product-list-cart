<?php
    include '../../service/db_con.php';
	include '../../core.php';
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    $user = $_SESSION['user_id'];
    header('Content-Type', 'application/json');
    //check if the recipe is already available 
    if(isset($data->recipe_id)){
        $sqlQuery = "INSERT INTO `cartitem`
            ( `user_id`, `recipe_id`, `qty`)
            VALUES
            ('$user','$data->recipe_id','$data->orderQty')
        ";

        if($con->query($sqlQuery) === TRUE){
            echo json_encode(array('message' => 'Item Added'));
        }else{
            echo json_encode(array('message' => 'Failed to'.$con->error.' insert'));
        }
    }else{//if recipe is not available create a new recipe and then add to cart
        //add this to the recipe table
        $date =  date("Y-m-d h:i:sa");
        $burgerName = 'Custom Burger by user '.$user.'';

        $sqlQuery2 = "INSERT into `recipe`
        (`created_by`, `price`, `image`, `name`)
        VALUES
        ('$user','$data->price', '/images/bugers/chicken_burger.png', '$burgerName')";
        
        if($con->query($sqlQuery2) === TRUE){
            $newRecipeId = "SELECT `recipe_id`
            FROM `recipe`
            ORDER BY `created_on` DESC LIMIT 1";
            
            $result = $con->query($newRecipeId);
            
            $column = $result->fetch_assoc();
            $recipeId = $column['recipe_id'];
            $layers = $data->layers;

            for($i = 0; $i<count($layers); $i++){
                $layer = $data->layers[$i];
                $StringID = $layer->layer_id;
                $layerID = (int)$StringID;   
                $sql = "INSERT INTO `layersinrecipe`
                (`recipe_id`,`layer_id`, `qty`)
                VALUES
                ('$recipeId','$layerID','1')";
                $con->query($sql);
            }
            if($con->error){
                echo json_encode(array('message' => 'Cannot add to layerinrecipe'.$con->error.' '));
            }
            //add newly created recipe to the cart
            $sqlQuery = "INSERT INTO `cartitem`
            ( `user_id`, `recipe_id`, `qty`)
            VALUES
            ('$user','$recipeId','$data->orderQty')";

            if($con->query($sqlQuery) === TRUE){
                http_response_code(200);
                echo json_encode(array('message' => 'Item Added'));
            }else{
                http_response_code(500);
                echo json_encode(array('message' => 'Failed to'.$con->error.' insert'));
            }

        }else{
            http_response_code(500);
            echo json_encode(array('message' => 'Failed to insert. ERROR'.$con->error.''));
        }
    }
    $con->close();
?>