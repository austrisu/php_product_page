let save = () => {

       // let sku = document.querySelector( "#sku" ).value;
       // let name = document.querySelector( "#name" ).value;
       // let price = document.querySelector( "#price" ).value;
       // let sw = document.querySelector( "#switch" ).value;

       //get form to submit it later
       let form = document.querySelector( "#add-form" )


       let inputFileds = document.querySelectorAll( "input" );
       console.log( inputFileds );
       if ( validate() ) {
              form.submit();
       } else {
              return false;
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
let validate = () => {

       // console.log( data );

       return true;

}