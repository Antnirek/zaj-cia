<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    .a{
        background-color: black;
    }
    td{
        height: 50px;
        width: 50px;
    }
</style>
</head>
<body>
<?php

echo "<table><tbody>";

for($i = 0;$i<40;$i++){
    echo"<tr>";
    for($j = 0; $j<40;$j++){
        if(rand(0,1) == 1){
            echo"<td class='a'></td>";
        }
        else{
            echo"<td></td>";
        }
    }
    echo"</tr>";
}

echo "</tbody></table>";

?>

    
</body>
</html>

