const inputs = document.querySelectorAll('.form-control, .form-select');

for (let input of inputs) {
    input.addEventListener('focus', (event) => {
        input.parentNode.parentNode.querySelector('label').style.color = '#3949AB';
    });

    input.addEventListener('blur', (event) => {
        input.parentNode.parentNode.querySelector('label').style.color = '#8B8B8B';
    });
}

const form = document.getElementById('form');

form.addEventListener('submit', (event) => {
    event.preventDefault();

    const formData = new FormData(form);
    const formObj = Object.fromEntries(formData);

    const name = document.getElementById('name');
    const lastname = document.getElementById('lastname');

    validation(
        name, [formObj['name'] == '', formObj['name'].length > 25], ['Campo obligatorio', 'Longitud máxima: 25']
    );

    validation(
        lastname, [formObj['lastname'] == '', formObj['lastname'].length > 25], ['Campo obligatorio', 'Longitud máxima: 25']
    );
});

function validation(input, conditions, messages) {
    for (let i in conditions) {
        let condition = conditions[i];

        if (condition) {
            input.classList.add('is-invalid');
            input.classList.remove('is-valid');
            input.parentNode.querySelector('.invalid-feedback').innerText = messages[i];
            break;
        } else {
            input.classList.add('is-valid');
            input.classList.remove('is-invalid');
            input.parentNode.querySelector('.invalid-feedback').innerText = '';
        }
    }
}
