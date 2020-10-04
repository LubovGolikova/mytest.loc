
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
let eventId = $('.add-like').attr('data-id');
/*

//Likes
let likesStorage = JSON.parse(localStorage.getItem('likes')) || [];
console.log(likesStorage)

if( likesStorage.indexOf( eventId ) >=0 ){
    $('.add-like').toggleClass('fa-heart-o fa-heart');
}
*/

$('.fa-heart-o').click(function(e){
        if( !$(this).hasClass('fa-heart')){
        $.ajax({
            method: 'POST',
            url: path+'event/'+eventId+'/addLike',
            success: function(data){
                $('.fa-heart-o').next('.like-count').text(data);
                $('.fa-heart-o').toggleClass('fa-heart-o fa-heart');
               // likesStorage.push(eventId);
               // localStorage.setItem('likes', JSON.stringify(likesStorage))
            }
        })
        }
});

