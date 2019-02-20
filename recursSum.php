<?php
function recursSum($start,$finish,$step){
    if($finish<$start){
        return 0;
    }
    if($finish%$step!=0){
        return recursSum($start,$finish-1,$step);
    }
    return $finish+recursSum($start,$finish-$step,$step);
}
echo "Сумма чисел от ".$starr." до ".$finish." кратных ".$step.recursSum(1,13,6);