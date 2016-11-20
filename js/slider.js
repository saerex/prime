$('.slider').each(function(){              // для любого div c class = 'slider'
    var $this   = $(this);                 // Текущий slider
    var $group  = $this.find('.slide-group'); // Получаем текущую slider-group(container)
    var $slides = $this.find('.slide');    // Создаем объект JQuery для всех div с class = 'slide'
    var buttonArray  = [];                 // Создаем массив для кнопок навигации между slide
    var currentIndex = 0;                  // Содержит текущий номер слайда
    var timeout;                           // Переменная таймера ,время между слайдами
      
      
      
      
    function move(newIndex) {                       //Передвигает слайд,создает новый
    var animateLeft,slideLeft;
    
    advance();                                      // когда двигается слайд - вызов функции advance()
    if($group.is(':animated') || currentIndex === newIndex) {  // если это текущий слайд,то ничего не делать
        return;
    }
    buttonArray[currentIndex].removeClass('active'); // Удаляем класс active с прошлого слайда
    buttonArray[newIndex].addClass('active');        // добавляем класс active к текущему слайду
    
    if(newIndex > currentIndex) {                    // если новый слайд > текущего
        slideLeft = '100%';                          // новый слайд ставится справа
        animateLeft = '-100%';                       // текущий слайд fadeout влево
    } else {
        slideLeft = '-100%';                         // и наоборот
        animateLeft = '100%';
    }
    $slides.eq(newIndex).css( {left:slideLeft, display: 'block'} );
    $group.animate( {left:animateLeft}, function() {
        $slides.eq(currentIndex).css( {display: 'none'} );  // прячет предыдущий слайд
        $slides.eq(newIndex).css( {left: 0} );
        $group.css( {left: 0} );
        currentIndex = newIndex;
    });
}


function advance() {                             // Функция используется для:
    clearTimeout(timeout);                       // очистки предыдущего timeout
    timeout = setTimeout(function(){            // запустить новый таймер
        if(currentIndex < ($slides.length - 1)) { // Если текущий слайд < общего кол-ва слайдов,то
            move(currentIndex + 1);             // Перейти к следующему слайду
        } else {
            move(0);                            // или перейти к первому слайду
        }
    }, 4000);                                   // 4 сек до следуюещго слайда
}    


    //Создание кнопки для каждого слайда
    $.each($slides, function(index){
    //Создание элемента button как кнопки
    var $button = $('<button type = "button" class = "slide-btn">&bull;</button>');
    if(index === currentIndex) {  // Если индекс равен текущему элементу
        $button.addClass('active'); // то добавляем класс "active" к ней
    }
    $button.on('click', function(){ // создаем слушатель событий для кнопки
        move(index);                // и вызываем функцию move() при клике
    }).appendTo('.slide-buttons');  // добавляет кнопку в ХТМЛ
    buttonArray.push($button);      // добавляет кнопку в массив buttonArray
  });

  advance();
  
});
