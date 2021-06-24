import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { Film } from 'src/app/_shared/models/film.model';
import { ListFilmService } from './list-film.service';

@Component({
  selector: 'app-list-film',
  templateUrl: './list-film.component.html',
  styleUrls: ['./list-film.component.scss']
})
export class ListFilmComponent implements OnInit {
  films: Array<Film>;

  constructor(
    private readonly listFilmService:ListFilmService
  ) { }

  ngOnInit(): void {
    this.getAll();
  }
  getAll() {
    this.listFilmService.getAll().subscribe(res => { this.films = res;})
  }
}
