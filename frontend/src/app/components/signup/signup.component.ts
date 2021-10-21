import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup } from '@angular/forms';
import { ApiService } from 'src/app/services/api.service';

@Component({
  selector: 'app-signup',
  templateUrl: './signup.component.html',
  styleUrls: ['./signup.component.css']
})
export class SignupComponent implements OnInit {
  isAdmin = false;
  
  form = new FormGroup({
    name: new FormControl(''),
    lastname: new FormControl(''),
    email: new FormControl(''),
    username: new FormControl(''),
    password: new FormControl(''),
    document: new FormControl('')
  });
  
  constructor(
    private server: ApiService
  ) { }

  ngOnInit(): void {
  }

  admin(){
    this.isAdmin = true;
  }

  user(){
    this.isAdmin = false;
  }

  SUUser(){
    let data = this.form.value;
    data['city_id'] = 851;

    this.server.signup(data).subscribe(res => {
      console.log(res);
    });
  }

  SUAdmin(){

  }
}
