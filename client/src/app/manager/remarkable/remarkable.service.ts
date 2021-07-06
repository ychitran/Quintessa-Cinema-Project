import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Observable } from 'rxjs';
import { Remarkable } from 'src/app/_shared/models/remarkable.model';

@Injectable({
  providedIn: 'root'
})
export class RemarkableService {

  constructor(
    private readonly httpClient: HttpClient,
    private readonly route: ActivatedRoute
  ) { }

  getList(): Observable<Array<Remarkable>> {
    return this.httpClient.get<Array<Remarkable>>('/admin/remarkables');
  }

  getListProvider() {
    return this.httpClient.get('/admin/remarkables/add')
  }

  getElement(id): Observable<Remarkable> {
    return this.httpClient.get<Remarkable>('/admin/remarkables/' + id);
  }

  save(remarkable : Remarkable): Observable<Remarkable> {
    return this.httpClient.post<Remarkable>(`/admin/remarkables/add`, remarkable);
  
  }

  changStatus(id,status) {
    return this.httpClient.get('/admin/remarkables/change/'+id+'/'+status);
  }

  update(id,remarkable): Observable<Remarkable> {
    return this.httpClient.put<Remarkable>('/admin/remarkables/' + id,remarkable)
  }

  remove(id): Observable<any> {
    // const id = this.route.snapshot.paramMap.get("id");
    return this.httpClient.get<any>(`/admin/remarkables/` + id)
  }
}
