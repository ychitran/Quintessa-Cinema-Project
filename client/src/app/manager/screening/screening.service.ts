import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Observable } from 'rxjs';
import { Film } from 'src/app/_shared/models/film.model';
import { Room } from 'src/app/_shared/models/room.model';
import { Screening } from 'src/app/_shared/models/screening.model';

@Injectable({
  providedIn: 'root'
})
export class ScreeningService {

  constructor(
    private readonly httpClient: HttpClient,
    private readonly route: ActivatedRoute
  ) { }

  getList(keyword:string): Observable<Array<Screening>> {
    return this.httpClient.get<Array<Screening>>('http://localhost:3000/screenings',{
      params: {
        q:keyword
      }
    });
  }

  getListProvider(): Observable<Array<Film>> {
    return this.httpClient.get<Array<Film>>('http://localhost:3000/films');
  }

  getListProviderNd(): Observable<Array<Room>> {
    return this.httpClient.get<Array<Room>>('http://localhost:3000/rooms');
  }

  getListAfterProvider(id):Observable<Array<Screening>> {
    return this.httpClient.get<Array<Screening>>('http://localhost:3000/screenings?film_id=' + id)
  }

  getElement(id): Observable<Screening> {
    return this.httpClient.get<Screening>('http://localhost:3000/rooms/' + id);
  }

  save(screening : Screening): Observable<Screening> {
    return this.httpClient.post<Screening>(`http://localhost:3000/screenings/`, screening);
  
  }

  update(id,screening): Observable<Screening> {
    return this.httpClient.put<Screening>('http://localhost:3000/screenings/' + id,screening)
  }

  remove(id): Observable<any> {
    // const id = this.route.snapshot.paramMap.get("id");
    return this.httpClient.delete<any>(`http://localhost:3000/screenings/` + id)
  }
}
