
<?php
    $conn = mysqli_connect("localhost","root", "", "biblioteka");
    $q = "SELECT * FROM ksiazki";
    $result = mysqli_query($conn, $q);

    echo "<table><tbody>";
    while($row = mysqli_fetch_row($result)){
        echo "<tr><td>".$row[1]."</td></tr>";
    }
    echo "</tbody></table>";

    mysqli_close($conn);
?>

    