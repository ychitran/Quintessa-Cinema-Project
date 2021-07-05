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
    return this.httpClient.get<Array<Combo>>('/admin/combos');
  }

  getElement(id): Observable<Combo> {
    return this.httpClient.get<Combo>('/admin/combos/edit/' + id);
  }

  save(combo): Observable<Combo> {
    return this.httpClient.post<Combo>(`/admin/combos/add`, combo);
  
  }

  update(id,combo): Observable<Combo> {
    return this.httpClient.put<Combo>('/admin/combos/edit/' + id ,combo)
  }

  remove(id): Observable<any> {
    // const id = this.route.snapshot.paramMap.get("id");
    return this.httpClient.get<any>(`/admin/combos/delete/` + id)
  }
}
