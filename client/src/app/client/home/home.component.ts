import { Time } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { Film } from 'src/app/_shared/models/film.model';
import { Order } from 'src/app/_shared/models/order.model';
import { Remarkable } from 'src/app/_shared/models/remarkable.model';
import { Screening } from 'src/app/_shared/models/screening.model';
import { Seat } from 'src/app/_shared/models/seat.model';
import { TicketDetail } from 'src/app/_shared/models/ticket.model';
// import { Slide } from '../model/home.model';
import { HomeService } from './home.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {
  // slides: Array<Slide>

  public_films : Array<Film>
  unpublic_films: Array<Film>
  remarkables: Array<Remarkable>

  constructor(
    private readonly homeService: HomeService,
    private formBuilder: FormBuilder,
    private route: ActivatedRoute
  ) { }

  ngOnInit(): void {
    // this.getSlide();
    this.remarkablesValue()
    this.loadFilm();
  }
  remarkablesValue() {
    this.homeService.getRemarkable().subscribe(res => this.loadRemarkableValue(res));
  }
  loadRemarkableValue(res): void {
    this.remarkables = res;
  }
  loadFilm() {
  this.homeService.getFilms().subscribe(res => this.loadFilmStatus(res))
  }
  loadFilmStatus(res): void {
    this.public_films = res.publics
    this.unpublic_films = res.unpublics
  }
  
  // getSlide() {
  //   this.homeService.getSlide().subscribe(res => { this.slides = res; })
  // }

}