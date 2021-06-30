import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Film } from 'src/app/_shared/models/film.model';
import { DetailsFilmService } from './details-film.service';

@Component({
  selector: 'app-details-film',
  templateUrl: './details-film.component.html',
  styleUrls: ['./details-film.component.scss']
})
export class DetailsFilmComponent implements OnInit {
  film: Film
  films: Array<Film>

  constructor(
    private readonly route: ActivatedRoute,
    private readonly httpClient: HttpClient,
    private readonly detailsService: DetailsFilmService
  ) { }

  ngOnInit(): void {
    this.loadFilmDetails();
    this.getAll();
  }
  
  loadFilmDetails() {
    const id = this.route.snapshot.paramMap.get("id")
    this.detailsService.getFilm(id).subscribe(res => this.film = res)
  }
  getAll() {
    this.detailsService.getAll().subscribe(res => { this.films = res;})
  }


}
