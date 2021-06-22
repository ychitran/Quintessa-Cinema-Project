import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Cinema } from 'src/app/_shared/models/cinema.model';
import { Room } from 'src/app/_shared/models/room.model';
import { RoomService } from '../room.service';

@Component({
  selector: 'app-add',
  templateUrl: './add.component.html',
  styleUrls: ['./add.component.scss']
})
export class AddComponent implements OnInit {
 room: Room
 cinemas: Array<Cinema>
 addRoomForm: FormGroup
  constructor(
    private readonly formBuilder: FormBuilder,
    private readonly roomService: RoomService
  ) { }

  ngOnInit(): void {
    this.addRoomForm = this.formBuilder.group({
      room_name: ["",[Validators.required]],
      cinema_id: [this.loadListProvider(),[Validators.required]]
    })
  }

  loadListProvider() {
    this.roomService.getListProvider().subscribe(res => this.loadListDetail(res));
  
  }
  loadListDetail(res) {
   this.cinemas=res;
  }

  save() {
    if(this.addRoomForm.invalid){
      alert('Thêm mới thất bại');
      return;
    }

    const { value } = this.addRoomForm;

    this.roomService.save(value).subscribe(
      res =>
      alert('Thêm mới thành công'),
      err => alert('Thêm mới thất bại')      
    )
  }

}
