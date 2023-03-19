<?php
try
{
	$database = new PDO('mysql:host=localhost;dbname=cmfireplay;charset=utf8;port=3306', 'root', 'root');
        //$database = new PDO('mysql:host=db5005991667.hosting-data.io;dbname=dbs5019288;charset=utf8;port=3306', 'dbu610793', 'adm7PMBjx98!');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>

<?php
//Get Heroku ClearDB connection information
/*$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
try
{
	$database = new PDO('mysql:host='.$cleardb_server.';dbname='.$cleardb_db.';charset=utf8',$cleardb_username, $cleardb_password);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}*/

?>