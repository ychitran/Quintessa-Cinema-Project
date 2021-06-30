import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Film } from 'src/app/_shared/models/film.model';

@Injectable({
  providedIn: 'root'
})
export class DetailsFilmService {
  private filmURL: string = "https://60ce078a91cc8e00178dc6b4.mockapi.io/cinema/film";

  constructor(
    private readonly httpClient: HttpClient
  ) { }

  getFilm(id): Observable<Film> {
    return this.httpClient.get<Film>('https://60ce078a91cc8e00178dc6b4.mockapi.io/cinema/film/' + id);
  }
  getAll(): Observable<Array<Film>> {
    return this.httpClient.get<Array<Film>>(this.filmURL);
  }
}
