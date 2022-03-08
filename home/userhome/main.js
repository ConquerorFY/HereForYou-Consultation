// Animate Smooth Scroll
$('#view-info').on('click', function() {
    const images = $('#info').position().top;

    $('html, body').animate({
        scrollTop:images
    },
    900
    );
});