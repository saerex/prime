<!DOCTYPE html>
<html>
<head>

	<?php $this -> load -> view('header_view');?>
</head>

<body>
 <header>
  <h1>NewOne</h1>
 </header>
 <div>
 <?php $this -> load -> view('navigation_view'); ?>
    <div class = "menu">
		<ul>
         <li id = "samsung"><a href="" ><img src = "<?php echo "$base"?>/images/samsung_menu.png" /></a></li>
         <li id = "htc"><a href=""><img src = "<?php echo "$base"?>/images/htc_menu.png" /></a></li>
         <li id = "lenovo"><a href=""><img src = "<?php echo "$base"?>/images/lenovo_menu.png" /></a></li>
         <li id = "iphone"><a href=""><img src = "<?php echo "$base"?>/images/iphone_menu.png" /></a></li>
         
	    </ul>
	 
    </div>
     <div class = "menu_item">
		
         <p class = "menu_note"></p>
         
	 
    </div>
    <div class="catalog_table">
    <div class = "catalog_main">
    <?php
    foreach ($telefons as $telefon): ?>
    <div>
    <p><?= anchor("first/catalog_one/".$telefon['id_tovara'],$this -> catalog_model -> get_one_firma($telefon['id_tovara'])) ?></p>
    <p><?= anchor("first/search_firma/".$this -> catalog_model -> get_one_firma($telefon['id_tovara']),$this -> catalog_model -> get_one_firma($telefon['id_tovara'])) ?></p>
    <p><?= anchor("first/search_categoria/".$this -> catalog_model ->get_one_categoria($telefon['id_tovara']),$this -> catalog_model ->get_one_categoria($telefon['id_tovara'])) ?></p>
    <p><?= $telefon['description'] ?></p> 
    <p><?= $telefon['date'] ?></p>
    
    </div>
  
    <?php endforeach; ?>
    </div>
    </div>
  
 
</div>
</body>
</html>