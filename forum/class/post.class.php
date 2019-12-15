<?php
require_once('../class/bdd.class.php');



class post{
    public $id;
    public $nom;
    public $content;
    public $author;
    public $vote;


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
            array_push($tab, [ 'nom'=>$row['nom'], 'content'=>$row['content'], 'createdBy'=>$row['createdBy'], 'id'=>$row['id'] ] );
        };
        return $tab;
    }
    public function getPost($id){
        $db= new bdd("localhost","forum","root","");
        $tab=[];
        $sql = $db->link->prepare("SELECT id, nom, content, createdBy FROM post where id=?");
        $sql->bind_param("i",$id);
        $sql->execute();
        $res = $sql->get_result();
        $res =mysqli_fetch_array($res);
        
        $tempo=$this->getUpVote($id);
        array_push($tab, [ 'nom'=>$res['nom'], 'content'=>$res['content'], 'createdBy'=>$res['createdBy'], 'id'=>$res['id'], 'vote'=>$tempo ]);
        return $tab;
    }


    public function affiche($nom,$content,$author,$id){
        
        return
        "<div class='col-6 oui id='$id'>
            <a href='post.php?id=".$id."'>
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
    public function afficheSolo($nom,$content,$author,$id,$vote){
        
        return
        "<div class='card id='$id''>
            <h5 class='card-header'>".$nom."</h5>
            <div class='card-body'>
                <p class='card-text'>".$content."</p>
                <p class=''>".$author."</p>
                <button type='submit' class='button button-like' name='upVote' value=".$vote.">
                    <i class='fa fa-heart'></i>
                    <span class='span'>Liked: $vote</span>
                </button>
                <hr>
                <form action='/back/comm.php' method='post'>
                    <textarea class='form-control' rows='5' type='textarea' name='comm' placeholder='Commentaire'></textarea>
                    <input value=".$id." name='id' type='hidden'>
                    <input type='submit' class='mt-3 btn btn-warning'>
                </form>
            </div>";
              
    }


    public function upVote($idu,$idp){
        $db= new bdd("localhost","forum","root","");
        $sql = $db->link->prepare("SELECT count(*) AS A FROM user_post WHERE idu=? AND idp=?");
        $sql->bind_param("ii",$idu,$idp);
        $sql->execute();
        $res = $sql->get_result();
        $temp= $res->fetch_assoc();
        
        if($temp['A']==0){
            $sql = $db->link->prepare("INSERT INTO user_post(idu,idp) VALUES (?,?)");
            $sql->bind_param("ii", $idu,$idp);
            $sql->execute();          
        }
        else{
            $sql = $db->link->prepare("DELETE FROM user_post WHERE idu=? AND idp=?");
            $sql->bind_param("ii", $idu,$idp);
            $sql->execute();
        }
    }
    public function getUpVote($idp){
        $db= new bdd("localhost","forum","root","");
        $sql = $db->link->prepare("SELECT count(idu) as A FROM user_post where idp=?");
        $sql->bind_param("i",$idp);
        $sql->execute();
        $temp = $sql->get_result();
        $tempo= $temp->fetch_assoc();
        return $tempo['A'];
       
    }

}

?>

