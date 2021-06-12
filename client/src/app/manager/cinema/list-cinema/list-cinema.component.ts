import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import {HttpClient} from '@angular/common/http';
import { CinemaService } from '../cinema.service';
import { Cinema } from 'src/app/_shared/models/cinema.model';

@Component({
  selector: 'app-list-cinema',
  templateUrl: './list-cinema.component.html',
  styleUrls: ['./list-cinema.component.scss']
})
export class ListCinemaComponent implements OnInit {
  cinemas:Array<Cinema>
  constructor(
    private readonly cinemaService: CinemaService
  ) { }

  ngOnInit(): void {
    this.loadList();
  }
  loadList(keyword= ''):void  {
    this.cinemaService.getList(keyword).subscribe(res => this.cinemas = res);
  }

  remove(id):void {
    if(!confirm("Bạn có chắc muốn xóa?")) {
      return;
    } 
    this.cinemaService.remove(id).subscribe(
      res => this.loadList() 
      ,
      err => alert('Xóa thất bại')
    )
    
  }

}
