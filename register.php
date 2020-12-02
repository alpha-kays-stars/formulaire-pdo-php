<?php
require ('config.php');
session_start();


if (isset($_POST['username']) & isset($_POST['password'])){
    try {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sth = $conn->prepare("INSERT INTO `user`(`username`, `password`) VALUES (:username, :password)");
        $sth->bindParam(':username', $username);
        $sth->bindParam(':password', $password);
        $sth->execute();
        header('location: login.php');
    }catch (PDOException $e){
        print "Erreur !: " . $e->getMessage() . "<br/>";
    }
}else{
    echo "";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <form action="" method ="POST">
        <a>Username</a>
        <input type="text" placeolder="Username" name="username"></input>
        <a>Password</a>
        <input type="password" placeolder="Password" name="password"></input>
        <button type="submit" >S'inscrire</button>
    </form>
</body>
</html>