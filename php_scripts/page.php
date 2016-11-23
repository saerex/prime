<?php
class Page
{
	public $text;
	public function get_all()
	{
		$db = new Database(HOST,USER,PASSWORD,NAME);
		$result = $db -> get_all_db();
		return $result;
	}
    
	public function get_one($id)
	{
		$db = new Database(HOST,USER,PASSWORD,NAME);
		$result = $db -> get_ones_db($id);
		return $result;
	}
    
	public function get_body($text,$file)
	{
		ob_start();
		include $file.'.php';
		return ob_get_clean();
		
	}
    
    public function get_genre($genre)
    {
        $db = new Database(HOST,USER,PASSWORD,NAME);
		$result = $db -> get_genre($genre);
		return $result;
    }
    
	public function insert_bd($name,$descr,$target,$author,$genre,$price)
    {
        $db = new Database(HOST,USER,PASSWORD,NAME);
        $result = $db -> insert_book($name,$descr,$target,$author,$genre,$price);
        return $result;
    }
    
    public function insert_author($author)
    {
        $db = new Database(HOST,USER,PASSWORD,NAME);
        $result = $db -> insert_author($author);
        return $result;
    }
    public function insert_genre($genre)
    {
        $db = new Database(HOST,USER,PASSWORD,NAME);
        $result = $db -> insert_genre($genre);
        return $result;
    }
    public function insert_book_author($id_book,$id_author)
    {
        $db = new Database(HOST,USER,PASSWORD,NAME);
        $result = $db -> insert_book_author($id_book,$id_author);
        return $result;
    }
    public function insert_book_genre($id_book,$id_genre)
    {
        $db = new Database(HOST,USER,PASSWORD,NAME);
        $result = $db -> insert_book_genre($id_book,$id_genre);
        return $result;
    }
    
    public function get_author($author)
    {
        $db = new Database(HOST,USER,PASSWORD,NAME);
        $result = $db -> get_author($author);
        return $result;
    }
}
?>