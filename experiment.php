
    echo '<form method="POST">
                            <input type="submit" name="displayList" value="Display"/>
          </form><br>';
                
    function show(){
        include('connection.php');

                    try{   
                    $sql3 = "INSERT INTO id4845629_kqrtags.logs (ltime, laction, uid) VALUES ( CURRENT_TIMESTAMP, 'READ', ?)";
                    $q3 = $DBH->prepare($sql3);
                    $q3->bindParam(1,$_SESSION['id']);
                    $q3->execute(); 



                    $q = $DBH->prepare("SELECT * FROM id4845629_kqrtags.qrkeys  WHERE kstatus = 'active' order by kid desc; " );
                    $q->execute();

                    if ($q->rowCount() > 0) {
                        echo '<table class="dataTable">
                                <tr>
                                    <th>Key ID</th>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Description</th>

                                </tr>';
                                    while ($row = $q->fetch(PDO::FETCH_ASSOC)) {

                                        $keyID  = $row['kid'];
                                        $keyName= $row['kname'];
                                        $keyLoc = $row['klocation'];
                                        $keyDesc= $row['kdescription'];
                                        // $keyStat= $row['kstatus'];

                                        echo    '<tr>
                                                    <td>'.$keyID.'</td>
                                                    <td>'.$keyName.'</td>
                                                    <td>'.$keyLoc.'</td>
                                                    <td>'.$keyDesc.'</td>
                                                    <td><button value="'.$keyID.'"class="printBtn userButtons" onclick="printQRcode('.$keyID.')">Print-QR-code</button></td>
                                                 </tr>';
                                    }echo '</table >';

                    }else{
                        echo "No Results Found";
                    }
                }catch(PDOException $e){
                    echo "Error: ".$e;
                    $DBH = null;
                }
            $DBH = null;
        
        }
    
    if(array_key_exists('displayList',$_POST)){
        show();
