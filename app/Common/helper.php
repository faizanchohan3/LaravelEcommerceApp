<?php

use Carbon\Carbon;



function prx($arr)
{
    echo "<pre>";
    print_r($arr);
    die();
}


function chektokenexpiryminutes($time,$timediff=60){
$data=Carbon::parse($time->format('Y-m-d h:i:s a'));
$now=Carbon::now();
$diff=$data->diffInMinutes($now);
if($diff > $timediff){
    return true;
}
else{
    return false;
}

}

function generaterandomtoken($length=20){

   $ch='0123456789abcdefghijklmnopqrstuvwxyz';
   $len=strlen($ch);
   $random='';
   for($i=0;$i<$length;$i++){
$random.=$ch[random_int(0,$len-1)];
   }
   return $random;
}