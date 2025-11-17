<?php
    
    $pdo=new PDO("mysql:host=localhost;dbname=chatphp","root","");

    $messages=$pdo->query("select * from messages");
    $data=$messages->fetchAll();


    if(isset($_POST['submit'])){
        $message=$_POST['message'];
        $date = new DateTime();
        $formattedDate = $date->format("Y-m-d H:i:s");
        $pdo->query("INSERT INTO `messages`( `message`, `date`) VALUES ('$message','$formattedDate')");
    }

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $pdo->query("DELETE FROM messages where Id=$id");
    }

    $messages=$pdo->query("select * from messages");
    $data=$messages->fetchAll();

    include("layout.phtml");




?>