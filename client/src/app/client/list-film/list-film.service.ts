import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Film } from 'src/app/_shared/models/film.model';
import { Screening } from 'src/app/_shared/models/screening.model';
import { Seat } from 'src/app/_shared/models/seat.model';
import { TicketDetail } from 'src/app/_shared/models/ticket.model';

@Injectable({
  providedIn: 'root'
})
export class ListFilmService {
  
  constructor(
    private readonly httpClient: HttpClient
  ) { }
  getSeat(room_id,screening_id): Observable<Array<Seat>> {
    return this.httpClient.get<Array<Seat>>('http://localhost:3000/seats?room_id='+room_id)
  }

  

  getFilms():Observable<Array<Film>> {
    return this.httpClient.get<Array<Film>>('/')
  }

  getFilm(id):Observable<Film> {
    return this.httpClient.get<Film>('http://localhost:3000/films?id='+id)
  }

  getDate(film_id):Observable<Array<Screening>> {
    return this.httpClient.get<Array<Screening>>('http://localhost:3000/screenings?film_id=' + film_id)
  }

  getStartTime(date):Observable <Array<Screening>> {
    return this.httpClient.get<Array<Screening>>('http://localhost:3000/screenings?date=' + date)
  }

  // getSeatDisable(screening_id): Observable<Array<Order>> {
  //   return this.httpClient.get<Array<Order>>('http://localhost:3000/orders?screening_id=' + screening_id)
  // }

  save(ticket : TicketDetail): Observable<TicketDetail> {
    return this.httpClient.post<TicketDetail>(`http://localhost:3000/tickets/`, ticket);
  
  }
}
