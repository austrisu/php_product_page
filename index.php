<?php
//In the root of your project, create a .htaccess file that will redirect all requests to index.php.
require './router.php';
require './db.php';

$app = new router();

//connects to mysql server
//need to be replaced accordingly to your DB configuration
$mysql = new mysqli("localhost", "root", "", "test_final");

//selects encoding
$mysql->set_charset("utf8");

//initiates db handler
$db =new db($mysql);

//send db object to router object
$app->__set("db", $db);

//resolves request
$app -> resolve($GLOBALS);

//-----------------------------------------------------
// ROOT GET route
//-----------------------------------------------------
$app -> get("/", function ($req, $db)
{

          //returning page to display and data to display
          return ['views/home.php', "empty"];
});

//--------------------------------------------------------------
// ROOT POST route
//-------------------------------------------------------------
$app -> get("/add", function ($req, $db)
{

          return ['views/add.php', "empty"];

});
