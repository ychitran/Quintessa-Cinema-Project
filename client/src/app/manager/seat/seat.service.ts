import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Observable } from 'rxjs';
import { Film } from 'src/app/_shared/models/film.model';
import { Room } from 'src/app/_shared/models/room.model';
import { Screening } from 'src/app/_shared/models/screening.model';
import { Seat } from 'src/app/_shared/models/seat.model';

@Injectable({
  providedIn: 'root'
})
export class SeatService {

  constructor(
    private readonly httpClient: HttpClient,
    private readonly route: ActivatedRoute
  ) { }

  getSeat(room_id): Observable<Array<Seat>> {
    return this.httpClient.get<Array<Seat>>('http://localhost:3000/seats?room_id='+room_id)
  }

  getFilm():Observable<Array<Film>> {
    return this.httpClient.get<Array<Film>>('http://localhost:3000/films')
  }

  getDate(film_id):Observable<Array<Screening>> {
    return this.httpClient.get<Array<Screening>>('http://localhost:3000/screenings?film_id=' + film_id)
  }

  getStartTime(date):Observable <Array<Screening>> {
    return this.httpClient.get<Array<Screening>>('http://localhost:3000/screenings?date=' + date)
  }
}
