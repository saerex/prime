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
    <div class = "photo">
  <ul>
    <li class = "show"><img src = "<?php echo "$base"?>/images/photo1.jpg"   alt = "pic1" /></li>
    <li><img src = "<?php echo "$base"?>/images/photo2.jpg"   alt = "pic2" /></li>
    <li><img src = "<?php echo "$base"?>/images/photo3.jpg"   alt = "pic3" /></li>
  </ul>
   </div>
   <div class = "main">
   <div class = "left">
   <hr />
   <p>Топ продаж</p>
   </div>
   <div class = "right">
   <hr />
   <p>Последние новинки</p>
   </div>
   </div>
 
</div>
</body>
</html>