import { Component, OnInit } from '@angular/core';
import { Member } from 'src/app/_shared/models/member.model';
import { MemberService } from '../member.service';

@Component({
  selector: 'app-list',
  templateUrl: './list.component.html',
  styleUrls: ['./list.component.scss']
})
export class ListComponent implements OnInit {
  members: Array<Member>
  constructor(
    private readonly memberService: MemberService
  ) { }

  ngOnInit(): void {
    this.loadList();
  }

  loadList(keyword= ''):void  {
    this.memberService.getList(keyword).subscribe(res => this.members = res);
  }

  remove(id):void {
    if(!confirm("Bạn có chắc muốn xóa?")) {
      return;
    } 
    this.memberService.remove(id).subscribe(
      res => this.loadList() 
      ,
      err => alert('Xóa thất bại')
    )
    
  }

}
