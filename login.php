<?php
    session_start();

    if(isset($_SESSION['login'])){
        if($_SESSION['login'] == true){
            header('Location: /dashboard.php');
            exit();
        }
    }
    
    $error = "";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if($_POST['username'] == 'admin' && $_POST['password']=='admin'){
            //sukses
            $_SESSION['login']=true;
            $_SESSION['username']='admin';
            header('Location: /dashboard.php');
            exit();
        }else{
            //gagal
            $error = "Id atau password anda salah!";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Database Kos</title>
        <link rel="stylesheet" href="style/stylelogin.css">
    </head>
    <body>
        <div class="container">
            <h1>Login</h1>
            <form action="/login.php" method="post">
                <label>Username :</label><br>
                <input type="text" name="username"><br>
                <label>Password :</label><br>
                <input type="password" name="password">
                <?php if($error != ""){?>
                    <p><?= $error ?></p>
                <?php } ?>
                <br>
                <button type="submit">Login</button>
            </form>
        </div>
    </body>
</html>