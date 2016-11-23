<?php
 session_start();
      if(isset($_SESSION['id'])){?>
	<div class = "navigation">
		<ul>
         <li><a href = "<?php echo "$base"?>/index.php/first/index">Главная</a></li>
         <li><a href = "<?php echo "$base"?>/index.php/first/catalog_all">Каталог</a></li>
         <li><a href = "">Новости</a></li>
         <li><a href = "">Сделать заказ</a></li>
		 <li><a href = "">Просмотр заказов</a></li>
		 <li><a href = "">Выход(<?php echo $_SESSION['login'];?>)</a></li>
	    </ul>
	 
    </div>
	<?php } 
	 else { ?>
    <div class = "navigation">
       <ul>
         <li><a href = "<?php echo "$base"?>/index.php/first/index">Главная</a></li>
         <li><a href = "<?php echo "$base"?>/index.php/first/catalog_all">Каталог</a></li>
         <li><a href = "">Новости</a></li>
		 <li><a href = "">Регистрация</a></li>
		 <li><a href = "">Вход в приложение</a></li>	 
      </ul> 
    </div>
    <?php } ?>