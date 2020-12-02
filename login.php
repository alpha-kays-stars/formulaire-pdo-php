<?php
require ('config.php');
session_start();


if (isset($_POST['username']) & isset($_POST['password'])){
    try {
        $sth = $conn->prepare("SELECT * FROM user WHERE username=:username");
        $sth->bindParam(':username', $_POST['username']);
        $sth->execute();
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        $hash = $row['password'];
        if (password_verify($_POST['password'], $hash)){
            $_SESSION['id']   = $row['id'];
            $_SESSION['username'] = $row['username'];
            header('Location: index.php');
        }else{
            echo "Mauvais mot de passe our username.";
        }
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
    <title>Connexion</title>
</head>
<body>
    <form action="" method ="POST">
        <a>Username</a>
        <input type="text" placeolder="Username" name="username"></input>
        <a>Password</a>
        <input type="password" placeolder="Password" name="password"></input>
        <button type="submit" >Connexion</button>
    </form>
</body>
</html>