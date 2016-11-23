function theRotator() {
	// Устанавливаем прозрачность всех картинок в 0
	$('div.photo ul li').css({opacity: 0.0});
 
	// Берем первую картинку и показываем ее (по пути включаем полную видимость)
	$('div.photo ul li:first').css({opacity: 1.0});
 
	// Вызываем функцию rotate для запуска слайдшоу, 5000 = смена картинок происходит раз в 5 секунд
	setInterval('rotate()',5000);
}
 
function rotate() {	
	// Берем первую картинку
	var current = ($('div.photo ul li.show')?  $('div.photo ul li.show') : $('div.photo ul li:first'));
 
	// Берем следующую картинку, когда дойдем до последней начинаем с начала
	var next = ((current.next().length) ? ((current.next().hasClass('show')) ? $('div.photo ul li:first') :current.next()) : $('div.photo ul li:first'));	
 
	// Расскомментируйте, чтобы показвать картинки в случайном порядке
	// var sibs = current.siblings();
	// var rndNum = Math.floor(Math.random() * sibs.length );
	// var next = $( sibs[ rndNum ] );
 
	// Подключаем эффект растворения/затухания для показа картинок, css-класс show имеет больший z-index
	next.css({opacity: 0.0})
	.addClass('show')
	.animate({opacity: 1.0}, 1000);
 
	// Прячем текущую картинку
	current.animate({opacity: 0.0}, 1000)
	.removeClass('show');
};

$(document).ready(function(){
    $('.navigation ul li a').mouseenter(function(){
    $(this).css("background-color","brown").css("border-radius","5px");    
      });
      $('.navigation ul li a').mouseleave(function(){
        $(this).css("background-color","black");
        });
        
         
         
         
          
         
         $('#samsung')
        .hover(function() {
            $('#samsung a img').stop().animate({width: "100px"},'fast');
            $('.menu_note').html("<h2>Samsung</h2>"); 
        }, function() {
            $('#samsung a img').stop().animate({width: "80px"},'fast');
            $('.menu_note').html("<h2></h2>");
        });
        
         $('#htc')
        .hover(function() {
            $('#htc a img').stop().animate({width: "100px"},'fast');
            $('.menu_note').html("<h2>HTC</h2>"); 
        }, function() {
            $('#htc a img').stop().animate({width: "80px"},'fast');
            $('.menu_note').html("<h2></h2>");
        });
         $('#lenovo')
        .hover(function() {
            $('#lenovo a img').stop().animate({width: "100px"},'fast');
            $('.menu_note').html("<h2>Lenovo</h2>"); 
        }, function() {
            $('#lenovo a img').stop().animate({width: "80px"},'fast');
            $('.menu_note').html("<h2></h2>");
        });
        
         $('#iphone')
        .hover(function() {
            $('#iphone a img').stop().animate({width: "100px"},'fast');
            $('.menu_note').html("<h2>IPhone</h2>"); 
        }, function() {
            $('#iphone a img').stop().animate({width: "80px"},'fast');
            $('.menu_note').html("<h2></h2>");
        });
        
        theRotator();
    });
    