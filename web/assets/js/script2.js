$(document).ready(function(){


    $('.popup.fa-times').click(function(){
        $('wrap').remove();

    });

    $('.wrap').click(function(e){
        if(e.target.classList.contains('wrap'))
            $('.wrap').remove()
    });

    $('#btn-admin-chat').click(function () {
        $('.wrap').addClass("show");

    });
});