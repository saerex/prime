<?php 
	function __autoload($class_name) 
	{
	include('scripts/'.$class_name.'.php');	
	include('bd.php');
	include('appvar.php');
	}
	$page = new Page();
	if(isset($_GET['id']))
	{
		$id=(int)$_GET['id'];
		if($id != 0) 
		{
				$text = $page -> get_one($id);	
				echo $page -> get_body($text, 'catalog2');
		}
		else exit('Wrong parameter');
	}
    //Поиск по авторам
    elseif(isset($_GET['author']))
    {
       $author=$_GET['author'];
		if($author != NULL) 
		{
		  
				$text = $page -> get_author($author);	
				echo $page -> get_body($text, 'catalog1');
        
		}
		else exit('Wrong parameter'); 
    }
    //Поиск по жанрам
    elseif(isset($_GET['genre']))
    {
       $genre=$_GET['genre'];
		if($genre != NULL) 
		{
				$text = $page -> get_genre($genre);	
				echo $page -> get_body($text, 'catalog1');
		}
		else exit('Wrong parameter'); 
    }
	else {
		$result = $page	-> get_all();
		echo $page -> get_body($result,'catalog1');
		
	}
	?>