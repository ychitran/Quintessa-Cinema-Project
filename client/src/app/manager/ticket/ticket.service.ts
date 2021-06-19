import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Observable } from 'rxjs';
import { Film } from 'src/app/_shared/models/film.model';
import { Room } from 'src/app/_shared/models/room.model';
import { Seat } from 'src/app/_shared/models/seat.model';
import { TicketDetail } from 'src/app/_shared/models/ticket.model';

@Injectable({
  providedIn: 'root'
})
export class TicketService {

  constructor(
    private readonly httpClient: HttpClient,
    private readonly route: ActivatedRoute
  ) { }

  getList(keyword:string): Observable<Array<TicketDetail>> {
    return this.httpClient.get<Array<TicketDetail>>('http://localhost:3000/tickets',{
      params: {
        q:keyword
      }
    });
  }

  // getSeat(room_id): Observable<Array<Seat>> {
  //   return this.httpClient.get<Array<Seat>>('http://localhost:3000/seats?room_id='+room_id)
  // }

  // getFilm():Observable<Array<Film>> {
  //   return this.httpClient.get<Array<Film>>('http://localhost:3000/films')
  // }
  
  // getRoom():Observable<Array<Room>> {
  //   return this.httpClient.get<Array<Room>>('http://localhost:3000/rooms')
  // }
}
