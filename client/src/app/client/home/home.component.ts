import { Component, OnInit } from '@angular/core';
import { Film } from 'src/app/_shared/models/film.model';
import { Slide } from '../model/home.model';
import { HomeService } from './home.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {
  slides: Array<Slide>
  films: Array<Film>

  constructor(
    private readonly homeService: HomeService
  ) { }

  ngOnInit(): void {
    this.getSlide();
    this.getAll();
  }
  getSlide() {
    this.homeService.getSlide().subscribe(res => { this.slides = res; })
  }
  getAll() {
    this.homeService.getAll().subscribe(res => { this.films = res;})
  }
}