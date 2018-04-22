<?php
session_start();

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
<body id='main'>Welcome <?php echo $_SESSION['username']?>!<br>
    <div id='box'>
        <div id='containerTop'>
                <button class="userButtons" onclick="showAddKey()"   style="width:auto;">CREATE</button>
                <button class="userButtons" onclick="showDelKey()"   style="width:auto;">DELETE</button>
                <button class="userButtons" onclick="showUpdKey()"   style="width:auto;">UPDATE</button>
                <button class="userButtons" onclick="showLogKey()" style="width:auto;">KQR USAGE</button>
                <button class="userButtons" onclick="showLisKey()" style="width:auto;">KQR LIST</button> 
                <a href="logout.php">
                    <button class="warningBtn" onclick="showLogOut()" style="width:auto;">LOGOUT</button>
                </a>
                

        </div>
                
        <div id='containerMiddle'   style="display: inline"><br>
            <div id='disCreate'     style="display: none"><?php include('create.php');?></div>
            <div id='disDelete'     style="display: none"><?php include('remove.php');?></div>
            <div id='disUpdate'     style="display: none"><?php include('update.php');?></div>
            <div id='disList'       style="display: none"><?php include('qrList.php');?> </div>
            <div id='disLogs'       style="display: none"><?php include('logs.php');?></div>
            
        </div>
        
        <div id='containerButtom' style="display: inline">
        
        </div>
    </div>

</body>
        <script type="text/javascript" src= 'js/admin.js' ></script>
             
</html>