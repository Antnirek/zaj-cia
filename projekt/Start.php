<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sowa</title>

</head>
<body>
    <main>
        <form method='post'>
            <p name="p1">Login</p><br>
            <input  name="login"><br>
            <p name="p2">Hasło<p><br>
            <input type="text" name="pass"><br>
            <button type="submit" name="logIN">Zaloguj</button>
            <button type="submit" name="singIN">Zarejestruj</button>
        <form>
        <?php
            $conn = mysqli_connect("localhost","root","","sowa");
            if(isset($_POST['logIN'])){
                if($_POST['login'] = 0 && $_POST['pass'] = 0){
                    echo"Muisz podać dane!";
                }
                else{
                    $login = $_POST['login'];
                    $pass = $_POST['pass'];
                    $q2 = "SELECT login FROM users WHERE login = '".$login."'";
                    $result2 = mysqli_query($conn,$q2);
                    $row1 = mysqli_fetch_row($result2);
                    if($row > 0 || $row<2){
                        $q3 = "SELECT haslo FROM users WHERE hoslo = '".$pass."'";
                        $result3 = mysqli_query($conn,$q3);
                        if($result3 = $pass){
                            session_start();
                            
                        }
                    }

                }
            }
            if(isset($_POST['singIN'])){
                if(empty($_POST['login']) == TRUE || empty($_POST['pass']) == TRUE){
                    echo"Muisz podać dane!";
                }
                else{
                    $login = $_POST['login'];
                    $pass = $_POST['pass'];
                    $q = "SELECT login FROM users WHERE login = '".$login."'";
                    $result = mysqli_query($conn,$q);
                    $row = mysqli_fetch_row($result);
                    if ($row > 0) {
                        echo"Taki użytkownik już istnieje!";
                    }
                    else{
                        $q1 = "INSERT INTO users (login, haslo) VALUES ('".$_POST['login']."', '".$_POST['pass']."');";
                        $result1 = mysqli_query($conn,$q1);
                        if($result1 === false){
                            die("Błąd SQL: " . mysqli_error($conn) . "<br>Zapytanie: " . htmlspecialchars($q));
                        }
                        else{
                            echo"<p name='ans'>'Zostałeś Zarejestrowany'</p>";
                            session_start();
                        }
                    }
                }
            }
        ?>
    </main>
    
</body>
</html>