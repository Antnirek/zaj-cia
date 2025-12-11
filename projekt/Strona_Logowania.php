<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sowa</title>
</head>
    <style>
        body {
            background: #f0f0f0;
            font-family: Tahoma, Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        main {
            width: 320px;
            margin: 100px auto;
            background: white;
            padding: 30px;
            border: 2px solid #003366;
            border-radius: 12px;
            box-shadow: 5px 5px 15px #aaaaaa;
        }
        p[name="p1"], p[name="p2"] {
            margin: 0;
            padding: 0;
            font-weight: bold;
            color: #003366;
            font-size: 18px;
            margin-bottom: 5px;
            text-align: center;
        }
        input[name="login"], input[name="pass"] {
            width: 100%;
            height: 36px;
            padding: 0 10px;
            font-size: 16px;
            border: 2px solid #003366;
            border-radius: 6px;
            box-sizing: border-box;
            margin-bottom: 15px;
        }
        button {
            width: 48%;
            height: 40px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 6px;
            margin-top: 10px;
        }
        button[name="logIN"] {
            background: #003366;
            color: white;
        }
        button[name="singIN"] {
            background: #0066cc;
            color: white;
        }
        button:hover {
            opacity: 0.8;
        }
        .info {
            margin-top: 15px;
            padding: 10px;
            background: #ffffcc;
            border: 1px solid #cccc00;
            border-radius: 5px;
            font-size: 14px;
            color: #333;
        }
    </style>
<body>
    <main>
        <form method='post'>
            <p name="p1">Login</p><br>
            <input name="login"><br>
            <p name="p2">Hasło</p><br>
            <input type="password" name="pass"><br> 
            <button type="submit" name="logIN">Zaloguj</button>
            <button type="submit" name="singIN">Zarejestruj</button>
        </form>

        <?php
        $conn = mysqli_connect("localhost","root","","sowa");

        if(isset($_POST['logIN'])){
            if(empty($_POST['login']) || empty($_POST['pass'])){
                echo "Musisz podać dane!";
            }
            else{
                $login = $_POST['login'];
                $pass = $_POST['pass'];

                $q = "SELECT * FROM users WHERE login = '$login' AND haslo = '$pass'";
                $result = mysqli_query($conn, $q);

                if(mysqli_num_rows($result) == 1){
                    $_SESSION['login'] = $login;
                    header("Location: Strona_Glowna.php");
                    exit();
                }
                else{
                    echo "Błędny login lub hasło!";
                }
            }
        }

        if(isset($_POST['singIN'])){
            if(empty($_POST['login']) || empty($_POST['pass'])){
                echo "Musisz podać dane!";
            }
            else{
                $login = $_POST['login'];
                $pass = $_POST['pass'];

                $q = "SELECT login FROM users WHERE login = '$login'";
                $result = mysqli_query($conn, $q);

                if(mysqli_num_rows($result) > 0){
                    echo "Taki użytkownik już istnieje!";
                }
                else{
                    $q1 = "INSERT INTO users (login, haslo) VALUES ('$login', '$pass')";
                    if(mysqli_query($conn, $q1)){
                        echo "Zostałeś zarejestrowany!";
                        $_SESSION['login'] = $login;
                        header("Location: Strona_Glowna.php");
                        exit();
                    }
                    else{
                        echo "Błąd rejestracji!";
                    }
                }
            }
        }
        ?>
    </main>
</body>
</html> 