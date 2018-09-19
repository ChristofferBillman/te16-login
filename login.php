<?php
session_start();
if(isset($_POST['submit'])) {
    
    $loginCredentials = [
        "username" => "jens",
        "pswd" => "secure"
    ];
    if(isset($_POST['username']) && $_POST['pswd']) {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $pswd = md5($_POST['pswd']);
        
        if($username == $loginCredentials['username'] && $pswd == md5($loginCredentials['pswd'])) {
            echo "<h1> Välkommen till den hemliga sidan </h1>";
        } elseif($username != $loginCredentials['username'] || $pswd != md5($loginCredentials['pswd'])) {
            echo "<h1> Du har angett felaktigt användarnamn eller lösenord"; 
        } else {
            echo "<h1> wtf nu har du skrivit nåt jävligt tokigt. </h1>";
        }
    }
    echo "<pre>" . print_r($_POST,1) . "</pre>";
} else {
    echo "<h1> Ogiltiga inloggningsinfo </h1>";
}
?>