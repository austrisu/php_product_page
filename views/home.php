<!DOCTYPE html>
<html lang="lv" dir="ltr">

<head>
     <meta charset="utf-16">

     <title>Test home page</title>

     <link rel="stylesheet" href="views/assets/css/general.css">
     <link rel="stylesheet" href="views/assets/css/navbar.css">
     <link rel="stylesheet" href="views/assets/css/button.css">
     <link rel="stylesheet" href="views/assets/css/products.css">
     <link rel="stylesheet" href="views/assets/css/modal.css">
     <link href="https://fonts.googleapis.com/css?family=Roboto:400,900" rel="stylesheet">

</head>

<body>

     <div class="container">

          <!-- **************** NAVBAR ********************* -->

          <nav>
               <div class="left">
                    <h2>Product list</h2>
               </div>

               <div class="rigth">
                    <div class="data-picker">
                         <select>
                                        <option value="Add new product">Add new product</option>
                                        <option value="Mass delete">Mass delete</option>
                          </select>
                    </div>
                    <button id="submit" onclick="submit()" class="button" type="submit"> Apply </button>
               </div>
          </nav>

          <!-- **************** Product display part ********************* -->
          <form id="product-form" action="/delete" method="post">
               <div class="products">


                    <?php
                              //adds aditional strings to amin data
                              function type_data($product)
                              {
                                switch ($product[4]) {
                                  case 'type_dvd':
                                    return "Size: ".$product[7]. " MB";
                                    break;

                                  case 'type_book':
                                      return "Weigth: ".$product[7]." kG";
                                    break;

                                  case 'type_furniture':
                                        return "Dimensions: ".$product[7]." cm";
                                    break;

                                  default:
                                    return "smthing wrong";
                                    break;
                                }
                              }

                              for ($i=0; $i < count($this->res); $i++) {
                              //prints product data in card
                                echo "
                                <div class='product-container'>
                                    <input type='checkbox' name='check".$this->res[$i][0]."' value=".$this->res[$i][0].">
                                    <p>".$this->res[$i][1]."</p>
                                    <p>".$this->res[$i][2]."</p>
                                    <p>".$this->res[$i][3]."</p>
                                    <p>".type_data($this->res[$i])."</p>
                                </div>";
                              }
                       ?>
               </div>
               <!-- end of products -->
          </form>
     </div>
     <!-- end of container -->

     <!-- MODAL -->
     <div id="modal" class="modal">

          <!-- Modal content -->
          <div class="modal-content">
               <span class="close">&times;</span>
               <h2>Error message</h2>
               <hr>
               <div class="error-msg"></div>
          </div>
     </div>

     <script type="text/javascript" src="/views/assets/js/home.js"></script>
     <script type="text/javascript" src="/views/assets/js/modal.js"></script>

</body>

</html>
