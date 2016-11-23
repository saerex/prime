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
 <?php
 session_start();
      if(isset($_SESSION['id'])){?>
	<div class = "navigation">
		<ul>
         <li><a href = "">Главная</a></li>
         <li><a href = "<?php echo "$base"?>/index.php?c=first&m=catalog_all">Каталог</a></li>
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
         <li><a href = "">Главная</a></li>
         <li><a href = "<?php echo "$base"?>/index.php?c=first&m=catalog_all">Каталог</a></li>
         <li><a href = "">Добавить продукт</a></li>
		 <li><a href = "">Удалить продукт</a></li>
		 <li><a href = "">Удалить пользователя</a></li>	 
      </ul> 
    </div>
    <?php } 
    ?>
    <div>
    <fieldset>
    <?php 
    $formarr = array('id' => 'contactform'); 
    echo form_open_multipart('admin/insert',$formarr);
    echo "<table>";
    $data_model = array (
                        'name' => 'model',
                        'id'   => 'model',
                        'size' =>'40',
                        'placeholder' => 'Модель продукта',
                        'value' => set_value('model')
    
    );
    $attributes = array(
                       'class' => 'form_label',
     );
    echo form_label('Модель продукта', 'model',$attributes);
    echo form_input($data_model)."<br/>"."<br/>";
    $data_manufacturer = array (
                               'name' => 'manufacturer',
                               'id'   => 'manufacturer',
                               'size' =>'40',
                               'placeholder' => 'Фирма изготовитель',
                               'value' => set_value('manufacturer')

    );
    echo form_label('Фирма изготовитель', 'manufacturer',$attributes);
    echo form_input($data_manufacturer)."<br/>"."<br/>";
    $data_descr = array (
                               'name' => 'descr',
                               'id'   => 'descr',
                               'rows' => '7',
                               'cols' => '50',
                               'placeholder' => 'Описание',
                               'value' => set_value('descr')
    );
    echo form_label('Описание', 'descr',$attributes);
    echo form_textarea($data_descr)."<br/>"."<br/>";
    $data_features = array (
                               'name' => 'features',
                               'id'   => 'features',
                               'rows' => '7',
                               'cols' => '50',
                               'placeholder' => 'Характеристики',
                               'value' => set_value('features')
    );
    echo form_label('Характеристики', 'features',$attributes);
    echo form_textarea($data_features)."<br/>"."<br/>";
     $data_price = array (
                               'name' => 'price',
                               'id'   => 'price',
                               'size' =>'15',
                               'placeholder' => 'Цена',
                               'value' => set_value('price')

    );
    echo form_label('Цена', 'price',$attributes);
    echo form_input($data_price)."<br/>"."<br/>";
    $data_img = array (
                               'name' => 'img',
                               'id'   => 'img'
                               

    );
    
    echo form_upload($data_img)."<br/>"."<br/>";
    echo form_submit('submit', 'Добавить');
    echo form_close();
    echo "</table>";
    ?>
    </fieldset>
    </div>
    
 
</div>
</body>
</html>