import { Component, OnInit } from '@angular/core';
import { Slide } from '../model/home.model';
import { HomeService } from './home.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {
  slides: Array<Slide>

  constructor(
    private readonly homeService: HomeService
  ) { }

  ngOnInit(): void {
    this.getSlide();
  }
  getSlide() {
    this.homeService.getSlide().subscribe(res => { this.slides = res; })
  }
}