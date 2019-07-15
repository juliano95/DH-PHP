<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Testando Funções</title>
</head>
<body>
<?php
$mystring = 'abc';
$findme   = 'a';
$pos = strpos($mystring, $findme);
echo $pos."<br>";
 
$email  = 'name@example.com';
$domain = strstr($email, '@');
echo $domain. "<br>"; // prints @example.com
$user = strstr($email, '@', true); // A partir do PHP 5.3.0
echo $user. "<br>"; // prints name

$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
$onlyconsonants = str_replace($vowels, "", "Hello World of PHP");
echo $onlyconsonants. "<br>";

$a[0] = 1;
$a[1] = 3;
$a[2] = 5;
$result = count($a);
echo $result. "<br>";

$var = 10
if (isset($var)) {
    echo "Essa variável existe.";
} else {echo variavael não encontrada}


?>


</body>
</html>