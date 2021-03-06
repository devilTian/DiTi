<?php
class Database {
    
    public function __construct() {
        include_once("config/database.php");
        $info = $config['database'];
        $dsn  = "{$info['product']}:dbname={$info['dbname']};" .
            "host={$info['host']};charset={$info['charset']}";
        $user = $info['user'];
        $pwd  = $info['passwd'];
        $this->dbh = new PDO($dsn, $user, $pwd);
		$this->dbh->exec("SET time_zone = '{$info['timezone']}';");
    }
    
    public function getdbh() {
        return $this->dbh;
    }
}
