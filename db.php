<?php

class db
{

  //mysql object goes here
  public $mysql;


  //saves mysql object
  function __construct($val)
  {
    $this->mysql = $val;
  }

  public function add_product($sku, $name, $price, $type_name, $type_params)
  {
    // $mysql->query('INSERT INTO products (sku, product_name, product_price, product_type_name) VALUES ("'.$sku.'", "'.$sku.'", "20.50", "DVD")')
    $this->mysql->query('INSERT INTO products (sku, product_name, product_price, product_type_name) VALUES ("'.$sku.'", "'.$name.'", '.$price.', "'.$type_name.'")');
    $id = $this->mysql->insert_id;
    // $mysql->query('INSERT INTO products (sku, product_name, product_price, product_type_name) VALUES ("'.$sku.'", "'.$name.'", '.$price.', "'.$type_name.'")');

    print_r($id);

    switch ( $type_name ) {
        case "type_dvd":
            echo "type_dvd";

            $this->mysql->query('INSERT INTO '.$type_name.' (product_id, size) VALUES ('.$id.', '.$type_params["size"].')');

            break;

        case "type_book":

            echo "type_book";
            $this->mysql->query('INSERT INTO '.$type_name.' (product_id, weigth) VALUES ('.$id.', '.$type_params["weigth"].')');

            break;

        case "type_furniture":

            echo "type_furniture";
            print_r($type_params);
            $query = 'INSERT INTO '.$type_name.' (product_id, height, width, length) VALUES ('.$id.', '.$type_params["height"].', '.$type_params["width"].', '.$type_params["length"].')';
            echo $query;
            $this->mysql->query($query);

            break;
    }//end of switch
  }//end of add_product

// NOTE: need to be changed if vorks
  public function add_product_json($sku, $name, $price, $type_name, $type_params)
  {
    $this->mysql->query('INSERT INTO products (sku, product_name, product_price, product_type_name) VALUES ("'.$sku.'", "'.$name.'", '.$price.', "'.$type_name.'")');
    $id = $this->mysql->insert_id;
    echo $id;
    $temp = "INSERT INTO product_type (product_id, product_type_data) VALUES (".$id.", '".$type_params."')";
    echo $temp;
    $this->mysql->query($temp);
  }


  public function get_product()
  {
    return $this->mysql->query('SELECT * FROM products')->fetch_all();
  }

  }

//}


 ?>
