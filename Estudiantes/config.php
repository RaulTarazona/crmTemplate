<?php 

require_once("db.php");

class Config{

    private $id;
    private $nombre;
    private $direccion;
    private $logros;
    private $especialidad;
    private $skills;
    private $ser;
    private $ingles;
    private $review;
    protected $dbCnx;

    public function __construct($id = 0, $nombre = "", $direccion = "", $logros= "",$especialidad= "",$skills=0,$ser=0,$ingles="",$review=0 ){

        $this->id = $id;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->logros = $logros;
        $this->especialidad = $especialidad;
        $this->skills= $skills;
        $this->ser = $ser;
        $this->ingles= $ingles;
        $this->review = $review;

        $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC] );

    }

    public function setId($id){
        $this->id = $id;
        
    }

    public function getId(){
        return $this->id;
    }

    public function setNombres($nombre){
        $this->nombre = $nombre;
        
    }

    public function getNombres(){
        return $this->nombre;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
        
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setLogros($logros){
        $this->logros = $logros;
        
    }

    public function getLogros(){
        return $this->logros;
    }

    public function setEspecialidad($especialidad){
        $this->especialidad = $especialidad;
    }

    public function getEspecialidad(){
        return $this->especialidad;
    }

    public function setSkills($skills){
        $this->skills= $skills;
    }

    public function getSkills(){
        return $this->skills;
    }

    public function setSer($ser){
        $this->ser =$ser;

    }

    public function getSer(){
        return $this -> ser;
    }

    public function setIngles($ingles){
        $this->ingles = $ingles;
    }

    public function getIngles(){
        return $this->ingles;
    }

    public function setReview($review){
        $this->review = $review;
    }

    public function getReview(){
        return $this->review;
    }

    public function insertData(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO campers(nombre, direccion, logros, especialidad, skills, ser, ingles, review) values(?,?,?,?,?,?,?,?)");
            $stm -> execute([$this-> nombre, $this->direccion, $this->logros, $this->especialidad, $this->skills,$this->ser,$this->ingles,$this->review]) ;   
        } catch (Exception $th) {
            return $th->getMessage();
        }
       
    }

    public function selectAll(){
        try {
            $stm= $this->dbCnx ->prepare("SELECT * FROM campers");
            $stm-> execute();
            return $stm-> fetchAll();
        } catch (Exception  $e) {
            return $e->getMessage();
        }
    }

    public function delete(){
        try {
            $stm = $this-> dbCnx->prepare('DELETE FROM campers WHERE  id = ?');
            $stm-> execute([$this->id]);
            return $stm->fetchAll();
    
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}




?>





