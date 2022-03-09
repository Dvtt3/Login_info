<?php

    require_once 'google/vendor/autoload.php';

    // init configuration
    $clientID = '1056870111114-6326c1iijmjgm1md7jtifg4mtrquunlc.apps.googleusercontent.com';
    $clientSecret = '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';
    $redirectUri = 'http://matteodaaddato.altervista.org/Exam_test1/esame/index.php';

    // create Client Request to access Google API
    $client = new Google_Client();
    $client->setClientId($clientID);
    $client->setClientSecret($clientSecret);
    $client->setRedirectUri($redirectUri);
    $client->addScope("email");
    $client->addScope("profile");

?>