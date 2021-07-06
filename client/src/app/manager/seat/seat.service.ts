import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Observable } from 'rxjs';
import { Cinema } from 'src/app/_shared/models/cinema.model';
import { Combo } from 'src/app/_shared/models/combo.model';
import { Film } from 'src/app/_shared/models/film.model';
import { Member } from 'src/app/_shared/models/member.model';
import { Order } from 'src/app/_shared/models/order.model';
import { Room } from 'src/app/_shared/models/room.model';
import { Screening } from 'src/app/_shared/models/screening.model';
import { Seat } from 'src/app/_shared/models/seat.model';
import { TicketPrice } from 'src/app/_shared/models/ticket-price.model';
import { TicketDetail } from 'src/app/_shared/models/ticket.model';

@Injectable({
  providedIn: 'root'
})
export class SeatService {

  constructor(
    private readonly httpClient: HttpClient,
    private readonly route: ActivatedRoute
  ) { }

  getUser(keyword):Observable<Member> {
    return this.httpClient.get<Member>('/admin/orders/user/'+keyword);
  }

  getFilms():Observable<Array<Film>> {
    return this.httpClient.get<Array<Film>>('/admin/orders/films')
  }

  getCombos():Observable<Array<Combo>> {
    return this.httpClient.get<Array<Combo>>('/products')
  }

  getComboDetail(id):Observable<Combo> {
    return this.httpClient.get<Combo>('/products/'+id)
  }

  getFilm(id):Observable<Film> {
    return this.httpClient.get<Film>('/admin/orders/details-film/'+id)
  }

  getDate(film_id):Observable<Array<Screening>> {
    return this.httpClient.get<Array<Screening>>('/admin/orders/screeningdate/' + film_id)
  }

  getStartTime(date,film_id):Observable <Array<Screening>> {
    return this.httpClient.get<Array<Screening>>('/admin/orders/screeningtime/' + film_id  + '/' + date)
  }

  getRoom(film_id,date, start_time):Observable<Array<Screening>> {
    return this.httpClient.get<Array<Screening>>('/admin/orders/screeningroom/'+ film_id + '/' + date + '/' + start_time)
  }

  getScreeningId(film_id,date, start_time,room_id):Observable<Array<Screening>> {
    return this.httpClient.get<Array<Screening>>('/admin/orders/screeningid/'+ film_id + '/' + date + '/' + start_time + '/' + room_id )
  }

  getSeat(room_id,screening_id):Observable<Array<Screening>> {
    return this.httpClient.get<Array<Screening>>('/admin/orders/screeningseat/'+ room_id + '/' + screening_id)
  }

  getFilmPrice(film_id):Observable<Array<TicketPrice>> {
    return this.httpClient.get<Array<TicketPrice>>('/admin/orders/film-price/'+ film_id)
  }
 

  save(cinema : TicketDetail): Observable<TicketDetail> {
    return this.httpClient.post<TicketDetail>(`/admin/orders/orderticket`, cinema);
  
  }
}
