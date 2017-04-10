<?php
$password = 'anna';
$hash = password_hash($password, PASSWORD_DEFAULT);
$expensiveHash = password_hash($password, PASSWORD_DEFAULT, array('cost' => 11));

$a = password_verify('anna', $hash); //Returns true
$b = password_verify('anna', $expensiveHash); //Also returns true
$c = password_verify('elsa', $hash); //Returns false

echo " $a";
echo " $b";
echo " $c";
echo " $hash";
?>