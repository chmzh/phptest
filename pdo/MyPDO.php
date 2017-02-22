<?php
class MyPDO extends PDO {
	const PARAM_host = 'localhost';
	const PARAM_port = '3306';
	const PARAM_db_name = 'test';
	const PARAM_user = 'root';
	const PARAM_db_pass = '123456';
	public function __construct($options = null) {
		parent::__construct ( 'mysql:host=' . MyPDO::PARAM_host . ';port=' . MyPDO::PARAM_port . ';dbname=' . MyPDO::PARAM_db_name, MyPDO::PARAM_user, MyPDO::PARAM_db_pass, $options );
	}
	public function query($query) { // secured query with prepare and execute
		$args = func_get_args ();
		array_shift ( $args ); // first element is not an argument but the query itself, should removed
		
		$reponse = parent::prepare ( $query );
		$reponse->execute ( $args );
		return $reponse;
	}
	public function insecureQuery($query) { // you can use the old query at your risk ;) and should use secure quote() function with it
		return parent::query ( $query );
	}
}

$db = new MyPDO ();
$db->setAttribute ( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ );

$uname = isset ( $_GET ["uname"] ) ? $_GET ["uname"] : 1; // need to be securised for injonction
$uname = $db->quote($uname);
echo $uname;
//$ret = $db->query ( "SELECT * FROM user WHERE uname=?", $uname );
// $ret = $db->insecureQuery("SELECT * FROM user WHERE uname=".$db->quote($uname));
//$uname = "'cndw' or 1=1";
//$uname = "'cndw';delete from user where uname='test'";
//ЩОГ§Ъ§Он http://test.cmz.com/pdo/MyPDO.php?uname=%27cndw%27;delete%20from%20user%20where%20uname='sdfsf'
//http://test.cmz.com/pdo/MyPDO.php?uname=%27cndw%27%20or%201=1
$ret = $db->insecureQuery("SELECT * FROM user WHERE uname=$uname");

while ( $o = $ret->fetch () ) {
	echo $o->uname . PHP_EOL;
}
?>