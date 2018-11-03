<!DOCTYPE html>
<html lang="lv" dir="ltr">
  <head>
            <meta charset="utf-16">

            <title>Test home page</title>

            <link rel="stylesheet" href="views/assets/css/general.css">
            <link rel="stylesheet" href="views/assets/css/navbar.css">
            <link rel="stylesheet" href="views/assets/css/button.css">
            <link rel="stylesheet" href="views/assets/css/add.css">
            <link href="https://fonts.googleapis.com/css?family=Roboto:400,900" rel="stylesheet">

  </head>

  <body>

    <div class="container">

            <nav>
              <div class="left">
                      <h2>Product add</h2>
              </div>

              <div class="rigth">
                      <button id="submit" onclick="save()" class="button" type="button" name="apply"> Save </button>
              </div>
            </nav>


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

            <div class="type-switch">
              <label for="switch">Type switch </label>
              <select id="switch" onchange = "displayForm()">
                                          <option value="type_dvd">DVD-disc</option>
                                          <option value="type_book">Book</option>
                                          <option value="type_furniture">Furniture</option>
              </select>
            </div>

            <div class="type-form">

            </div>

    </div> <!-- end of container -->

    <script type="text/javascript">

          window.onload = () => {
            displayForm();
          }

          displayForm = () => {

                  //gets tyepe svitch value
                  let typeSwitch = document.querySelector(".type-switch select").value;

                  //gets the field where to put dynamicaly generated forms
                  let typeForm = document.querySelector(".type-form");

                  switch(typeSwitch) {
                case "type_dvd":
                    typeForm.innerHTML = inputForm("size");
                    break;
                case "type_book":
                    typeForm.innerHTML = inputForm("Weigth");
                    break;
                case "type_furniture":
                    typeForm.innerHTML = inputForm("height") + inputForm("Width") + inputForm("Length");
                    break;
                default:
                    console.log("smthing wrong");
                  }
          }

          let inputForm = (name)=>{
            return `
            <div>
                  <label for="${name}">${name.charAt(0).toUpperCase() + name.slice(1)}</label>
                  <input id="${name}" type="text" name="${name}">
            </div>
            `
          }

    </script>

    <script type="text/javascript" src="/views/assets/js/add.js"></script>

  </body>
</html>
