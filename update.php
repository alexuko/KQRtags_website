<?php
include('connection.php');
if($_POST) {
    session_start(); 

        $keyID = $_POST['keyID'];
        $newName = $_POST['keyName'];
        $newLocation = $_POST['keyLoc'];
        $newDescription = $_POST['keyDesc'];
        
        $q = $DBH->prepare("UPDATE id4845629_kqrtags.qrkeys SET kname=:kName, klocation=:kLoc, kdescription=:kDesc WHERE kid =:kid "); 
        $q->bindValue(':kName',$newName);
        $q->bindValue(':kLoc',$newLocation);
        $q->bindValue(':kDesc',$newDescription);
        $q->bindValue(':kid',$keyID);
        $q->execute();

        $sql2 = "INSERT INTO id4845629_kqrtags.logs (ltime, laction, uid, kid) VALUES ( CURRENT_TIMESTAMP, 'UPDATE', ?, ?)";
        $q2 = $DBH->prepare($sql2);
        $q2->bindParam(1,$_SESSION['id']);
        $q2->bindParam(2,$keyID);
        $q2->execute();

        header('location: admin.php'); 

}else{
    try{   
            $q = $DBH->prepare("SELECT kid FROM id4845629_kqrtags.qrkeys WHERE kstatus= 'active' ");    
            $q->execute();

        if ($q->rowCount() > 0) {
            echo '<fieldset>
                            <legend>Update Key:</legend><br>
                                <form action="update.php" method="POST" onsubmit="updateMsj()">
                                Key:<select name="keyID" required>';
                                echo'<option  value=""></option>';

                                while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
                                    
                                   echo'<option  value="'. $row['kid'].'">'. $row['kid'].'</option>';
                                }
                                echo' </select>
                                <input type="text" placeholder="Type here the new key name!" name="keyName" maxlength="50" required><br>
                                <input type="text" placeholder="Type here the new key location!" name="keyLoc" maxlength="50" required><br>
                                <input type="text" placeholder="Type here the new key description!" name="keyDesc" maxlength="200" ><br>
                                <input type="reset"  class="userButtons" value = "Reset"/>
                                <input type="submit" class="userButtons" value = "Update"/>
                                </form>
                        </fieldset>';
        
        }else{
            echo "Nothing to Update!";
        }
    }catch(PDOException $e){
        echo "Error: ".$e;
        $DBH = null;
    }
}   
$DBH = null;
?>


