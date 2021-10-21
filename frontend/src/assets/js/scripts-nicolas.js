document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById('form');
    
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        console.log(form);
    
        const formData = new FormData(form);
        const formObj = Object.fromEntries(formData);
    
        
        const username = document.getElementById('username');  
        
        checkUser(username);
    
        
        
    });
    function checkUser(input){
        var nameRegex = /^[a-zA-Z0-9]+$/;
        if (input.value.length < 10 || input.value.length > 20 ){
            setWrongInput(input,'La longitud debe estar entre 10 y 20 carácteres');
            return;
            
        } else if (input.value.match(nameRegex)==null){
            setWrongInput(input,'El nombre de usuario no debe tener carácteres especiales');
            return ;
        }
        removeWrongInput(input);
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

});


