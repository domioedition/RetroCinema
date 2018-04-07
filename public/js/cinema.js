var places = $( ".place" );
var ticketsList = $('ul.tickets_list');
var totalSum = 0;
var price = 140; // must be changed to another one

var postJson = {};
console.log(postJson);

var totalSumElement = $("#total-sum");
// console.log(ticketsList);
places.each(function( index ) {
    $( this ).on( "click", function() {
      $(".booking").css("visibility", "visible");
      if($( this ).hasClass("free")){
          $( this ).removeClass("free").addClass("booked");
          var li = $('<li/>')
          .addClass('ul-li-ticket')
          .attr('role', 'menuitem')
          .val($(this).text())
          .text("Place: "+$(this).text())
          .appendTo(ticketsList);
          totalSum += price;
          totalSumElement.text(totalSum);
        }else{
          // $( this ).removeClass("booked").addClass("booked");
        }
        console.log(totalSum);
      });      
  });


$("#reset").on("click", function(){
  location.reload();
});


$(document).ready(function() {
  $('#buy_tickets').on('submit', function (e) {
      e.preventDefault();
      var title = $('#title').val();
      var body = $('#body').val();
      var published_at = $('#published_at').val();
      $.ajax({
          type: "POST",
          url: host + '/articles/create',
          data: {title: title, body: body, published_at: published_at},
          success: function( msg ) {
              $("#ajaxResponse").append("<div>"+msg+"</div>");
          }
      });
  });
});