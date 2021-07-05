import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { ActivatedRoute } from '@angular/router';
import { Observable } from 'rxjs';
import { Film } from 'src/app/_shared/models/film.model';
import { FormatFilm } from 'src/app/_shared/models/format-film.model';

@Injectable({
  providedIn: 'root'
})
export class FilmService {

  constructor(
    private readonly httpClient: HttpClient,
    private readonly route: ActivatedRoute
  ) { }

  getList(keyword:string): Observable<Array<Film>> {
    return this.httpClient.get<Array<Film>>('/admin/films');
  }

  getInformation():Observable<Array<FormatFilm>> {
    return this.httpClient.get<Array<FormatFilm>>('/admin/films/add');
  }
  // ,{
  //   params: {
  //     q:keyword
  //   }
  // }

  searchList(keyword): Observable<Array<Film>> {
    return this.httpClient.get<Array<Film>>('/admin/films/search/'+keyword);
  } 

  getElement(id): Observable<Film> {
    return this.httpClient.get<Film>('/admin/films/edit/' + id);
  }

  save(film : Film): Observable<Film> {
    return this.httpClient.post<Film>(`/admin/films/add`, film);
  
  }

  update(id,film): Observable<Film> {
    return this.httpClient.put<Film>('/admin/films/edit/' + id,film)
  }

  remove(id): Observable<any> {
    // const id = this.route.snapshot.paramMap.get("id");
    return this.httpClient.get<any>(`/admin/films/` + id)
  }
}
