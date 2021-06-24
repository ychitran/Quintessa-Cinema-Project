import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { Film } from 'src/app/client/model/film.model';
import { Room } from 'src/app/_shared/models/room.model';
import { ScreeningService } from '../screening.service';

@Component({
  selector: 'app-add',
  templateUrl: './add.component.html',
  styleUrls: ['./add.component.scss']
})
export class AddComponent implements OnInit {
  addScreeningForm:FormGroup;
  films : Array<Film>;
  rooms: Array<Room>
  constructor(
    private readonly screeningService:ScreeningService,
    private readonly route: ActivatedRoute,
    private readonly formBuilder:FormBuilder
  ) { }

  ngOnInit(): void {
    this.addScreeningForm = this.formBuilder.group({
      date: ["",[Validators.required]],
      start_time: ["",[Validators.required]],
      film_id: [this.loadList(),[Validators.required]],
      room_id: [this.loadListNd(),[Validators.required]]

    })
  }

  loadList():void {
    this.screeningService.getListProvider().subscribe(res => this.films = res);
  }

  loadListNd():void {
    this.screeningService.getListProviderNd().subscribe(res=>this.rooms = res);
  }

  save() {
    if(this.addScreeningForm.invalid){
      alert('Thêm mới thất bại');
      return;
    }

    const { value } = this.addScreeningForm;

    this.screeningService.save(value).subscribe(
      res =>
      alert('Thêm mới thành công'),
      err => alert('Thêm mới thất bại')      
    )
  }

}
