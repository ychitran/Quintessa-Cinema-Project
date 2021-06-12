import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { ActivatedRoute } from '@angular/router';
import { Observable } from 'rxjs';
import { Film } from 'src/app/_shared/models/film.model';

@Injectable({
  providedIn: 'root'
})
export class FilmService {

  constructor(
    private readonly httpClient: HttpClient,
    private readonly route: ActivatedRoute
  ) { }

  getList(keyword:string): Observable<Array<Film>> {
    return this.httpClient.get<Array<Film>>('http://localhost:3000/films',{
      params: {
        q:keyword
      }
    });
  }

  getElement(id): Observable<Film> {
    return this.httpClient.get<Film>('http://localhost:3000/films/' + id);
  }

  save(film : Film): Observable<Film> {
    return this.httpClient.post<Film>(`http://localhost:3000/films/`, film);
  
  }

  update(id,film): Observable<Film> {
    return this.httpClient.put<Film>('http://localhost:3000/films/' + id,film)
  }

  remove(id): Observable<any> {
    // const id = this.route.snapshot.paramMap.get("id");
    return this.httpClient.delete<any>(`http://localhost:3000/films/` + id)
  }
}
