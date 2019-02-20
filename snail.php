<?php
$start=microtime(true);
$n=10; $m=20;
$size_Y=$n;
$size_X=$m;
$maxNumber = $size_X * $size_Y;
//edit [x][y]coordinates when changing direction
$edit_Y = 0; $edit_X = 0;
$currentValue = 1;
//1 interaction = 1 full perimeter filling
 while( $size_Y/2 > 0 ){
    if ($currentValue==($maxNumber+1)){break;}
     // у=0...3 - direction of movement (right, bottom, left, top)
    for ( $y = 0; $y < 4; $y++ ){
        //From 0 to max of M or N to avoid gaps in the array
        for ($x = 0; $x < ( ( $size_X < $size_Y ) ? $size_Y : $size_X ); $x++ ) {
            // Y=0 Right
            if ($y == 0 && $x < $size_X - $edit_X && $currentValue <= $maxNumber) {
                $array[$y + $edit_Y][$x + $edit_X] = $currentValue;
                $currentValue++;
            }
            //if x=0 then replicate last position
            //size-edit=number of items in a row/column
            if ($x!=0&&$currentValue<=$maxNumber){
                // Y=1 Down
                if ($y == 1 && $x < $size_Y - $edit_Y  ) {
                    $array[$x + $edit_Y][$size_X - 1] = $currentValue;
                    $currentValue++;
                }
                // Y=2 Left
                if ($y == 2 && $x < $size_X - $edit_X  ) {
                    $array[$size_Y - 1][$size_X - ($x + 1)] = $currentValue;
                    $currentValue++;
                }
                // Y=3 Up
                if ($y == 3 && $x < $size_Y - ($edit_Y + 1)  ) {
                    $array[$size_Y - ($x + 1)][$edit_Y] = $currentValue;
                    $currentValue++;
                }
            }
        }
  }
    $size_Y--;
    $size_X--;
    $edit_Y += 1;
    $edit_X += 1;
}
echo"<table border='3' bgcolor=\"#F0E68C\" cellpadding='10' cellspacing='10' bordercolor='#800000'align='center' >";
for($i=0;$i<$n;$i++) {
    echo "<tr>";
    for ($j = 0; $j < $m; $j++) {
        echo "<td align='center'>";
        echo $array[$i][$j]."  ";
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";
$finish=microtime(true);
echo "Time: ".(int)(($finish-$start)*1000);