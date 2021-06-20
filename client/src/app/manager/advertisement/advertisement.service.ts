import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Observable } from 'rxjs';
import { Advertisement } from 'src/app/_shared/models/advertisement.model';

@Injectable({
  providedIn: 'root'
})
export class AdvertisementService {

  constructor(
    private readonly httpClient: HttpClient,
    private readonly route: ActivatedRoute
  ) { }

  getList(keyword:string): Observable<Array<Advertisement>> {
    return this.httpClient.get<Array<Advertisement>>('http://localhost:3000/advertisements',{
      params: {
        q:keyword
      }
    });
  }

  getElement(id): Observable<Advertisement> {
    return this.httpClient.get<Advertisement>('http://localhost:3000/advertisements/' + id);
  }

  save(ad : Advertisement): Observable<Advertisement> {
    return this.httpClient.post<Advertisement>(`http://localhost:3000/advertisements/`, ad);
  
  }

  update(id,ad): Observable<Advertisement> {
    return this.httpClient.put<Advertisement>('http://localhost:3000/advertisements/' + id,ad)
  }

  remove(id): Observable<any> {
    // const id = this.route.snapshot.paramMap.get("id");
    return this.httpClient.delete<any>(`http://localhost:3000/advertisements/` + id)
  }
}
