$(document).ready(function(){
 	$('.sidenav').sidenav();
 	$('.carousel').carousel();({});
});

// No jQuery
ClassicEditor
	.create( document.querySelector( '#editor' ) )
  	.catch( error => {
   	console.error( error );
});
