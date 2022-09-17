function references(){
    showReferences = document.getElementById('showReferences');

    if(showReferences.style.display=="block"){
        showReferences.style.display="none";
    }
    else if(showReferences.style.display="none"){
        showReferences.style.display="block";
    }
}

function calendario(){
    window.location.href = 'calendario.php';
}

function toggle(id) {
    document.getElementById('blur').classList.toggle('active');
    document.getElementById('blur2').classList.toggle('active');

    switch(id){
        case 1:
            document.getElementById('popup1').classList.toggle('active');
        break;
        case 2:
            document.getElementById('popup2').classList.toggle('active');
        break;
        case 3:
            document.getElementById('popup3').classList.toggle('active');
        break;
        case 4:
            document.getElementById('popup4').classList.toggle('active');
        break;
        case 5:
            document.getElementById('popup5').classList.toggle('active');
        break;
        case 6:
            document.getElementById('popup6').classList.toggle('active');
        break;
        case 7:
            document.getElementById('popup7').classList.toggle('active');
        break;
        case 8:
            document.getElementById('popup8').classList.toggle('active');
        break;
        case 9:
            document.getElementById('popup9').classList.toggle('active');
        break;
        case 10:
            document.getElementById('popup10').classList.toggle('active');
        break;
        case 11:
            document.getElementById('popup11').classList.toggle('active');
        break;
        case 12:
            document.getElementById('popup12').classList.toggle('active');
        break;
        case 13:
            document.getElementById('popup13').classList.toggle('active');
        break;
        case 14:
            document.getElementById('popup14').classList.toggle('active');
        break;
        case 15:
            document.getElementById('popup15').classList.toggle('active');
        break;
        case 16:
            document.getElementById('popup16').classList.toggle('active');
        break;
        case 17:
            document.getElementById('popup17').classList.toggle('active');
        break;
        case 18:
            document.getElementById('popup18').classList.toggle('active');
        break;
        case 19:
            document.getElementById('popup19').classList.toggle('active');
        break;
        case 20:
            document.getElementById('popup20').classList.toggle('active');
        break;
        case 21:
            document.getElementById('popup21').classList.toggle('active');
        break;
        case 22:
            document.getElementById('popup22').classList.toggle('active');
        break;
    }
}