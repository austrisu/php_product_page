<!DOCTYPE html>
<html lang="lv" dir="ltr">

<head>
     <meta charset="utf-16">

     <title>Test home page</title>

     <link rel="stylesheet" href="views/assets/css/general.css">
     <link rel="stylesheet" href="views/assets/css/navbar.css">
     <link rel="stylesheet" href="views/assets/css/button.css">
     <link rel="stylesheet" href="views/assets/css/add.css">
     <link rel="stylesheet" href="views/assets/css/modal.css">
     <link href="https://fonts.googleapis.com/css?family=Roboto:400,900" rel="stylesheet">

</head>

<body>

     <div class="container">

          <!-- **************** NAVBAR ********************* -->

          <nav>
               <!-- nav RIGTH -->
               <div class="left">
                    <h2>Product add</h2>
               </div>

               <!-- nav LEFT -->
               <div class="rigth">
                    <button id="submit" onclick="back()" class="button" type="button" name="apply"> Back </button>
                    <button id="submit" onclick="save()" class="button" type="button" name="apply"> Save </button>
               </div>
          </nav>

          <!-- ***************** ADD form part *******************  -->

          <form id="add-form" class="add-form" action="/add" method="post">

               <!--  NAME, SKU, PRICE fields  -->

               <div class="main-fields">
                    <div>
                         <label for="SKU">SKU</label>
                         <input id="sku" type="text" name="sku">
                    </div>

                    <div>
                         <label for="name">Name</label>
                         <input id="name" type="text" name="name">
                    </div>

                    <div>
                         <label for="price">Price</label>
                         <input id="price" type="text" name="price">
                    </div>
               </div>

               <!--  SELECTOR  -->

               <div class="type-switch">
                    <label for="switch">Type switch </label>
                    <select id="switch" onchange="displayForm()" form="add-form" name="product-type">
                            <option value="type_dvd">DVD-disc</option>
                            <option value="type_book">Book</option>
                            <option value="type_furniture">Furniture</option>
                    </select>
               </div>

               <!-- here goes type dependent fields  -->

               <div class="type-form-container">
                    <div class="type-form"></div>
                    <div class="type-form-description"></div>
               </div>

          </form>

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

     </div>
     <!-- end of container -->

     <script type="text/javascript" src="/views/assets/js/add.js"></script>
     <script type="text/javascript" src="/views/assets/js/modal.js"></script>

</body>

</html>