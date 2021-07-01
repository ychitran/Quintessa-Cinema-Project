import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Member } from 'src/app/_shared/models/member.model';
import { TicketDetail } from 'src/app/_shared/models/ticket.model';

@Injectable({
  providedIn: 'root'
})
export class ProfleService {

  constructor(
    private readonly httpClient: HttpClient
  ) { }
  
  getProfile(id):Observable<Member> {
    return this.httpClient.get<Member>('/profile/'+id)
  }

  getOrderTicketList(id):Observable<Array<TicketDetail>> {
    return this.httpClient.get<Array<TicketDetail>>('/orderticketmember/'+id)
  }
}
