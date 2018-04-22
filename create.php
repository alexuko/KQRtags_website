<?php
include('connection.php');
if($_POST) {
    session_start(); 
        
        $kname = $_POST['keyName'];
        
        $klocation = $_POST['keyLoc'];
        $kdescription = $_POST['keyDesc'];
        $sql = "INSERT INTO id4845629_kqrtags.qrkeys (kname, klocation, kdescription, kstatus) VALUES ( ?, ?, ?, 'active')";
        			$q = $DBH->prepare($sql);
        			$q->bindParam(1,$kname);
        			$q->bindParam(2,$klocation);
        			$q->bindParam(3,$kdescription);
                    $q->execute();


                    $q2 = $DBH->prepare("SELECT MAX(kid) as lastKid FROM id4845629_kqrtags.qrkeys");    
                    
                    $q2->execute();

                    if ($q2->rowCount() > 0) {
                        $row = $q2->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['kidCreated'] = $row['lastKid']; 
                    }    
                    $lastIDcreated = $_SESSION['kidCreated'];
                    
             

                    $sql = "INSERT INTO id4845629_kqrtags.logs (ltime, laction, uid, kid) VALUES ( CURRENT_TIMESTAMP, 'INSERT', ?, ?)";
                    $q = $DBH->prepare($sql);
                    $q->bindParam(1,$_SESSION['id']);
                    $q->bindParam(2,$lastIDcreated);
                    $q->execute();



                    header('location: admin.php'); 
    
}else{
    try{   
        
        echo '<fieldset>
                    <legend> NEW - Key:</legend><br>
                        <form action="create.php" method="POST" onsubmit="createMsj()">
                            <input type="text" placeholder="Type here the key name!" name="keyName" maxlength="50" required><br>
                            <input type="text" placeholder="Type here the key location!" name="keyLoc" maxlength="50" required><br>
                            <input type="text" placeholder="Type here the key description!" name="keyDesc" maxlength="200" ><br>
                            <input type="reset" class="userButtons" value = "Reset"/>
                            <input type="submit" class="userButtons" value = "Submit"/>
                        </form>
                    </fieldset>';
        
        
        }catch(PDOException $e){
            echo "Error: ".$e;
            $DBH = null;
        }
}   
$DBH = null;
?>


