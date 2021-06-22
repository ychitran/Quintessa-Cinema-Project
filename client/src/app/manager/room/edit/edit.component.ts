import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { Room } from 'src/app/_shared/models/room.model';
import { RoomService } from '../room.service';

@Component({
  selector: 'app-edit',
  templateUrl: './edit.component.html',
  styleUrls: ['./edit.component.scss']
})
export class EditComponent implements OnInit {
  room : Room
  editRoomForm: FormGroup
  constructor( private readonly route:ActivatedRoute,
    private readonly roomService : RoomService  ,
    private readonly formBuilder: FormBuilder,) { }

    ngOnInit(): void {
      const id = this.route.snapshot.paramMap.get("id")
      this.roomService.getElement(id).subscribe(
        res => this.loadRoomValue(res)
  
      )
    }
    loadRoomValue(room: Room): void {
      this.editRoomForm = this.formBuilder.group({
        room_name: [room.room_name,[Validators.required]],
        cinema_id: [room.cinema_id,[Validators.required]]
      })
    }
  
    update() {
      if(this.editRoomForm.invalid){
        alert('Dữ liệu không hợp lệ !');
        return;
      }
  
      const { value } = this.editRoomForm;
      const id = this.route.snapshot.paramMap.get('id')
  
      this.roomService.update(id,value).subscribe(
        res =>
        alert('Chỉnh sửa thành công'),
        err => alert('Chỉnh sửa thất bại')      
      )
    }

}
