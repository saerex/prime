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
    
    
    <div>
    <p><?= $categoria?></p>
    <p><?= $firma?></p>
    <p><?= $telefons['description'] ?></p> 
    <p><?= $telefons['date'] ?></p>
        
    </div>
  
    
    </div>
    </div>
  
 
</div>
</body>
</html>