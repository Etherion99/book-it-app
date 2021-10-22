import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';
import { ApiService } from 'src/app/services/api.service';

@Component({
  selector: 'app-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.css']
})
export class ProfileComponent implements OnInit {
  updateF = new FormGroup({
    name: new FormControl('juan'),
    lastname: new FormControl('trujillo'),
    email: new FormControl('juansttt99@gmail.com'),
    username: new FormControl('juan44'),
    password: new FormControl('12345')
  });

  constructor(
    private server: ApiService,
    private router:Router
  ) { }

  ngOnInit(): void {
    this.server.findUser(parseInt(localStorage.getItem('user') || '0')).subscribe(res => {
      if(res['ok']){
        this.updateF.patchValue(res['data']);
      }else{
        alert(res['message']);
      }
    })
  }

  update(){
    let data = this.updateF.value;
    data['id'] = localStorage.getItem('user');

    this.server.updateUser(data).subscribe(res => {
      if(res['ok']){
        alert('Perfil actualizado');
      }else{
        alert(res['message']);
      }
    })
  }
}
