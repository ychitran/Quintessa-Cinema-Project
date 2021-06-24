import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Observable } from 'rxjs';
import { Combo } from 'src/app/_shared/models/combo.model';

@Injectable({
  providedIn: 'root'
})
export class ComboService {

  constructor(
    private readonly httpClient: HttpClient,
    private readonly route: ActivatedRoute
  ) { }
  getList(keyword:string): Observable<Array<Combo>> {
    return this.httpClient.get<Array<Combo>>('http://localhost:3000/combos',{
      params: {
        q:keyword
      }
    });
  }

  getElement(id): Observable<Combo> {
    return this.httpClient.get<Combo>('http://localhost:3000/combos/' + id);
  }

  save(combo : Combo): Observable<Combo> {
    return this.httpClient.post<Combo>(`http://localhost:3000/combos/`, combo);
  
  }

  update(id,combo): Observable<Combo> {
    return this.httpClient.put<Combo>('http://localhost:3000/combos/' + id,combo)
  }

  remove(id): Observable<any> {
    // const id = this.route.snapshot.paramMap.get("id");
    return this.httpClient.delete<any>(`http://localhost:3000/combos/` + id)
  }
}
