import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import {HttpClient} from '@angular/common/http';
import { FilmService } from '../film.service';
import { Film } from 'src/app/_shared/models/film.model';

@Component({
  selector: 'app-list-film',
  templateUrl: './list-film.component.html',
  styleUrls: ['./list-film.component.scss']
})
export class ListFilmComponent implements OnInit {
  films:Array<Film>
  constructor(

    private readonly router : Router,
    private readonly httpClient: HttpClient,
    private readonly filmService : FilmService
  ) { }

  ngOnInit(): void {
    this.loadList();
  }
  loadList(keyword= ''):void {
    this.filmService.getList(keyword).subscribe(res => this.films = res);

  }

  searchList(keyword) {
    this.filmService.searchList(keyword).subscribe(res => this.films = res)
  }

  remove(id):void {
    if(confirm("Bạn có chắc muốn xóa?")) {
      this.filmService.remove(id).subscribe(
        res => this.loadList() 
        ,
        err => alert('Xóa thất bại')
      )
    }
    
  }

}
