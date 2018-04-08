
var ticketsList = $('ul.tickets_list');
var totalSum = 0;
var price = 140; // must be changed to another one



var form = $("pay");

var totalSumElement = $("#total-sum");
$( ".place" ).each(function( index ) {
    $( this ).on( "click", function() {
      $(".booking").css("visibility", "visible");
      if($( this ).hasClass("free")){
          $( this ).removeClass("free").addClass("booked");
          var li = $('<li/>')
          .addClass('list-group-item')
          .addClass('ul-li-ticket')
          .attr('role', 'menuitem')
          .val($(this).text())
          .text("Place: "+$(this).text())
          .appendTo(ticketsList);
          totalSum += price;
          totalSumElement.text(totalSum);


          var input = $("<input type='text' value='' />")
                      .attr("id", $(this).text())
                      .attr("value", $(this).text())
                      .attr("name", $(this).text())
                      .css("visibility", "hidden")
                      .prependTo("form")
        }
      });

  });

$("#reset").on("click", function(){
  location.reload();
});
