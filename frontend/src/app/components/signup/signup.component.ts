import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';
import { ApiService } from 'src/app/services/api.service';

@Component({
  selector: 'app-signup',
  templateUrl: './signup.component.html',
  styleUrls: ['./signup.component.css']
})
export class SignupComponent implements OnInit {
  
  form = new FormGroup({
    name: new FormControl('juan'),
    lastname: new FormControl('trujillo'),
    email: new FormControl('juansttt99@gmail.com'),
    username: new FormControl('juan44'),
    password: new FormControl('12345'),
    document: new FormControl('12345'),
    documenttype_id: new FormControl('1')
  });

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
