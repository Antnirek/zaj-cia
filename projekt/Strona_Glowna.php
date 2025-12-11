<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

if(!isset($_SESSION['posty'])) $_SESSION['posty'] = array();

if(isset($_POST['dodaj_post']) && !empty(trim($_POST['tresc']))) {
    $nowy = array(
        'login' => $_SESSION['login'],
        'tresc' => trim($_POST['tresc']),
        'data'  => date("d.m.Y H:i:s")
    );
    array_unshift($_SESSION['posty'], $nowy);
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sowa – Tablica</title>
    <style>
        * {margin:0; padding:0; box-sizing:border-box;}
        body {
            background:#e9ebec;
            font-family: Tahoma, Arial, sans-serif;
            min-height:100vh;
        }
        header {
            height:70px;
            background:#003366;
            position:fixed;
            top:0;
            left:0;
            width:100%;
            z-index:100;
            box-shadow:0 3px 10px rgba(0,0,0,0.3);
        }
        .logo {
            position:absolute;
            left:50%;
            top:50%;
            transform:translate(-50%,-50%);
            color:white;
            font-size:38px;
            font-weight:bold;
        }
        .menu {
            position:absolute;
            right:20px;
            top:50%;
            transform:translateY(-50%);
        }
        .menu select {
            padding:10px 14px;
            font-size:17px;
            background:#0066cc;
            color:white;
            border:none;
            border-radius:7px;
            cursor:pointer;
        }
        .nowy-post {
            background:white;
            padding:20px;
            margin:80px auto 20px auto;
            width:680px;
            border-radius:10px;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
            border:1px solid #ccc;
        }
        textarea {
            width:100%;
            height:90px;
            padding:12px;
            font-size:16px;
            border:2px solid #003366;
            border-radius:8px;
            resize:none;
            font-family:inherit;
        }
        input[type="submit"] {
            margin-top:12px;
            float:right;
            background:#003366;
            color:white;
            padding:10px 25px;
            border:none;
            border-radius:7px;
            font-size:16px;
            cursor:pointer;
        }
        input[type="submit"]:hover {background:#0055aa;}
        .wall {
            width:700px;
            margin:0 auto;
            padding-bottom:100px;
        }
        .post {
            background:white;
            padding:18px;
            margin:20px 0;
            border-radius:10px;
            box-shadow:0 2px 8px rgba(0,0,0,0.1);
            border:1px solid #ddd;
        }
        .post b {
            color:#003366;
            font-size:19px;
        }
        .post small {
            float:right;
            color:#888;
            font-size:13px;
        }
        .post p {
            margin-top:15px;
            font-size:16px;
            line-height:1.5;
            word-wrap:break-word;
        }
        .brak {
            text-align:center;
            padding:80px 20px;
            color:#777;
            font-size:20px;
        }
    </style>
</head>
<body>

<header>
    <div class="logo">Sowa</div>
    <div class="menu">
        <select onchange="location = this.value;">
            <option>Witaj <?php echo $_SESSION['login']; ?></option>
            <option value="komunikator.html">Komunikator</option>
            <option value="wyloguj.php">Wyloguj</option>
        </select>
    </div>
</header>

<div class="nowy-post">
    <form method="post">
        <textarea name="tresc" placeholder="Co słychać, <?php echo $_SESSION['login']; ?>?" required></textarea>
        <input type="submit" name="dodaj_post" value="Opublikuj">
    </form>
    <div style="clear:both;"></div>
</div>

<div class="wall">
    <?php
    if(empty($_SESSION['posty'])) {
        echo '<div class="brak">Brak postów – napisz pierwszy!</div>';
    } else {
        foreach($_SESSION['posty'] as $p) {
            echo '<div class="post">';
            echo '<b>'.htmlspecialchars($p['login']).'</b>';
            echo '<small>'.$p['data'].'</small>';
            echo '<p>'.nl2br(htmlspecialchars($p['tresc'])).'</p>';
            echo '</div>';
        }
    }
    ?>
</div>

</body>
</html>