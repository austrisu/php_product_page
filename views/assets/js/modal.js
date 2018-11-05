//gets modal elemnt
let modal = document.getElementById( 'modal' );


// get the span to close modal
var span = document.getElementsByClassName( "close" )[ 0 ];

// click o span X closes modal
span.onclick = function () {
       modal.style.display = "none";
}

// when click outside of modal closes modal
window.onclick = function ( event ) {
       if ( event.target == modal ) {
              modal.style.display = "none";
       }
}

//displays modal
let displayModal = () => {
       modal.style.display = "block";
}