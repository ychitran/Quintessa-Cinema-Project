import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Observable } from 'rxjs';
import { Staff } from 'src/app/_shared/models/staff.model';

@Injectable({
  providedIn: 'root'
})
export class StaffService {

  constructor(
    private readonly httpClient: HttpClient,
    private readonly route: ActivatedRoute
  ) { }

  getList(keyword:string): Observable<Array<Staff>> {
    return this.httpClient.get<Array<Staff>>('/admin/staffs');
  }

  getListSearch(keyword): Observable<Array<Staff>> {
    return this.httpClient.get<Array<Staff>>('/admin/staffs/'+keyword);
  }

  getElement(id): Observable<Staff> {
    return this.httpClient.get<Staff>('http://localhost:3000/staffs/' + id);
  }

  save(staff : Staff): Observable<Staff> {
    return this.httpClient.post<Staff>(`http://localhost:3000/staffs/`, staff);
  
  }

  update(id,staff): Observable<Staff> {
    return this.httpClient.put<Staff>('http://localhost:3000/staffs/' + id,staff)
  }

  remove(id): Observable<any> {
    // const id = this.route.snapshot.paramMap.get("id");
    return this.httpClient.delete<any>(`http://localhost:3000/staffs/` + id)
  }
}
