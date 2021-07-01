import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Film } from 'src/app/_shared/models/film.model';
import { Member } from '../../models/member.model';
import { Screening } from '../../models/screening.model';
import { Seat } from '../../models/seat.model';
import { TicketPrice } from '../../models/ticket-price.model';
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



  getFilms():Observable<Array<Film>> {
    return this.httpClient.get<Array<Film>>('/')
  }

  getFilm(id):Observable<Film> {
    return this.httpClient.get<Film>('/details-film/'+id)
  }

  getDate(film_id):Observable<Array<Screening>> {
    return this.httpClient.get<Array<Screening>>('/screeningdate/' + film_id)
  }

  getStartTime(date,film_id):Observable <Array<Screening>> {
    return this.httpClient.get<Array<Screening>>('/screeningtime/' + film_id  + '/' + date)
  }

  getRoom(film_id,date, start_time):Observable<Array<Screening>> {
    return this.httpClient.get<Array<Screening>>('/screeningroom/'+ film_id + '/' + date + '/' + start_time)
  }

  getScreeningId(film_id,date, start_time,room_id):Observable<Array<Screening>> {
    return this.httpClient.get<Array<Screening>>('/screeningid/'+ film_id + '/' + date + '/' + start_time + '/' + room_id)
  }

  getSeat(room_id,screening_id):Observable<Array<Screening>> {
    return this.httpClient.get<Array<Screening>>('/screeningseat/'+ room_id + '/' + screening_id)
  }

  getFilmPrice(film_id):Observable<Array<TicketPrice>> {
    return this.httpClient.get<Array<TicketPrice>>('/film-price/'+ film_id)
  }
 

  save(cinema : TicketDetail): Observable<TicketDetail> {
    return this.httpClient.post<TicketDetail>(`/orderticket`, cinema);
  
  }


  checkUser():Observable<Member> {
    return this.httpClient.get<Member>(`/checkUser`);
  }
 
}
