<?php
//In the root of your project, create a .htaccess file that will redirect all requests to index.php.
require './router.php';
require './db.php';

$app = new router();

//connects to mysql server
//need to be replaced accordingly to your DB configuration
$mysql = new mysqli("localhost", "root", "", "store");

//check DB connection
if ($mysql->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

//selects encoding
$mysql->set_charset("utf8");

//initiates db handler
$db =new db($mysql);

//send db object to router object
$app->__set("db", $db);

//resolves request
$app -> resolve($GLOBALS);

//-----------------------------------------------------
// ROOT GET route, displays home page
//-----------------------------------------------------
$app -> get("/", function ($req, $db)
{

          //gets all of the products
          $products = $db->get_products();

          //returning page to display and data to display
          return ['views/home.php', $products];
});

//--------------------------------------------------------------
// ADD POST route, displays add page
//-------------------------------------------------------------
$app -> get("/add", function ($req, $db)
{
          //returns add page
          return ['views/add.php', "empty"];

});

//--------------------------------------------------------------
// ADD post route, adds new product
//-------------------------------------------------------------
$app -> post("/add", function ($req, $db)
{

          $type_data = [];

          $keys = array_keys($req["_POST"]);

          //separates type dependent data, prints out only size, weigth or dimensions
          for($i=4; $i < count($keys); ++$i) {
              $key = $keys[$i];
              $type_data[$key] = $req["_POST"][$key];
          }

          //ads product and implodes type data, if more than one item it is separated by "x"
          $db->add_product($req["_POST"]["sku"], $req["_POST"]["name"],$req["_POST"]["price"], $req["_POST"]["product-type"], implode(" X ", $type_data));

          //gets all prducts so that they can be displayed
          $products = $db->get_products();


          return ['views/home.php', $products];

});

//--------------------------------------------------------------
// DELETE post route, removes selected items
//-------------------------------------------------------------
$app -> post("/delete", function ($req, $db)
{

            $id = [];

            $keys = array_keys($req["_POST"]);

            //removes key values from array making it non-asociative array
            for($i=0; $i < count($keys); ++$i) {
                $key = $keys[$i];
                $id[$i] = $req["_POST"][$key];
            }

          //deletes products by passed ids
          $db->delete_product($id);

          //gets all prducts so that they can be displayed
          $products = $db->get_products();

          return ['views/home.php', $products];

});
