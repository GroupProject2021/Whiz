$(document).on("click", ".star", function() {
    var rating = $(this).data('rating');

    console.log(rating);
    $('#rate_amount').val(rating);

    reset_rating_btns();
    
    for(var count = 1; count <= rating; count++) {
        $('#star'+count).addClass('active');
    }
});

function reset_rating_btns() {
   for(var count = 1; count <= 5; count++) {
        $('#star'+count).removeClass('active');
   }
}