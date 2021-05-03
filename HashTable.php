<?php
$names=array("marry"=>19,"john"=>15,"joe"=>25);
print_r($names);
echo "<br>";
$names["joe"]=28; 
unset($names["joe"]);
print_r(array_keys($names));
echo "<br>";
print_r(array_values($names));


?>