$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

let eventId = $('.add-like').attr('data-id');
//Likes
let likesStorage = JSON.parse(localStorage.getItem('likes')) || [];
console.log(likesStorage)

if( likesStorage.indexOf( eventId ) >=0 ){
    $('.add-like').toggleClass('fa-heart-o fa-heart');
}

$('#containerId').click(function(e){

    let elem = $(e.target);

    if(elem.hasClass('fa-heart-o')){
        $.ajax({
            method: 'GET',
            url: '/verses/'+verseId+'/addLike',
            success: function(data){
                elem.next('.like-count').text(data);
                elem.toggleClass('fa-heart-o fa-heart');
                likesStorage.push(verseId);
                localStorage.setItem('likes', JSON.stringify(likesStorage))
            }
        })
    }
});

