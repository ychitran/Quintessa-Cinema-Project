import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Observable } from 'rxjs';
import { AdvertisementRevenue } from 'src/app/_shared/models/advertisement-revenue.model';
import { ComboRevenue } from 'src/app/_shared/models/combo-revenue.model';
import { FilmRevenue } from 'src/app/_shared/models/film-revenue.model';
import { MonthlyRevenue } from 'src/app/_shared/models/monthly-revenue.model';

@Injectable({
  providedIn: 'root'
})
export class RevenueService {

  constructor(
    private httpClient:HttpClient,
    private route:ActivatedRoute
  ) { }

  getMonthRevenList(keyword:string):Observable<Array<MonthlyRevenue>> {
    return this.httpClient.get<Array<MonthlyRevenue>>('/admin/revenues', {
      params: {
        q : keyword
      }
    });
  }

  getFilmRevenList(monthly_id): Observable<Array<FilmRevenue>> {
    return this.httpClient.get<Array<FilmRevenue>>('/admin/revenues/films/' + monthly_id)
  }

  getComboRevenList(monthly_id): Observable<Array<ComboRevenue>> {
    return this.httpClient.get<Array<ComboRevenue>>('/admin/revenues/combos/' + monthly_id)
  }

  getAdvRevenList(monthly_id): Observable<Array<AdvertisementRevenue>> {
    return this.httpClient.get<Array<AdvertisementRevenue>>('http://localhost:3000/adv_revenues?monthly_id=' + monthly_id)
  }
  
}
