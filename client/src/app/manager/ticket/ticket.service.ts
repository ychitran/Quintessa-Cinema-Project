import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Observable } from 'rxjs';
import { Film } from 'src/app/_shared/models/film.model';
import { Room } from 'src/app/_shared/models/room.model';
import { Seat } from 'src/app/_shared/models/seat.model';
import { TicketPrice } from 'src/app/_shared/models/ticket-price.model';
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

  //Second
  getListNd():Observable<Array<TicketPrice>>{
    return this.httpClient.get<Array<TicketPrice>>('http://localhost:3000/ticket-prices')
  }

  getElement(id):Observable<TicketPrice> {
    return this.httpClient.get<TicketPrice>('http://localhost:3000/ticket-prices/'+id)
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
