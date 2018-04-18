function showAbout(){
    disCont2();
    document.getElementById('display').style.display = 'inline';
    document.getElementById('display').innerHTML='<h3>About us</h3>'
                                                    +   '<p>Something about</p>'
                                                    +   '<p>more</p>'
                                                    +   '<p>even more</p>';
    
}
function showContact(){
    disCont2();
    document.getElementById('display').style.display = 'inline';
    document.getElementById('display').innerHTML='<h3>Contact us</h3>'
                                                    +   '<p>Alejandro</p>'
                                                    +   '<p>Alberto</p>'
                                                    +   '<p>Camila S</p>'
                                                    +   '<p>Camila F</p>';
    }
function showLogin(){
    document.getElementById('containerMiddle').style.display = 'none';
    document.getElementById('myForm').style.display='block';
}

function disCont2(){ 
    document.getElementById('containerMiddle').style.display = 'inline';
}

// Get the modal
var modal = document.getElementById('myForm');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
//containerTop
//containerMiddle
//containerButtom