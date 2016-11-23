<?php 

class Database 
{ 
	private $db;
	public function __construct($host, $user, $pass, $basename)
	{
		$this -> db = mysql_connect($host,$user,$pass);
		if(!$this -> db) exit('No connection to database');
		if(!mysql_select_db($basename,$this -> db)) exit('No connection to table');
		return $this -> db;
	}
    //метод выбора всех записей
	public function get_all_db()
	{   
		$sql = "SELECT*FROM books";
		$query=mysql_query($sql);
		if(!$query) return FALSE;
		for($i = 0;$i < mysql_num_rows($query); $i++)
		{
			$row[]=mysql_fetch_array($query);
		}
		return $row;
	}
    
    //метод выбора жанра по отдельной книге
    public function get_one_genre($id_book)
    {
        $sql = "SELECT g.id_genre,g.genre FROM genre as g, book_genre as b WHERE g.id_genre = b.id_genre and b.id_book = '$id_book'";
        $query = mysql_query($sql) or die(mysql_error());
        if(!$query) return FALSE;
		$row=mysql_fetch_array($query);
        $genre = $row['genre'];
		return $genre;
    }
  
    //метод выбора автора по отдельной книге
    public function get_one_author($id_book)
    
   
    {
        $sql = "SELECT a.id_author,a.author FROM author as a, book_author as b WHERE a.id_author = b.id_author and b.id_book = '$id_book'";
        $query = mysql_query($sql) or die(mysql_error());
        if(!$query) return FALSE;
		
       
        	for($i = 0;$i < mysql_num_rows($query); $i++)
		{
			$authors[]=mysql_fetch_array($query);
		}
		
        
        return $authors;
        
		
    }
    
    //метод выбора  одной записи
	public function get_one_db($id)
	{
		$sql = "SELECT*FROM books WHERE id_book = '$id'";
		$query=mysql_query($sql);
		if(!$query) return FALSE;
		$row=mysql_fetch_array($query);
		return $row;
        
	}
    
	//метод для записи книги в бд
	public function insert_book($name,$descr,$target,$price)
	{
	   $sql = "INSERT INTO books(id_book,name,descr,doc,price,date)"
            . "VALUES(0,'$name','$descr','$target','$price',NOW())";
       $query = mysql_query($sql);
       if(!$query) return FALSE;
       $key = mysql_insert_id();
       return $key;
	}
    //метод записи id автора в таблицу author, если его еще не существует
    public function insert_author($author)
	{
	   $sql1 = "SELECT id_author FROM author WHERE author LIKE '%$author%'" ;
       $query1 = mysql_query($sql1);
       $result = mysql_fetch_array($query1);
       
       if(mysql_num_rows($query1)==0 ){
	   $sql2 = "INSERT INTO author(id_author,author)"
            . "VALUES(0,'$author')";
       $query2 = mysql_query($sql2);
       if(!$query2) return FALSE;
       $key = mysql_insert_id();
       }
       if($key == 0) return $result['id_author'];
 
       else return $key;
      
       
	}
    //метод записи id жанра в таблицу genre,если его еще не существует 
    public function insert_genre($genre)
	{
	   $sql1 = "SELECT id_genre FROM genre WHERE genre LIKE '%$genre%'" ;
       $query1 = mysql_query($sql1);
       $result = mysql_fetch_array($query1);
       
       if(mysql_num_rows($query1)==0 ){
	   $sql2 = "INSERT INTO genre(id_genre,genre)"
            . "VALUES(0,'$genre')";
       $query2 = mysql_query($sql2);
       if(!$query2) return FALSE;
       $key = mysql_insert_id();
       
       }
       if($key == 0) return $result['id_genre'];
 
       else return $key;
	}
    //метод записи id_книги и id_автора в таблицу book_author
    public function insert_book_author($id_book,$id_author)
	{
	   $sql = "INSERT INTO book_author(id,id_book,id_author)"
            . "VALUES(0,'$id_book','$id_author')";
       $query = mysql_query($sql);
       if(!$query) return FALSE;
       $key = mysql_insert_id();
       return $key;
	}
    //метод записи id_книги и id_жанра в  таблицу book_genre
   public function insert_book_genre($id_book,$id_genre)
	{
	   $sql = "INSERT INTO book_genre(id,id_book,id_genre)"
            . "VALUES(0,'$id_book','$id_genre')";
       $query = mysql_query($sql);
       if(!$query) return FALSE;
       $key = mysql_insert_id();
       return $key;
	}
    
    public function get_author($author)
    {
        $sql = "SELECT id_author FROM author WHERE author LIKE '%$author%' ";
        $query1 = mysql_query($sql);
        $result1 = mysql_fetch_array($query1);
        $id_author = $result1['id_author'];
        $sql2 = "SELECT id_book FROM book_author WHERE id_author = '$id_author' ";
        $query2 = mysql_query($sql2);
        
		while($id_book = mysql_fetch_array($query2)){
        
        $sql3 = "SELECT*FROM books WHERE id_book = '{$id_book['id_book']}'";
        $query3 = mysql_query($sql3);
        if(!$query3) return FALSE;
		for($i = 0;$i < mysql_num_rows($query3); $i++)
		{
			$authors[]=mysql_fetch_array($query3);
		}
		
        }
        return $authors;
    }
    public function get_genre($genre)
    {
        $sql = "SELECT id_genre FROM genre WHERE genre LIKE '%$genre%' ";
        $query1 = mysql_query($sql);
        $result1 = mysql_fetch_array($query1);
        $id_genre = $result1['id_genre'];
        $sql2 = "SELECT id_book FROM book_genre WHERE id_genre = '$id_genre' ";
        $query2 = mysql_query($sql2);
        
		while($id_book = mysql_fetch_array($query2)){
        
        $sql3 = "SELECT*FROM books WHERE id_book = '{$id_book['id_book']}'";
        $query3 = mysql_query($sql3);
        if(!$query3) return FALSE;
		for($i = 0;$i < mysql_num_rows($query3); $i++)
		{
			$genres[]=mysql_fetch_array($query3);
		}
		
        }
        return $genres;
    }
}
?>