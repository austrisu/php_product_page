<?php
//In the root of your project, create a .htaccess file that will redirect all requests to index.php.
require './router.php';
require './db.php';

$app = new router();

//connects to mysql server
//need to be replaced accordingly to your DB configuration

// NOTE:
/* check connection */
// if ($mysqli->connect_errno) {
//     printf("Connect failed: %s\n", $mysqli->connect_error);
//     exit();
// }

$mysql = new mysqli("localhost", "root", "", "store");

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
// ADD POST route
//-------------------------------------------------------------
$app -> get("/add", function ($req, $db)
{

          return ['views/add.php', "empty"];

});

//--------------------------------------------------------------
// ADD post route
//-------------------------------------------------------------
// $app -> post("/add", function ($req, $db)
// {
//
//           //JSONify data for safe storing
//           // var_dump($req);
//
//           echo "11111111111111111111111111111111111111111111!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
//
//           // NOTE: $mysqli->error each time return if succesfuly saved data if no prints message on redirected page thet something went wrong
//           //saves data to DB
//           $db->add_product($req["_POST"]["sku"], $req["_POST"]["name"],$req["_POST"]["price"], $req["_POST"]["product-type"], $req["_POST"]);
//           // print_r($req);
//           return ['views/test.php', $req];
//
// });

$app -> post("/add", function ($req, $db)
{

          //JSONify data for safe storing
          // var_dump($req);

          // echo "11111111111111111111111111111111111111111111!!!!!!!!!!!!!!!!!!!!!!!!!!!!";

          $temp = [];

          // $array = array('key1' => 'value1', 'key2' => 'value2');

          // print_r($req);
          $keys = array_keys($req["_POST"]);
          // print_r($keys);
          // echo $keys[4];

          for($i=4; $i < count($keys); ++$i) {
            // $key = " '".$keys[$i]."' ";
              $key = $keys[$i];
              $temp[$key] = $req["_POST"][$key];
          }

          // print_r(json_encode($temp));

          $db->add_product_json($req["_POST"]["sku"], $req["_POST"]["name"],$req["_POST"]["price"], $req["_POST"]["product-type"], json_encode($temp));


          // NOTE: $mysqli->error each time return if succesfuly saved data if no prints message on redirected page thet something went wrong
          //saves data to DB
          // $db->add_product($req["_POST"]["sku"], $req["_POST"]["name"],$req["_POST"]["price"], $req["_POST"]["product-type"], $req["_POST"]);
          // $res = $db->get_product();
          // print_r($res);
          // echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!4567";
          // echo json_encode($res);

          // print_r($req);
          return ['views/test.php', $req];

});
