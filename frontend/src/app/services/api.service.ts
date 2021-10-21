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
}
