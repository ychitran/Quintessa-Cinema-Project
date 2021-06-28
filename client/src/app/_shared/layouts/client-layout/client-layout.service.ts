import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Film } from 'src/app/_shared/models/film.model';


@Injectable({
  providedIn: 'root'
})
export class ClientLayoutService {

  private apiURL: string = "https://60ce078a91cc8e00178dc6b4.mockapi.io/cinema/film";
  constructor(
    private readonly httpClient: HttpClient
  ) { }
getAll(): Observable<Array<Film>> {
    return this.httpClient.get<Array<Film>>(this.apiURL);
  }
 
}
