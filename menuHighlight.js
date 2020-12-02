$(document).ready(function(){

  $("div.nav").hover(
    function() {
      $(this).css("background-color", "#2debe4");
      $(this).css("color", "black");
    }, function() {
      $(this).css("background-color","black");
      $(this).css("color", "#2debe4");
    }
  );



});
