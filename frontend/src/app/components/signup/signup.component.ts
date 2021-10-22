import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { ApiService } from 'src/app/services/api.service';

@Component({
  selector: 'app-signup',
  templateUrl: './signup.component.html',
  styleUrls: ['./signup.component.css']
})
export class SignupComponent implements OnInit {
  
  form = new FormGroup({
    name: new FormControl('juan',[Validators.required, Validators.minLength(4)]),
    lastname: new FormControl('trujillo',[Validators.required, Validators.minLength(4)]),
    email: new FormControl('juansttt99@gmail.com',Validators.email),
    username: new FormControl('juan44',[Validators.required, Validators.minLength(4),Validators.pattern('^[a-zA-Z0-9]([._-](?![._-])|[a-zA-Z0-9]){3,18}[a-zA-Z0-9]$')]),
    password: new FormControl('12345',[Validators.required, Validators.minLength(8)/*Validators.pattern('^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$")')*/]),
    password2: new FormControl('12345'),
    document: new FormControl('12345',[Validators.required, Validators.minLength(8),Validators.maxLength(11),Validators.pattern('^[0-9]')]),
    documenttype_id: new FormControl('1')
  });
  //A password contains at least eight characters, including at least one number and includes both lower and uppercase letters and special characters
  /*Username requirements
      Username consists of alphanumeric characters (a-zA-Z0-9), lowercase, or uppercase.
      Username allowed of the dot (.), underscore (_), and hyphen (-).
      The dot (.), underscore (_), or hyphen (-) must not be the first or last character.
      The dot (.), underscore (_), or hyphen (-) does not appear consecutively, e.g., java..regex
      The number of characters must be between 5 to 20.
  */

  constructor(
    private server: ApiService,
    private router:Router
  ) { }

  ngOnInit(): void {
  }

  signup(){
    let data = this.form.value;
    data['city_id'] = 851;
    data['gender_id'] = 1;

    data['documenttype_id'] = parseInt(data['documenttype_id']);

    if(!data['email'].match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/gi)){
      alert('Ingresa un correo con formato válido');
    }else if(data['username'].length < 4){
      alert('El nombre de usuario debe tener mínimo 4 caracteres');
    }else if(!data['password'].match(/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/gi)){
      alert('La contraseña debe tener mínimo 8 caracteres ademas de contener al menos una letra, un número y una caracter especial.');
    }else if(data['name'].length < 3){
      alert('Tu nombre debe tener al menos 3 caracteres');
    }else if(data['lastname'].length < 3){
      alert('Tu apellido debe tener al menos 3 caracteres');
    }else if(data['username'].length > 15){
      alert('El nombre de usuario debe tener maximo 15 caracteres');
    }else if(data['password'] != data['password2']){
      alert('Las contraseñas deben coincidir');
    }else{
      delete data['password2'];
      
      this.server.signup(data).subscribe(res => {
        if(res['ok']){
          localStorage.setItem('user', res['id']);
          this.router.navigate(['/profile']);
        }else{
          alert('Ha ocurrido un error al comunicarse con la base de datos.');
        }
      });
    }
  }
}
