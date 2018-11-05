//creats type form after page load
window.onload = () => {
       displayForm();
}

//dinamicaly generated type dependant inputs
displayForm = () => {

       //gets tyepe svitch value to determine what to display
       let typeSwitch = document.querySelector( ".type-switch select" ).value;

       //gets the field where to put dynamicaly generated forms
       let typeForm = document.querySelector( ".type-form" );


       let typeFormDescription = document.querySelector( ".type-form-description" );

       //generates input form depending on product type selected
       switch ( typeSwitch ) {
              case "type_dvd":
                     typeForm.innerHTML = inputForm( "size" );

                     //prints filling information
                     typeFormDescription.innerHTML = "Note: Please insert numeric size of DVD in MB."

                     break;
              case "type_book":
                     typeForm.innerHTML = inputForm( "weigth" );

                     //prints filling information
                     typeFormDescription.innerHTML = "Note: Please insert numeric weigth of Book in kG."
                     break;
              case "type_furniture":
                     typeForm.innerHTML = inputForm( "height" ) + inputForm( "width" ) + inputForm( "length" );

                     //prints filling information
                     typeFormDescription.innerHTML = "Note: Please insert numeric size of furniture dimensions in format HxWxL."
                     break;
              default:
                     console.log( "smthing went wrong" );
       }
}


//return string of input
let inputForm = ( name ) => {
       return `
  <div>
        <label for="${name}">${name.charAt(0).toUpperCase() + name.slice(1)}</label>
        <input id="${name}" type="text" name="${name}">
  </div>
  `
}


let save = () => {

       //get form to submit it later
       let form = document.querySelector( "#add-form" )

       //gets all input fields for validation
       let inputFileds = document.querySelectorAll( "input" );
       let valid = validate( inputFileds )

       //checks if form can be submitted
       if ( valid.submit ) {
              //submits form
              form.submit();

       } else {

              //prints error message
              error( valid.msg );

       }

}

//redirects back from add page
let back = () => {
       window.location.replace( "/" );
}

//checks if data entered in form is valid
let validate = ( inputs ) => {

       //here goes error mesages
       let msg = [];

       //here goes true or false values
       let valid = [];

       //regex expression to check for special chars in inputs
       let regex = `/[~!@#$%^&*()_|+\-=?;:'"<>\{\}\[\]\\\/]/g`

       //loops trougth all inputs
       for ( input of inputs ) {

              //checks if input is empty
              if ( input.value == "" ) {

                     //adds message to print
                     msg.push( `Field '${input.name}' can't be empty` );
                     valid.push( false )

                     //checks if input contains special chars
              } else if ( input.value.match( regex ) ) {

                     //adds message to print
                     msg.push( `
       Field '${input.name}'
       can 't contain special characters` );
                     valid.push( false )

                     //if all forms filled correctly pushes true in valid array
              } else {
                     valid.push( true )
              }
       }

       //searches in array of valid fields and if it contains false returns false
       return {
              submit: !valid.includes( false ),
              msg: msg
       };

}

//prints message using modal
let error = ( msg ) => {
       let errorMsg = document.querySelector( ".error-msg" )

       //saves error string
       let temp = "";

       //iterates trougth array of errors if any
       for ( m of msg ) {
              temp = `${temp} <div>${m}</div>`;
       }

       errorMsg.innerHTML = temp;

       displayModal();
}