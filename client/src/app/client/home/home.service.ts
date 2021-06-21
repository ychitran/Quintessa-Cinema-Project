import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Slide } from '../model/home.model';

@Injectable({
  providedIn: 'root'
})
export class HomeService {
  private apiURL: string = "https://60ce078a91cc8e00178dc6b4.mockapi.io/cinema/slide";

  constructor(
    private readonly httpClient: HttpClient
  ) { }
  getSlide(): Observable<Array<Slide>> {
    return this.httpClient.get<Array<Slide>>(this.apiURL);
  }
}
