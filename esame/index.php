<?php
    session_start();
   // require_once 'php/google/vendor/autoload.php';

    if(isset($_SESSION["access_token"])){

        include("homePage.php");

    }else{
    
        include("php/gOauthConf.php");
    /*// init configuration
    $clientID = '1056870111114-6326c1iijmjgm1md7jtifg4mtrquunlc.apps.googleusercontent.com';
    $clientSecret = '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';
    $redirectUri = 'http://matteodaaddato.altervista.org/Exam_test1/esame/index.php';

    // create Client Request to access Google API
    $client = new Google_Client();
    $client->setClientId($clientID);
    $client->setClientSecret($clientSecret);
    $client->setRedirectUri($redirectUri);
    $client->addScope("email");
    $client->addScope("profile");*/
    $login_button="";


    if(isset($_GET["code"])){

        $token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);
        
        $client->setAccessToken($token['access_token']);
  
        $_SESSION["access_token"] = $token["access_token"];
        
        $gauth = new Google_Service_Oauth2($client);
        
        $google_info =  $gauth->userinfo->get();

        if(!empty($google_info["given_name"])){
  
            $_SESSION["user_first_name"] = $google_info["given_name"];
   
         }
   
         if(!empty($google_info["family_name"])){
   
            $_SESSION["user_last_name"] = $google_info["family_name"];
   
         }
   
         if(!empty($google_info["email"])){
   
            $_SESSION["user_email"] = $google_info["email"];
   
         }

         include("homePage.php");

        }else{

            $login_button = "<a href='".$client->createAuthUrl()."'> Sign in with Google!";
            
            include("html/loginPage.php");

        }

    }     
 //-------------------------------------------------------------------------------------------------------   
    /*if(isset($_GET["code"])){

      $token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);
      
      $client->setAccessToken($token['access_token']);

      $_SESSION["access_token"] = $token["access_token"];
      
      $gauth = new Google_Service_Oauth2($client);
      
      $google_info =  $gauth->userinfo->get();
      }
      if(!empty($google_info["given_name"])){

         $_SESSION["user_first_name"] = $google_info["given_name"];

      }

      if(!empty($google_info["family_name"])){

         $_SESSION["user_last_name"] = $google_info["family_name"];

      }

      if(!empty($google_info["email"])){

         $_SESSION["user_email"] = $google_info["email"];

      }*/


//------------------------------------------------------------------------------------------------------------------------
     
     
?>


