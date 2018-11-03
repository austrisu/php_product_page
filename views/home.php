<!DOCTYPE html>
<html lang="lv" dir="ltr">

<head>
     <meta charset="utf-16">

     <title>Test home page</title>

     <link rel="stylesheet" href="views/assets/css/general.css">
     <link rel="stylesheet" href="views/assets/css/navbar.css">
     <link rel="stylesheet" href="views/assets/css/button.css">
     <link rel="stylesheet" href="views/assets/css/products.css">
     <!-- <link rel="stylesheet" href="views/assets/css/input_style.css">
            <link rel="stylesheet" href="views/assets/css/button_style.css">
            <link rel="stylesheet" href="views/assets/css/select_style.css"> -->
     <link href="https://fonts.googleapis.com/css?family=Roboto:400,900" rel="stylesheet">

</head>

<body>

     <div class="container">

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


          <div class="products">


                    <?php
                              for ($i=0; $i < 100; $i++) {
                                echo <<<HTML
                                <div class="product-container">
                                    <input type="checkbox" name="checkbox" value="">
                                    <p>JCV 5668534</p>
                                    <p>Acme Disc</p>
                                    <p>100 $</p>
                                    <p>Size: 700 MB</p>
                                </div>
HTML;
                              }
                       ?>

          </div>

     </div>
     <!-- end of container -->

     <script type="text/javascript">
          let submit = () => {

               let dataPicker = document.querySelector(".data-picker select")

               //if selected new product redirected to /add
               if (dataPicker.value == "Add new product") {
                    window.location.replace("/add");

                    //Deletes marked products
               } else if (dataPicker.value == "Mass delete") {

                    let checkbox = document.querySelectorAll("input[type=checkbox]:checked")

                    // if nothing selected cant delate anithing
                    if (checkbox.length <= 0) {

                         //shows modal
                         console.log("need to select smthing");
                    } else {
                         //sends fetch request for delation vaits for aproval that data have been delated and returns success or error!!!
                         // NOTE: page should be reloaded
                         console.log("I vill delate selected");
                    }
               }

          }
     </script>

</body>

</html>
