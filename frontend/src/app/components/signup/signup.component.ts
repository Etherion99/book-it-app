import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup } from '@angular/forms';

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
  
  constructor() { }

  ngOnInit(): void {
  }

  admin(){
    this.isAdmin = true;
  }

  user(){
    this.isAdmin = false;
  }

  SUUser(){
    console.log(this.form.value)
  }

  SUAdmin(){

  }
}
