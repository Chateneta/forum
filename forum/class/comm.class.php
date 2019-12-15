<?php
require_once('../class/bdd.class.php');
require_once('../class/user.class.php');


class comm{
    public $id;
    public $content;


    public function __construct(){
     
    }

    public function add($content,$author,$post){
        $db= new bdd("localhost","forum","root","");
        $sql = $db->link->prepare("INSERT INTO comm(content,author,post) VALUES (?,?,?) ");
        $sql->bind_param("sii", $content,$author,$post);
        $sql->execute();
        
            $sql = $db->link->prepare("SELECT count(id) AS A FROM comm WHERE content=? AND author=? AND post=? ");
            $sql->bind_param("sii",$content,$author,$post);
            $sql->execute();
            $res = $sql->get_result();
            $temp= $res->fetch_assoc();
            if($temp['A']==0){
                return 1;
            }
            else{
                return 2;
            }           
        }

    


    public function getAllComm($post){
        $db= new bdd("localhost","forum","root","");
        $tab=[];
        $sql = $db->link->prepare("SELECT content, author FROM comm WHERE post=?");
        $sql->bind_param("i",$post);
        $sql->execute();
        $res = $sql->get_result();
        $u = new user();
        while($row = mysqli_fetch_array($res)){
            $temp = $u->getLogin($row['author']);
            array_push($tab, [ 'cont'=>$row['content'],'author'=>$temp  ] );
        };
    
        return $tab;
    }
    


    public function affiche($content,$author){
        
        return
        "<div class='container'>
            <div>
                <div class='card'>
                    <h5 class='card-header'>".$author."</h5>
                    <div class='card-body'>
                        <p class='card-text'>".$content."</p>
                    </div>
                </div>
            </div>
        </div>";
              
    }
    

}

?>

