import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { Film } from 'src/app/_shared/models/film.model';
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
    private readonly formBuilder:FormBuilder,
    private router: Router
  ) { }

  ngOnInit(): void {
    this.addScreeningForm = this.formBuilder.group({
      date: ["",[Validators.required]],
      start_time: ["",[Validators.required]],
      film_id: [,[Validators.required]],
      room_id: [,[Validators.required]]

    })
    this.loadList()
    this.loadListNd()
  }

  loadList():void {
    this.screeningService.getListProvider().subscribe(res => this.getListFilm(res));
  }
  getListFilm(res): void {
    this.films = res.publics;
  }

  loadListNd():void {
    this.screeningService.getListProviderNd().subscribe(res=>this.rooms = res);
  }

  save() {
    if(this.addScreeningForm.invalid){
      alert('Dữ liệu không hợp lệ');
      return;
    }

    const { value } = this.addScreeningForm;

    this.screeningService.save(value).subscribe(
      res =>{
        alert('Thêm mới thành công')
        this.router.navigateByUrl('/admin/cinemas')
      }
      ,
      err => alert('Thêm mới thất bại')      
    )
  }

}
