$(document).ready(function() {
    $('.x1').click(function(event) {
        event.preventDefault();
        $('#main').load('/bookshop/index.php/Index/signup1.html');
        //alert('Loaded!');
    });

    $('.x2').click(function(event) {
        event.preventDefault();
        $('#main').load("/bookshop/index.php/Index/signin");
        //alert('Loaded!');
    });

    $('.x3').click(function(event) {
        event.preventDefault();
        $('#main').load('/bookshop/index.php/Index/index #main');
        //alert('Loaded!');
    });

    $('.x4').click(function(event) {
        event.preventDefault();
        $('#main').load("/bookshop/index.php/Index/orderlist");
        //alert('Loaded!');
    });


});

