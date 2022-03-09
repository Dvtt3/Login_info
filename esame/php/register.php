<?php

header("Content-Type: application/json");

// togliere il commento sottostante se sul browser non è abilitata la policy di CORS (chrome deve aver installata l'estensione al seguente link https://chrome.google.com/webstore/detail/allow-cors-access-control/lhobafahddgcelffkeicbaginigeejlf/related)

/*header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization");
header("Access-Control-Allow-Methods", "GET, POST, PATCH, PUT, DELETE, OPTIONS");*/

include ("config.php");

if($_SERVER["REQUEST_METHOD"] == "PUT"){

    header("Access-Control-Allow-Methods: PUT");
    $data = json_decode(file_get_contents("php://input"), true);

    if($data!=null){

        $name = $data["name"];
        $surName = $data["surName"];
        $email = $data["email"];
        $phoneNumber = $data["phoneNumber"];
        $psw = hash('sha1', $data["psw"]);
        $confPsw = hash('sha1', $data["confPsw"]);

    }else{

      $name = $_PUT["name"];
      $surName = $_PUT["surName"];
      $email = $_PUT["email"];
      $phoneNumber = $_PUT["phoneNumber"];
      $psw =  hash('sha1', $_PUT["psw"]);
      $confPsw =  hash('sha1', $_PUT["confPsw"]);

    }

    if(empty($name) || empty($surName) || empty($email) || empty($phoneNumber)|| empty($psw)|| empty($confPsw)){
        response("Error sending data", false, "Empty values");
    }

    if(checkUserExist($conn, $email, $phoneNumber)){

        $sql = "INSERT INTO Users ( Nome, Cognome, Email, Telefono, Password) VALUES ('".$name."','".$surName."','".$email."','".$phoneNumber."','".$confPsw."')";

        $results = $conn->query($sql);

        response("User created successfully", true, "");
    

    }else{

        response("User already exist", false, "");

    }

}


function checkUserExist($conn, $email, $phoneNumber){
        
        $sql = "SELECT * FROM users";

        $results = $conn->query($sql);
        if($results->num_rows>0){

            while($row = $results->fetch_assoc()){

                if($row["Email"] == $email){
                    return false;
                }else if($row["Telefono"] == $phone){
                    return false;
                }

            }

            return true;

    }else{

        return true;

    }
}

function response($message, $status, $response){
    echo json_encode(array("message" => $message, "status" => $status, "response" => $response));
    exit();
}


/*$pswd = hash('sha1', $_POST["password"]);
$pswdConfirm = hash('sha1', $_POST["repPassword"]);

if($pswd == $pswdConfirm){

        if(isset($_POST['name'])){

            $name =  $_POST["name"];
            $surname = $_POST["surName"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            

        $sql = "SELECT * FROM users";

        $results = $conn->query($sql);

        $exist = false;

        if($results->num_rows>0){

                while($row = $results->fetch_assoc()){

                    if($row["Email"] == $email){

                        echo("email already associated to another account");
                        $exist = true;
                        break;
                    }else if($row["Telefono"] == $phone){

                        echo("phone number already associated to another account");
                        break;
                        $exist = true;
                    }

                }

                if( $exist == false){

                    $sql = "INSERT INTO users ( Nome, Cognome, Email, Telefono, Password) VALUES ('".$name."','".$surname."','".$email."','".$phone."','".$pswd."')";

                    $results = $conn->query($sql);
                }



        }else{

                $sql = "INSERT INTO users ( Nome, Cognome, Email, Telefono, Password) VALUES ('".$name."','".$surname."','".$email."','".$phone."','".$pswd."')";

                $results = $conn->query($sql);

                if($results == TRUE){

                    echo("User succesfully added!");

                }else{

                    echo "error: ". $sql. $conn->error;

                }

        }


        }
    
    }else{

        file_get_contents("../homePage.php");

    }

*/
?>