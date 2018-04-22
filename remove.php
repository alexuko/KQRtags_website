<?php
include('connection.php');
if($_POST) {

    session_start(); 
        // Change Key status to inactive 
        $idToUpdate = $_POST['keyID'];
        $newStatus = 'inactive';
        $q = $DBH->prepare("UPDATE id4845629_kqrtags.qrkeys SET kstatus=:newStat WHERE kid =:kid "); 
        $q->bindValue(':newStat',$newStatus);
        $q->bindValue(':kid',$idToUpdate);
        $q->execute();
        echo '<script type="text/javascript">alert("deleted");</script>';    
       
        //Register in logs the action performed
        $sql3 = "INSERT INTO id4845629_kqrtags.logs (ltime, laction, uid, kid) VALUES ( CURRENT_TIMESTAMP, 'DELETE', ?, ?)";
        $q3 = $DBH->prepare($sql3);
        $q3->bindParam(1,$_SESSION['id']);
        $q3->bindParam(2,$idToUpdate);
        $q3->execute(); 


        header('location: admin.php'); 
        

}else{
    try{   
            $q = $DBH->prepare("SELECT kid FROM id4845629_kqrtags.qrkeys WHERE kstatus= 'active'  ");    
            $q->execute();

        if ($q->rowCount() > 0) {
            echo '<fieldset>
                            <legend>Remove:</legend><br>
                                <form action="remove.php" method="POST" onsubmit="deletedMsj()" >
                                Key:<select name="keyID" required>';
                                echo'<option  value=""></option>';

                                while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
                                    
                                   echo'<option name="keyID" value="'. $row['kid'].'">'. $row['kid'].'</option>';
                                }
                                echo' </select>
                                <input type="submit" class="userButtons" value="Delete"/>
                                </form>
                        </fieldset>';
        
        }else{
            echo "Nothing to Delete!";
        }
    }catch(PDOException $e){
        echo "Error: ".$e;
        $DBH = null;
    }
}   
$DBH = null;
?>



