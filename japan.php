<?php

$height = 150;
$width = 240;

$Sx = $width/2;
$Sy = $height/2;

$r = $height/4;

echo "<table celspacing='0' cellpadding='0' style='border:1px solid black;border-collapse:collapse'><tbody>";

for($y = 0;$y<$height;$y++){
    echo"<tr>";
    for($x = 0;$x<$width;$x++){
        $a = $Sx - $x;
        $b = $Sy - $y;
        $c = sqrt(($a*$a)+($b*$b));

        if($c < $r){
            $color = "red";
        
        }else{
            $color = "white";
        }
        echo"<td style='width:1px;height:1px;background-color:$color'></td>";
    }
    echo"</tr>";
}
echo"</tbody></table>";

?>