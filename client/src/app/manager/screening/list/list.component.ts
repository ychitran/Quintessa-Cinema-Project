import { Component, OnInit } from '@angular/core';
import { Film } from 'src/app/_shared/models/film.model';
import { Screening } from 'src/app/_shared/models/screening.model';
import { ScreeningService } from '../screening.service';

@Component({
  selector: 'app-list',
  templateUrl: './list.component.html',
  styleUrls: ['./list.component.scss']
})
export class ListComponent implements OnInit {
  screenings : Array<Screening>
  films : Array<Film>
  constructor(
    private readonly screeningService: ScreeningService
  ) { }

  ngOnInit(): void {
    this.loadListFilm()
    this.loadList()
  }

  loadList(keyword= ''):void  {
    this.screeningService.getList(keyword).subscribe(res => this.screenings = res);
  }

  loadListFilm():void {
    this.screeningService.getListProvider().subscribe(res => this.films = res);
  }

  loadListProvider(event):void {
    this.screeningService.getListAfterProvider(event).subscribe(res=> this.loadListDetail(res))
  }
  
  loadListDetail(res): void {
    this.screenings = res
  }

  remove(id):void {
    if(!confirm("Bạn có chắc muốn xóa?")) {
      return;
    } 
    this.screeningService.remove(id).subscribe(
      res => this.loadList() 
      ,
      err => alert('Xóa thất bại')
    )
    
  }

}
