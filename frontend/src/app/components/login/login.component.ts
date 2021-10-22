import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators} from '@angular/forms';
import { Router } from '@angular/router';
import { ApiService } from 'src/app/services/api.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  form = new FormGroup({
    email: new FormControl('juansttt99@gmail.com',[Validators.required,Validators.email]),
    password: new FormControl('12345',[Validators.required]),
  });

  constructor(
    private server: ApiService,
    private router:Router
  ) { }

  ngOnInit(): void {
  }

  login(){
    let data = this.form.value;
    this.server.login(data).subscribe(res => {
      if(res['ok']){
        localStorage.setItem('user', res['id']);
        this.router.navigate(['/profile']);
      }else{
        alert(res['message']);
      }
    })
  }
}
