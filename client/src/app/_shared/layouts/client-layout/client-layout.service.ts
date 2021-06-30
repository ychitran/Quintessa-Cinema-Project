import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Film } from 'src/app/_shared/models/film.model';
import { Screening } from '../../models/screening.model';
import { Seat } from '../../models/seat.model';
import { TicketDetail } from '../../models/ticket.model';


@Injectable({
  providedIn: 'root'
})
export class ClientLayoutService {

  // private apiURL: string = "https://60ce078a91cc8e00178dc6b4.mockapi.io/cinema/film";
  constructor(
    private readonly httpClient: HttpClient
  ) { }
// getAll(): Observable<Array<Film>> {
//     return this.httpClient.get<Array<Film>>(this.apiURL);
//   }

  getSeat(room_id,screening_id): Observable<Array<Seat>> {
    return this.httpClient.get<Array<Seat>>('/'+room_id)
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
