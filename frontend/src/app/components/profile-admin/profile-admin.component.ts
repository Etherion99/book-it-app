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
  modal1:boolean = false;
  modal2:boolean = false;
  selectedSuc:number = 0;
  department:number = 0;

  rooms:any[] = [];
  sucs:any[] = [];
  departments:any[] = [];
  cities:any[] = [];

  updateF = new FormGroup({
    name: new FormControl('juan'),
    lastname: new FormControl('trujillo'),
    email: new FormControl('juansttt99@gmail.com'),
    username: new FormControl('juan44'),
    password: new FormControl('12345')
  });

  roomF = new FormGroup({
    room_number: new FormControl('10'),
    roomtype_id: new FormControl('3'),
    description: new FormControl('habitacion triple')
  });

  sucF = new FormGroup({
    name: new FormControl('central'),
    address: new FormControl('calle 25 # 3-25'),
    phone: new FormControl('3145789658'),
    department: new FormControl(''),
    city_id: new FormControl('559'),
    branchtype_id: new FormControl('2'),
    description: new FormControl('sucursal central')
  });

  constructor(
    private server: ApiService,
    private router:Router
  ) { }

  ngOnInit(): void {
    if( (localStorage.getItem('user') || '') == ''){
      this.router.navigate(['/login']);
    }
    
    this.server.loadDpts().subscribe(res => {
      if(res['ok']){
        this.departments = res['data'];
      }else{
        alert(res['message']);
      }
    });

    this.loadRooms();
    this.loadSucs();
  }

  loadSucs(){
    this.server.adminSucs(parseInt(localStorage.getItem('user') || '0')).subscribe(res => {
      if(res['ok']){
        this.sucs = res['data'];
      }else{
        alert(res['message']);
      }
    });
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

  loadCities(){
    this.server.loadCities(this.sucF.get('department')?.value).subscribe(res => {
      if(res['ok']){
        this.cities = res['data'];
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

  deleteRoom(room:any){
    this.server.deleteRoom(room.id).subscribe(res => {
      if(res['ok']){
        this.loadRooms();
      }else{
        alert(res['message']);
      }
    });
  }

  deleteSuc(suc:any){
    this.server.deleteSuc(suc.id).subscribe(res => {
      if(res['ok']){
        this.loadSucs();
      }else{
        alert(res['message']);
      }
    });
  }

  regRoom(){
    let data = this.roomF.value;
    data['branch_id'] = this.selectedSuc;

    this.server.regRoom(data).subscribe(res => {
      if(res['ok']){
        this.modal2 = false;
        this.loadRooms();
      }else{
        alert(res['message']);
      }
    });
  }

  regSuc(){
    let data = this.sucF.value;
    data['user'] = parseInt(localStorage.getItem('user') || '0');

    this.server.regSuc(data).subscribe(res => {
      if(res['ok']){
        this.modal1 = false;
        this.loadSucs();
      }else{
        alert(res['message']);
      }
    });
  }

  showModal1(){
    this.modal1 = true;
  }

  showModal2(suc:any){
    this.selectedSuc = suc.id;
    this.modal2 = true;
  }
}
