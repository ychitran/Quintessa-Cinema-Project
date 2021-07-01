import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Member } from '../_shared/models/member.model';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  constructor(
    private readonly httpClient: HttpClient,
    private readonly route: ActivatedRoute
  ) { }


  login(login) {
    return this.httpClient.post(`/auth/login`, login);
  
  }

  register(member: Member) {
    return this.httpClient.post(`/auth/register`, member);
  
  }
}
