<?php
include('bdd.class.php');


class post{
    private $id;
    private $nom;
    private $content;


    public function __construct(){
     
    }

    public function getNom(){
        return $this->nom;
    }
    public function getContent(){
        return $this->content;
    }


    public function add($id,$nom,$content){
        $db= new bdd("localhost","forum","root","");
        $sql = $db->link->prepare("SELECT count(id) AS A FROM post WHERE nom=?");
        $sql->bind_param("s",$nom);
        $sql->execute();
        $res = $sql->get_result();
        $temp= $res->fetch_assoc();
        
        if($temp['A']==0){
            $sql = $db->link->prepare("INSERT INTO post(nom, content, createdBy) VALUES (?,?,?) ");
            $sql->bind_param("sss", $nom,$content,$id);
            $sql->execute();
           
            
            $sql = $db->link->prepare("SELECT count(id) AS A FROM post WHERE nom=? ");
            $sql->bind_param("s",$nom);
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
        else{
            return 0;//User existant
        }  
    }


    public function getAllPost(){
        $db= new bdd("localhost","forum","root","");
        $tab=[];
        $sql = $db->link->prepare("SELECT id, nom, content, createdBy FROM post");
        $sql->execute();
        $res = $sql->get_result();
        while($row = mysqli_fetch_array($res)){     
            array_push($tab, [ 'nom'=>$row['nom'], 'content'=>$row['content'], 'createdBy'=>$row['createdBy'], 'ud'=>$row['id'] ] );
        };
        return $tab;
    }

    public function affiche($nom,$content,$author,$id){
        
        return
        "<div class='col-6 oui id='$id'>
            <a href='post.php'>
                <div class='card'>
                    <h5 class='card-header'>".$nom."</h5>
                    <div class='card-body'>
                        <p class='card-text'>".$content."</p>
                        <p class=''>".$author."</p>
                    </div>
                </div>
            </a>
        </div>";
              
    }

}

?>
