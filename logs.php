<?php
include('connection.php');
    try{   
        $q = $DBH->prepare("SELECT lid, ltime, laction, users.uid, users.uusername, kid FROM id4845629_kqrtags.logs INNER JOIN users ON logs.uid = users.uid  order by logs.lid DESC;");
        $q->execute();

        if ($q->rowCount() > 0) {
            echo '<table class="dataTable">
                    <tr>
                        <th>Number</th>
                        <th>Date</th>
                        <th>Action</th>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>Key ID</th>
                    </tr>';
                        while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
                        
                            $id   = $row['lid'];
                            $time   = $row['ltime'];
                            $action = $row['laction'];
                            $userID = $row['uid'];
                            $username = $row['uusername'];
                            $keyID  = $row['kid'];
                            
                            echo    '<tr>
                                        <td>'.$id.'</td>                                        
                                        <td>'.$time.'</td>
                                        <td>'.$action.'</td>
                                        <td>'.$userID.'</td>
                                        <td>'.$username.'</td>
                                        <td>'.$keyID.'</td>
                                    </tr>';
                        }
                        echo '</table >';
        
        }else{
            echo "No Results Found";
        }
    }catch(PDOException $e){
        echo "Error: ".$e;
        $DBH = null;
    }
$DBH = null;
?>