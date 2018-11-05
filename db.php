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

          //adds one product
          public function add_product($sku, $name, $price, $type_name, $type_params)
        {

              // escapes SQL sreings
              $sku_valid = $this->mysql->real_escape_string($sku);
              $name_valid = $this->mysql->real_escape_string($name);
              $price_valid = $this->mysql->real_escape_string($price);
              $type_name_valid = $this->mysql->real_escape_string($type_name);
              $type_params_valid = $this->mysql->real_escape_string($type_params);

              $this->mysql->query('INSERT INTO products (sku, product_name, product_price, product_type_name) VALUES ("'.$sku_valid.'", "'.$name_valid.'", '.$price_valid.', "'.$type_name_valid.'")');

              //gets newly created product ID
              $id = $this->mysql->insert_id;

              $temp = "INSERT INTO product_type (product_id, product_type_data) VALUES (".$id.", '".$type_params."')";

              $this->mysql->query($temp);
        }

        //gets all products
        public function get_products()
        {

              $query = 'SELECT
                          *
                        FROM
                          products AS p
                        JOIN
                          product_type AS type
                            ON p.product_id = type.product_id;';

              return $this->mysql->query($query)->fetch_all();
        }

        //delates multiple rows depending on row
        public function delete_product($product_id)
        {

                $query = 'DELETE
                          	   products, product_type
                          FROM
            	                 products INNER JOIN product_type
                	                 ON products.product_id = product_type.product_id
                          WHERE
            	                 products.product_id in ('.implode(" , ", $product_id).');';

                $this->mysql->query($query);
        }

  }

 ?>
