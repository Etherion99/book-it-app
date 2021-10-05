/*Crear una sección de registro de gustos la cual se tendrá que habilitar cuando el 
usuario seleccione en un input type="radio" , el cual debe contener como 
 color favorito, marca de carro favorita, estilo de carro favorito, y una que les diga 
el modelo de carro que mas le gusta.*/

//Llamar al html
const radio =  document.getElementById('radio');
const noradio = document.getElementById('noradio');
let tst = document.getElementById('gustos');
tst.style.display = "none";

function showTastes() {
    var x = document.getElementById("gustos");
    if (x.style.display === "none") {
        x.style.display = "block";
    } 
}

function noshowTastes(){
    var x = document.getElementById("gustos");
    if (x.style.display != "none") {
        x.style.display = "none";
    } 
}


function updateValuemin(input)
{
    document.getElementById('minCost').value = input;
}

function updateValuemax(input)
{
    document.getElementById('maxCost').value = input;
}


$(function(){
    $('#birthDay').on('change', calcularEdad);
});

function calcularEdad() {
    
    fecha = $(this).val();
    var hoy = new Date();
    var cumpleanos = new Date(fecha);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();

    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }
    $('#edad').val(edad);
}


function checkPassword()
  {  
    
    const password = document.getElementById('password'); 
    var re =new RegExp('(?=.*[!#%/&])');
    console.log(password.value);
    if(password.value.match(re)==null ){
    
        setWrongInput(password, 'La contraseña debe contener al menos de uno de estos carácteres especiales #,%,/,&');
        return false;
    } 
    const password2 = document.getElementById('password2');
    console.log(password2.value);
    if (password.value !== password2.value) {
 
        
        setWrongInput(password2,'Las contraseñas deben coincidir');
        
        return false;
    }
    
          
    removeWrongInput(password);
    removeWrongInput(password2);
    return true;
  }

function setWrongInput(input, messages) {
    input.classList.add('is-invalid');
    input.classList.remove('is-valid');
    input.parentNode.querySelector('.invalid-feedback').innerText = messages;
}
function removeWrongInput(input) {
    input.classList.remove('is-invalid');
    input.classList.add('is-valid');
    input.parentNode.querySelector('.invalid-feedback').innerText = '';
}





