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
    return this.httpClient.get<Array<Cinema>>('http://localhost:3000/cinemas',{
      params: {
        q:keyword
      }
    });
  }

  getElement(id): Observable<Cinema> {
    return this.httpClient.get<Cinema>('http://localhost:3000/cinemas/' + id);
  }

  save(cinema : Cinema): Observable<Cinema> {
    return this.httpClient.post<Cinema>(`http://localhost:3000/cinemas/`, cinema);
  
  }

  update(id,cinema): Observable<Cinema> {
    return this.httpClient.put<Cinema>('http://localhost:3000/cinemas/' + id,cinema)
  }

  remove(id): Observable<any> {
    // const id = this.route.snapshot.paramMap.get("id");
    return this.httpClient.delete<any>(`http://localhost:3000/cinemas/` + id)
  }
}
