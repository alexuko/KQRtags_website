function showAddKey(){
    document.getElementById('disCreate').style.display ='inline';
    document.getElementById('disDelete').style.display='none';
    document.getElementById('disUpdate').style.display='none';
    document.getElementById('disList').style.display='none';
    document.getElementById('disLogs').style.display='none';
}

function showDelKey(){
    document.getElementById('disCreate').style.display ='none';
    document.getElementById('disDelete').style.display='inline';
    document.getElementById('disUpdate').style.display='none';
    document.getElementById('disList').style.display='none';
    document.getElementById('disLogs').style.display='none';
}
function showUpdKey(){
    document.getElementById('disCreate').style.display ='none';
    document.getElementById('disDelete').style.display='none';
    document.getElementById('disUpdate').style.display='inline';
    document.getElementById('disList').style.display='none';
    document.getElementById('disLogs').style.display='none';
}
function showLisKey(){
    document.getElementById('disCreate').style.display ='none';
    document.getElementById('disDelete').style.display='none';
    document.getElementById('disUpdate').style.display='none';
    document.getElementById('disList').style.display='inline';
    document.getElementById('disLogs').style.display='none';
}


function showLogKey(){
    document.getElementById('disCreate').style.display ='none';
    document.getElementById('disDelete').style.display='none';
    document.getElementById('disUpdate').style.display='none';
    document.getElementById('disList').style.display='none';
    document.getElementById('disLogs').style.display='inline';
    
}
function showLogOut(){
    alert('You have logged-OUT');
}

function deletedMsj(){
    alert('The QR-Key has been Deleted');
}
function updateMsj(){
    alert('The QR-Key has been Updated');
}

function createMsj(){
    alert('The NEW-QR-Key has been Created');
}

function printQRcode(kid){
    var win = window.open('');
    win.document.write('<img src="https://kqrtags.000webhostapp.com/app/kqrcodes/'+kid+'.JPEG" height="50" width="50" onload="window.print();window.close()" />');
    win.focus();
}