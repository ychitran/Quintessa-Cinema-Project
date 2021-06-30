import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { ActivatedRoute } from '@angular/router';
import { Observable } from 'rxjs';
import { Cinema } from 'src/app/_shared/models/cinema.model';
@Injectable({
  providedIn: 'root'
})
export class CinemaService {

  constructor(
    private readonly httpClient: HttpClient,
    private readonly route: ActivatedRoute
  ) { }

  getList(keyword:string): Observable<Array<Cinema>> {
    return this.httpClient.get<Array<Cinema>>('/admin/cinemas',{
      params: {
        q:keyword
      }
    });
  }

  getElement(id): Observable<Cinema> {
    return this.httpClient.get<Cinema>('/admin/cinemas/edit/'+id);
  }

  save(cinema : Cinema): Observable<Cinema> {
    return this.httpClient.post<Cinema>(`/admin/cinemas/add`, cinema);
  
  }

  update(id,cinema): Observable<Cinema> {
    return this.httpClient.put<Cinema>('/admin/cinemas/edit/'+id,cinema)
  }

  remove(id): Observable<any> {
    // const id = this.route.snapshot.paramMap.get("id");
    return this.httpClient.get<any>(`/admin/cinemas/`+ id)
  }
}
