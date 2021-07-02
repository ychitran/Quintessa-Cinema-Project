import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Observable } from 'rxjs';
import { Cinema } from 'src/app/_shared/models/cinema.model';
import { Room } from 'src/app/_shared/models/room.model';

@Injectable({
  providedIn: 'root'
})
export class RoomService {

  constructor(
    private readonly httpClient: HttpClient,
    private readonly route: ActivatedRoute
  ) { }

  getList(keyword:string): Observable<Array<Room>> {
    return this.httpClient.get<Array<Room>>('/admin/rooms',{
      params: {
        q:keyword
      }
    });
  }

  getListProvider(): Observable<Array<Cinema>> {
    return this.httpClient.get<Array<Cinema>>('http://localhost:3000/cinemas');
  }

  getElement(id): Observable<Room> {
    return this.httpClient.get<Room>('http://localhost:3000/rooms/' + id);
  }

  save(room : Room): Observable<Room> {
    return this.httpClient.post<Room>(`http://localhost:3000/rooms/`, room);
  
  }

  update(id,room): Observable<Room> {
    return this.httpClient.put<Room>('http://localhost:3000/rooms/' + id,room)
  }

  remove(id): Observable<any> {
    // const id = this.route.snapshot.paramMap.get("id");
    return this.httpClient.delete<any>(`http://localhost:3000/rooms/` + id)
  }
}
