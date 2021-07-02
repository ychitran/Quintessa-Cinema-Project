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
    return this.httpClient.get<Array<Screening>>('/admin/screenings');
  }

  getListProvider(): Observable<Array<Film>> {
    return this.httpClient.get<Array<Film>>('/admin/films/status');
  }

  getListProviderNd(): Observable<Array<Room>> {
    return this.httpClient.get<Array<Room>>('/admin/rooms');
  }

  getListAfterProvider(film_id):Observable<Array<Screening>> {
    return this.httpClient.get<Array<Screening>>('/admin/screenings/'+  film_id)
  }

  getElement(id): Observable<Screening> {
    return this.httpClient.get<Screening>('/admin/screenings/edit/' + id);
  }

  create():any {
    return this.httpClient.get<any>(`/admin/screenings/add/`);
  }

  save(screening : Screening): Observable<Screening> {
    return this.httpClient.post<Screening>(`/admin/screenings/add`, screening);
  
  }

  update(id,screening): Observable<Screening> {
    return this.httpClient.put<Screening>('/admin/screenings/edit/' + id,screening)
  }

  remove(id): Observable<any> {
    // const id = this.route.snapshot.paramMap.get("id");
    return this.httpClient.get<any>(`/admin/screenings/delete/` + id)
  }
}
