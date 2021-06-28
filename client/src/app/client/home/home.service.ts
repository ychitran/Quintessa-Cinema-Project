import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Film } from 'src/app/_shared/models/film.model';
import { Slide } from '../model/home.model';

@Injectable({
  providedIn: 'root'
})
export class HomeService {
  private apiURL: string = "https://60ce078a91cc8e00178dc6b4.mockapi.io/cinema/slide";
  private filmURL: string = "https://60ce078a91cc8e00178dc6b4.mockapi.io/cinema/film";

  constructor(
    private readonly httpClient: HttpClient
  ) { }
  getSlide(): Observable<Array<Slide>> {
    return this.httpClient.get<Array<Slide>>(this.apiURL);
  }
  getAll(): Observable<Array<Film>> {
    return this.httpClient.get<Array<Film>>(this.filmURL);
  }
}
