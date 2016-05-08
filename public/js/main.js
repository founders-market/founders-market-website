$(function () {
  $('[data-toggle="tooltip"]').tooltip();
  var myElement = document.querySelector("header");
  var headroom  = new Headroom(myElement);
  headroom.init();
});


function getUrlParameters(){
	var parts = document.URL.split( '/' );
	return parts.splice( 3 );
}