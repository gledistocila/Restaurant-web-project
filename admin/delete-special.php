<?php
    //Start session
    session_start();
    
    //checking connection and connecting to a database
    require_once('connection/config.php');
    //Connect to mysql server
    $link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
    if(!$link) {
        die('Lidhja me serverin deshtoi: ' . mysql_error());
    }
    
    //Select database
    $db = mysql_select_db(DB_DATABASE);
    if(!$db) {
        die("E pamundur te zgjidhet databaza");
    }
 
     // check if the 'id' variable is set in URL
     if (isset($_GET['id']))
     {
         // get id value
         $id = $_GET['id'];
         
         // delete the entry
         $result = mysql_query("DELETE FROM specials WHERE special_id='$id'")
         or die("Pati nje problem duke fshire oferten ... \n" . mysql_error()); 
         
         // redirect back to the specials page
         header("Location: specials.php");
         }
     else
     // if id isn't set, redirect back to the specials page
     {
        header("Location: specials.php");
     }
 
?>