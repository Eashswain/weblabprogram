<?php
header('content-type:text/plain');
$allstates="Mississipi Alabama Texas Masachsetts kansas";
$statesArray=[];
$states1=explode(' ',$allstates);
$i=0;
foreach($states1 as $state){
if(preg_match('/xas$/',$state)){
$statesArray[$i]=($state);
$i++;
print"\n The states that end with xas:".$state;
}
}
foreach($states1 as $state){
if(preg_match('/^k.*s$/i',$state)){
$statesArray[$i]=($state);
$i++;
print"\n The states that begin with k and ends with s:".$state;
}
}
foreach($states1 as $state){
if(preg_match('/^M.*s$/i',$state)){
$statesArray[$i]=($state);
$i++;
print"\n The states that begin with M and ends with s:".$state;
}
}
foreach($states1 as $state){
if(preg_match('/a$/',$state)){
$statesArray[$i]=($state);
$i++;
print"\n The states that end with a:".$state;
}
}
foreach($states1 as $element=>$value){
print("\n".$value."is the element".$element+1);
}
?>