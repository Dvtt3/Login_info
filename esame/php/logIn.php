<?php

 session_start();
 include ("config.php");
 header("Content-Type: application/json");
    //---------------------------------------------------------

    if($_SERVER["REQUEST_METHOD"] == "GET"){

        header("Access-Control-Allow-Methods: GET");
        $data = json_decode(file_get_contents("php://input"), true);
    
        if($data!=null){
    
            $email = $data["email"];
            $psw = hash('sha1', $data["psw"]);
    
        }else{

          $email = $_GET["email"];
          $psw =  hash('sha1', $_GET["psw"]);
    
        }

        if(empty($email) || empty($psw)){
            response("Error sending data", false, "Empty values");
        }

        if( checkCredentials($conn, $email, $psw)){

            //include("../homePage.php");

            response("seccesfully logged in", true, "");
        }else{

            response("Wrong email or password", false, "");

        }

    }

    function response($message, $status, $response){
        echo json_encode(array("message" => $message, "status" => $status, "response" => $response));
        exit();
    }

    function checkCredentials($conn, $email, $psw){

        $sql = "SELECT * FROM Users";

        $results = $conn->query($sql);

        while($row = $results->fetch_assoc()){

            if($row["Email"] == $email){

                if($row["Password"] == $psw){

                    $_SESSION["user_first_name"] = $row["Nome"];

                    $_SESSION["user_email"] = $row["Email"];

                    return true;

                }
            }

        }

        return false;

    }

   /*if(isset($_POST['email'])){

        $email = $_POST["email"];
        $pswd = hash('sha1', $_POST["password"]);


        $sql = "SELECT * FROM users";

        $results = $conn->query($sql);

        $exist = false;

        while($row = $results->fetch_assoc()){

            if($row["Email"] == $email){

                if($row["Password"] == $pswd){

                    $exist= true;
                    break;

                }
            }
            
        }

        if( $exist == true){

            echo("logged succesfully: ".$email);

        }else{

            echo("wrong email or password");

        }
    }*/

?>
