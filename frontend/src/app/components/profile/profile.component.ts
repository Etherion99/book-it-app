import { Component, OnInit, enableProdMode } from '@angular/core';
import { FormControl, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';
import { ApiService } from 'src/app/services/api.service';


@Component({
  selector: 'app-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.css']
})
export class ProfileComponent implements OnInit {
  Math = Math;

  updateF = new FormGroup({
    name: new FormControl('juan'),
    lastname: new FormControl('trujillo'),
    email: new FormControl('juansttt99@gmail.com'),
    username: new FormControl('juan44'),
    password: new FormControl('12345')
  });

  searchF = new FormGroup({
    department: new FormControl('21'),
    city: new FormControl('851')
  });

  departments:any[] = [];
  cities:any[] = [];
  rooms:any[] = [];
  reservs:any[] = [];

  constructor(
    private server: ApiService,
    private router:Router
  ) { }

  ngOnInit(): void {
    /*this.server.findUser(parseInt(localStorage.getItem('user') || '0')).subscribe(res => {
      if(res['ok']){
        this.updateF.patchValue(res['data']);
      }else{
        alert(res['message']);
      }
    });

    this.server.loadDpts().subscribe(res => {
      if(res['ok']){
        this.departments = res['data'];
      }else{
        alert(res['message']);
      }
    });

    this.loadCities();

    setTimeout(() => {
      this.search();
    }, 1000);*/
    this.search();
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

  loadCities(){
    this.server.loadCities(this.searchF.get('department')?.value).subscribe(res => {
      if(res['ok']){
        this.cities = res['data'];
      }else{
        alert(res['message']);
      }
    });
  }

  search(){
    this.server.searchHabs(/*this.searchF.get('city')?.value*/559).subscribe(res => {
      if(res['ok']){
        this.rooms = res['data'];
        this.rooms = this.rooms.map(room => {
          room['start'] = '';
          room['end'] = '';
          room['cost'] = (Math.floor(Math.random() * (100 - 5)) + 5)*1e4;
          return room;
        });
        console.log(this.rooms);
      }else{
        alert(res['message']);
      }
    });
  }

  reservar(room:any){
    if(room.end != '' && room.start != ''){
      if(room.end > room.start){

        let data = {
          date: room.start,
          end: room.end,
          cost: room.cost,
          room: room.id,
          user: parseInt(localStorage.getItem('user') || '0')
        };

        this.server.reservar(data).subscribe(res => {
          if(res['ok']){
            alert('Felicitaciones, tu reservación está lista. Te esperamos!!');
            this.search();
            this.history();
          }else{
            alert(res['message']);
          }
        });
      }else{
        alert('La fecha de salida debe ser superior a la de llegada');
      }
    }else{
      alert('por favor llena las fechas de llegada y salida para reservar');
    }
  }

  history(){

  }
}

enableProdMode();