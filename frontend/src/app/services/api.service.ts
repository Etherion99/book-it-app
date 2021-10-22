import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ApiService {
  private API = 'http://localhost:8000/api/';

  constructor(
    private http:HttpClient
  ) { }

  signup(data:Object):Observable<any>{
    return this.http.post(this.API+'auth/singup', data);
  }

  login(data:Object):Observable<any>{
    return this.http.post(this.API+'auth/login', data);
  }

  findUser(id:number):Observable<any>{
    return this.http.get(this.API+'user/find/'+id);
  }

  updateUser(data:Object):Observable<any>{
    return this.http.post(this.API+'user/update', data);
  }

  loadDpts():Observable<any>{
    return this.http.get(this.API+'department/all');
  }

  loadCities(dpt:number):Observable<any>{
    return this.http.get(this.API+'city/find_by_dpt/'+dpt);
  }

  searchHabs(city:number):Observable<any>{
    return this.http.get(this.API+'room/find_by_city/'+city);
  }

  reservar(data:Object):Observable<any>{
    return this.http.post(this.API+'room/book', data);
  }

  history(id:number):Observable<any>{
    return this.http.get(this.API+'book/history/'+id);
  }

  regHotel(data:object):Observable<any>{
    return this.http.post(this.API+'hotel/create', data);
  }
}
