$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

let eventId = $('.add-like').attr('data-id');


$('.fa-heart-o').click(function(e){
    if(!$(this).hasClass('fa-heart')) {
        $.ajax({
            method: 'POST',
            url: path+'event/'+ eventId+'/addLike',
            success: function(data){
                $('.fa-heart-o').next('.like-count').text(data);
                $('.fa-heart-o').toggleClass('fa-heart-o fa-heart');
            }
        })
    } else {
        $.ajax({
            method: 'DELETE',
            url: path+'event/'+ eventId+'/deleteLike',
            success: function(data){
                $('.fa-heart').next('.like-count').text(data);
                $('.fa-heart').toggleClass('fa-heart fa-heart-o');
            }
        })
    }

});

