import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup } from '@angular/forms';
import { ApiService } from 'src/app/services/api.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  form = new FormGroup({
    email: new FormControl('juansttt99@gmail.com'),
    password: new FormControl('12345'),
  });

  constructor(
    private server: ApiService
  ) { }

  ngOnInit(): void {
  }

  login(){
    
  }
}
