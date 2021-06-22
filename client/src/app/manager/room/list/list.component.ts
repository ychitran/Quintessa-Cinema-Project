import { Component, OnInit } from '@angular/core';
import { Room } from 'src/app/_shared/models/room.model';
import { RoomService } from '../room.service';

@Component({
  selector: 'app-list',
  templateUrl: './list.component.html',
  styleUrls: ['./list.component.scss']
})
export class ListComponent implements OnInit {
  rooms: Array<Room>
  constructor(
    private readonly roomService: RoomService
  ) { }

  ngOnInit(): void {
    this.loadList();
  }
  loadList(keyword= ''):void  {
    this.roomService.getList(keyword).subscribe(res => this.rooms = res);
  }

  remove(id):void {
    if(!confirm("Bạn có chắc muốn xóa?")) {
      return;
    } 
    this.roomService.remove(id).subscribe(
      res => this.loadList() 
      ,
      err => alert('Xóa thất bại')
    )
    
  }

}
