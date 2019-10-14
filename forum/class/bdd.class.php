<?php



class bdd{

    private $serveur = "localhost";
    private $base = "forum";
    private $user = " root";
    private $pass = "";
    private $link= "";

    public function __construct($serveur, $base, $user, $pass){
        $db = new mysqli($serveur, $user, $pass ,$base);
        $this->link=$db;
    }
    public function login($login,$pass){
        $sql = $this->link->prepare("SELECT id FROM user WHERE login=? ");
        $sql->bind_param("s",$login);
        $sql->execute();
        $res = $sql->get_result();
        $temp= $res->fetch_assoc();
        return $temp;


        //$sql = "SELECT id FROM user WHERE login='$login' AND pass='$pass' "; 
        //$res = mysqli_query($this->link,$sql); 
        //$data = mysqli_fetch_array($res);
        //return $data[0];
    }

    public function signin($login,$pass,$email){
        $sql = $this->link->prepare("SELECT count(id) AS A FROM user WHERE email=? OR login=? ");
        $sql->bind_param("ss",$email,$login);
        $sql->execute();
        $res = $sql->get_result();
        $temp= $res->fetch_assoc();
       

        if($temp['A']==0){
            $sql = $this->link->prepare("INSERT INTO user(login, pass, email) VALUES (?,?,?) ");
            $sql->bind_param("sss", $login,$pass,$email);
            $sql->execute();
           
            
            $sql = $this->link->prepare("SELECT id FROM user WHERE email=? ");
            $sql->bind_param("s",$email);
            $sql->execute();
            $res = $sql->get_result();
            $temp= $res->fetch_assoc();
            return $temp['id'];
            
        }
        else{
            return 0;//User existant
        }  
    }
    

}
?>