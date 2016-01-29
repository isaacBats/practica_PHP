<?php 

require_once 'vendor/autoload.php';

$user = new \PlatziPHP\Author('fake.email@foo.com', '1234');
$user->setName('isaac', 'batista');

//Esto esta mal ...
//$user->$firstName;

//Lo correctp
echo $user->getFirstName();
echo $user->getLastName();
echo PHP_EOL;




//var_dump($user);