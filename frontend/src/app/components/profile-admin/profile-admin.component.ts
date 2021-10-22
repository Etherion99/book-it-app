import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';
import { ApiService } from 'src/app/services/api.service';

@Component({
  selector: 'app-profile-admin',
  templateUrl: './profile-admin.component.html',
  styleUrls: ['./profile-admin.component.css']
})
export class ProfileAdminComponent implements OnInit {
  modal:boolean = false;

  rooms:any[] = [];

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
    this.loadRooms();
    this.loadSucs();
  }

  loadSucs(){

  }

  loadRooms(){
    this.server.adminRooms(parseInt(localStorage.getItem('user') || '0')).subscribe(res => {
      if(res['ok']){
        this.rooms = res['data'];
      }else{
        alert(res['message']);
      }
    });
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

  showModal(){
    this.modal = true;
  }
}
