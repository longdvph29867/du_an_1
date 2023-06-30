$(document).ready(function (){
    $("#check-all").click(function (){
        $(":checkbox").prop("checked", true);
    });
    $("#clear-all").click(function (){
        $(":checkbox").prop("checked", false);
    });
    $("#btn-delete").click(function (){
        if($(":checked").length === 0){
            alert("Vui lòng chọn ít nhất một mục!");
            return false;
        }
    });
});

$(window).scroll(function() {
    if ($(this).scrollTop() > 200) {
        $('#back-to-top').addClass('!block');
    } else {
        $('#back-to-top').removeClass('!block');
    }
});

$('#back-to-top').click(function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, 'slow');
});
