import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Film } from 'src/app/_shared/models/film.model';

@Injectable({
  providedIn: 'root'
})
export class DetailsFilmService {

  constructor(
    private readonly httpClient: HttpClient
  ) { }

  getFilm(id): Observable<Film> {
    return this.httpClient.get<Film>('https://60ce078a91cc8e00178dc6b4.mockapi.io/cinema/film/' + id);
  }
}
