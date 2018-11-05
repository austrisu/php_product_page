let submit = () => {

       //data picker elemnt
       let dataPicker = document.querySelector( ".data-picker select" )

       let form = document.querySelector( "#product-form" )

       //if selected new product redirected to /add
       if ( dataPicker.value == "Add new product" ) {
              window.location.replace( "/add" );

              //Deletes marked products
       } else if ( dataPicker.value == "Mass delete" ) {

              let checkbox = document.querySelectorAll( "input[type=checkbox]:checked" )

              // if nothing selected cant delate anithing
              if ( checkbox.length <= 0 ) {

                     //prints error mesages from array
                     error( [ "Pleae select something to delete!" ] )

              } else {

                     //if elements is selected submit form
                     form.submit();
              }
       }
}


//prints message using modal
let error = ( msg ) => {

       //gets error msg element in modal
       let errorMsg = document.querySelector( ".error-msg" )

       //saves error string
       let temp;

       //iterates trougth array of errors if any
       for ( m of msg ) {
              temp = `${temp} <div>${m}</div>`;
       }

       errorMsg.innerHTML = temp;

       displayModal();
}