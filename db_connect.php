<?php

//header('Content-type: application/x-javascript');
    function connect()  
    {
        //$conx = new mysqli(getenv('OPENSHIFT_MYSQL_DB_HOST'), "adminnN46Fi1", "SCf_2SnqWpi1","epost") ;
        $conx = new mysqli(getenv('OPENSHIFT_MYSQL_DB_HOST'), getenv('OPENSHIFT_MYSQL_DB_USERNAME'), getenv('OPENSHIFT_MYSQL_DB_PASSWORD'), "eposte2" , getenv('OPENSHIFT_MYSQL_DB_PORT'));
        
        if(mysqli_connect_errno()){
                 die("Error connection");
        }
        return $conx;
    }

    function close()
    {
        mysql_close();
    }
   
   

   function all($table){
        $db = connect();
        mysqli_query($db,"SET NAMES 'utf8'");
        $result = mysqli_query($db,"SELECT * FROM $table"); //ORDER BY $id DESC 
        if(!$result){return $db->error;return;}
        $count = mysqli_num_rows($result);
        if($count == 0){return [];return;}
        $reclamations = array();
        for($i = 0; $i<$count; $i++)
            $reclamations[@count($reclamations)] = mysqli_fetch_object($result);
        @mysqli_free_result($result);
        return $reclamations;
   }

    function execute($table,$id="id", $where='', $limit=20) {

        $start=0;
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $start=($id-1)*$limit;
        }
        else{ $id=1; }

        $db = connect();
        mysqli_query($db,"SET NAMES 'utf8'");
        $result = mysqli_query($db,"SELECT * FROM $table $where LIMIT $start, $limit"); //ORDER BY $id DESC 

        if(!$result){return $db->error;return;}
        $count = mysqli_num_rows($result);
        if($count == 0){return [];return;}
        $reclamations = array();
        for($i = 0; $i<$count; $i++)
            $reclamations[@count($reclamations)] = mysqli_fetch_object($result);
        @mysqli_free_result($result);
   
        return $reclamations;
    }






function paginate($table){
        $start=0;
        $limit=20;
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $start=($id-1)*$limit;
        }
        else $id=1; 
    $db = connect();
    mysqli_query($db,"SET NAMES 'utf8'");
    $rows=mysqli_num_rows(mysqli_query($db,"select * from $table"));
    if($rows>2){
        $total=ceil($rows/$limit);
        echo '<center><nav aria-label="Page navigation"> <ul class="pagination">';
        if($id>1){
            echo  '<li> <a href="?id='.($id-1).'" aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>';
        }
        else{
            echo '<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
        }
        
        for($i=1;$i<=$total;$i++)
        {
            if($i==$id) { echo '<li class="active"><a href="#">'.$i.' <span class="sr-only">(current)</span></a></li>'; }
             
            else { echo "<li><a href='?id=".$i."'>".$i."</a></li>"; }
        }


        if($id!=$total){
            echo '<li> <a href="?id='.($id+1).'" aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a> </li>';
        }
        else{
            echo '<li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
        }

        echo "</ul></nav></center>";
    }
}


function getName($id){
    if($id==0) return 'indéfini';
    $db = connect();
    mysqli_query($db,"SET NAMES 'utf8'");
    $result = mysqli_query($db,"SELECT * FROM users WHERE id = $id");
    if(!$result){echo $db->error;}
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_object($result);
    @mysqli_free_result($result);
    if($count)
        return $row->username;
    return 'indéfini';

}
