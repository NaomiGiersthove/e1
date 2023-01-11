<?php  

$dsn = "mysql:host=localhost;dbname=excellenttaste";
$user = "root";
$passwd = "";

try {
  $pdo = new PDO($dsn, $user, $passwd);
} catch (Exception $e) {
  echo 'Caught exception: ',  $e->getMessage(), "\n";
}

class database{

    private $host;
    private $dbh;
    private $user;
    private $pass;
    private $db;

    function __construct(){
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->database = 'excellenttaste';

        try{
            $dsn = "mysql:host=$this->host;dbname=$this->database"; 
            $this->dbh = new PDO($dsn, $this->username, $this->password);
        }catch(PDOException $exception){
            die("Unable to connect. Error: " . $exception.getMessage());
        }
    }

    public function addUser(){

        $sql = "INSERT INTO users VALUES (:medewerkersid, :voornaam, :voorvoegsels, :achternaam, :username, :password)";

        $statement = $this->dbh->prepare($sql); 

     /*   $statement->execute([
            'medewerkersid'=>NULL, 
            'voornaam'=>'Naomi',
            'voorvoegsels'=>'',
            'achternaam'=>'Giersthove',
            'username'=>'NaomiGiersthove',
        ]); */
    }
    

    public function login($uname, $psw){

        $sql = "SELECT username, password FROM medewerker WHERE username = :username";

        $stmt = $this->dbh->prepare($sql);

        $stmt = execute([
            'username'=>$uname,
        ]);

    }

}

?>