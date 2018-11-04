let save = () => {

       let sku = document.querySelector( "#sku" ).value;
       let name = document.querySelector( "#name" ).value;
       let price = document.querySelector( "#price" ).value;
       let sw = document.querySelector( "#switch" ).value;

       //get form to submit it later
       let form = document.querySelector( "#add-form" )

       send();

       if ( sw == "type_dvd" ) {

              let size = document.querySelector( "#size" ).value;

              let data = {
                     sku: sku,
                     name: name,
                     price: price,
                     size: size,
              }

              if ( validate( data ) ) {
                     form.submit()
              } else {
                     console.log( "prints to fill the form" );
              }


       } else if ( sw == "type_book" ) {

              let weigth = document.querySelector( "#weigth" ).value;

              let data = {
                     sku: sku,
                     name: name,
                     price: price,
                     weigth: weigth,
              }

              if ( validate( data ) ) {
                     form.submit()
              } else {
                     console.log( "prints to fill the form" );
              }


       } else if ( sw == "type_furniture" ) {

              let height = document.querySelector( "#height" ).value;
              let width = document.querySelector( "#width" ).value;
              let length = document.querySelector( "#length" ).value;

              data = {
                     sku: sku,
                     name: name,
                     price: price,
                     height: height,
                     width: width,
                     length: length,
              }

              if ( validate( data ) ) {
                     form.submit()
              } else {
                     console.log( "prints to fill the form" );
              }
       }
}

// let send = () => {
//
//        var url = 'add';
//        var data = {
//               username: 'example'
//        };
//
//        fetch( url, {
//               method: 'POST', // or 'PUT'
//               body: JSON.stringify( data ), // data can be `string` or {object}!
//               headers: {
//                      'Content-Type': '"text/plain"'
//               }
//        } ).then( res => {
//               console.log( res );
//               return res.body
//        } )
// }

let send = () => {

       // var url = 'add';
       // var data = {
       //        username: 'example'
       // };
       //
       // fetch( url, {
       //        method: 'POST', // or 'PUT'
       //        body: JSON.stringify( data ), // data can be `string` or {object}!
       //        headers: {
       //               'Content-Type': '"text/plain"'
       //        }
       // } ).then( res => {
       //        console.log( res );
       //        return res.text()
       // } ).then( txt => {
       //        console.log( txt );
       // } )
}

//checks if data entered in form is valid
let validate = ( data ) => {

       console.log( data );

       return false;

}