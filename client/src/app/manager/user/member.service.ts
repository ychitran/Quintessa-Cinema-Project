import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Observable } from 'rxjs';
import { Member } from 'src/app/_shared/models/member.model';

@Injectable({
  providedIn: 'root'
})
export class MemberService {

  constructor(

    private readonly httpClient: HttpClient,
    private readonly route: ActivatedRoute
  ) { }

  getList(keyword:string): Observable<Array<Member>> {
    return this.httpClient.get<Array<Member>>('http://localhost:3000/members',{
      params: {
        q:keyword
      }
    });
  }

  getElement(id): Observable<Member> {
    return this.httpClient.get<Member>('http://localhost:3000/members/' + id);
  }

  save(member : Member): Observable<Member> {
    return this.httpClient.post<Member>(`http://localhost:3000/members/`, member);
  
  }

  update(id,member): Observable<Member> {
    return this.httpClient.put<Member>('http://localhost:3000/members/' + id,member)
  }

  remove(id): Observable<any> {
    // const id = this.route.snapshot.paramMap.get("id");
    return this.httpClient.delete<any>(`http://localhost:3000/member/` + id)
  }
}
