
<?php
session_start();
			
        if(($_POST)) {
				$username = $_POST['username'];
				$password = $_POST['password'];
                $salt     = 'salt';
                $hashed   = md5($password.$salt);
				try{
                    $host = 'localhost:3306';
                    $dbname='id4845629_kqrtags';
                    $user='root';
                    $pass='alex';
                    $DBH = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
                    
                    $q = $DBH->prepare("SELECT * FROM id4845629_kqrtags.users WHERE uusername = :username and upassword = :password LIMIT 1");
					$q->bindValue(':username', $username);
					$q->bindValue(':password', $hashed);
					$q->execute();
                    $check=$q->fetch(PDO::FETCH_ASSOC);
                    
                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['type']     = $check['utype'];
                    $_SESSION['password'] = $check['upassword'];
                    $_SESSION['id']       = $check['uid'];
                    
					if(!empty($check)){
                            $userType = $check['utype'];
					        $userStatus = $check['ustatus'];
                        

                            $sql = "INSERT INTO id4845629_kqrtags.logs (ltime, laction, uid) VALUES ( CURRENT_TIMESTAMP, 'LOGIN', ?)";
                                        $q = $DBH->prepare($sql);
                                        $q->bindParam(1,$_SESSION['id']);
                                        $q->execute();


                        if(($userType == 'admin') && ($userStatus == 'active' )){
                           header('Location: admin.php');
                        
                        }elseif(($userType == 'admin') && ($userStatus == 'inactive' )){
                            echo '<script type="text/javascript"> alert("inactive");</script>';
                            
                        }else{

                            echo '<script type="text/javascript"> alert("Acces Denied - contact your KQR-Provider");</script>';
                            
                        }
                    }else {
                        echo '<script type="text/javascript"> alert("No data");</script>';
                    }
                    $DBH = null;
				}catch(PDOException $e){
                    echo "Error: ".$e;
                    $DBH = null;
                }
			}

?>
<!DOCTYPE html>
<html>
<head>
      <meta charset="UTF-8">
      <meta name="description" content="KQR TAGS website">
      <meta name="keywords" content="HTML,CSS,XML,JavaScript, PHP">
      <meta name="author" content="Alejandro Rivera">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
            <link rel="stylesheet" type="text/css" href="css/distribution.css">
            <link rel="stylesheet" type="text/css" href="css/items.css">
</head>
<body id='main'>Welcome!<br>KQR TAGS<br>
<img src="img/kqrLogo.png" id='logoKQRtags'>



<div id='box'>
        
        <div id='containerTop'>
            <button class="mainButtons" onclick="showAbout()"   style="width:auto;">ABOUT</button>
            <button class="mainButtons" onclick="showLogin()"   style="width:auto;">LOGIN</button>
            <button class="mainButtons" onclick="showContact()" style="width:auto;">CONTACT</button><br>
        </div>
                
        <div id='containerMiddle' style="display: inline">
            <div id='display' style="display: none">Display-info</div><br>
        </div>
        
        <div id='containerButtom' style="display: inline">
            <a href="downloads/kqrApp.apk" download>
            <img id='logo_download'src="img/kqrApp.png"style="width:auto;"><br>Download-app</a>
                <br>
                    <!-- <a href="downloads/kqrApp.apk" download>
                    <button class="mainButtons" style="width:auto;">DOWNLOAD KQR_APP</button></a> -->
        </div>
    </div>
<!--*******************************************************  LOGIN - FORM *********************************************************   -->
   <!-- The Modal -->
   <div id="myForm" class="modal">
  <span onclick="document.getElementById('myForm').style.display='none'" 
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
<!--  <form class="modal-content animate" action="/action_page.php">-->
  <form class="login modal-content animate" method="POST" action="./index.php" >
    <div class="imgcontainer">
      <img src="img/no_image_user.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label ><b>Username</b></label>
      <input type="text" placeholder="Enter Username"  name="username" required>
      <label ><b>Password</b></label>
      <input type="password" placeholder="Enter Password"  name="password" required>
      <button class='mainButtons logInButton' type="submit">Login</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
        <button type="button" onclick="document.getElementById('myForm').style.display='none'" class="mainButtons cancelbtn">Cancel</button>
    </div>
  </form>
</div>
<!--*************************************************** END - LOGIN - FORM *********************************************************   -->
</body>
     <script type="text/javascript" src='js/kqr_app.js'></script>
</html>
