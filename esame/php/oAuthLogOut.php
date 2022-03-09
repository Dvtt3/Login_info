<?php

    session_start();

    include("gOauthConf.php");

    $client->revokeToken();

    unset($_SESSION['access_token']);

    session_destroy();

    header("location:../index.php");

?>