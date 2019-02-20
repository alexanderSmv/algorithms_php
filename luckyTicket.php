<?php
$start=microtime(true);
//for the first 3 digits
for($i=1,$count=0;$i<=999;$i++){
    $sum1=array_sum(str_split($i));
    //for the last 3 digits

    for($j=0;$j<=999;$j++){
        if($sum1==array_sum(str_split($j))){

            $count++;
        }
    }
}
echo 'Amount: '.$count." Time: ";
$finish=microtime(true);
echo (int)(($finish-$start)*1000);
