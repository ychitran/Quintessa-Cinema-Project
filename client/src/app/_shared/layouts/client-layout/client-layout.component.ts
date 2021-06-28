import { Component, OnInit } from '@angular/core';
import { Film } from 'src/app/_shared/models/film.model';
import { ClientLayoutService } from './client-layout.service';

@Component({
  selector: 'app-client-layout',
  templateUrl: './client-layout.component.html',
  styleUrls: ['./client-layout.component.scss']
})
export class ClientLayoutComponent implements OnInit {
  public film_name = '';
  public date = '';
  public time = '';
  films : Array<Film>;

  constructor(
    private readonly clientLayoutService:ClientLayoutService
  ) { }

  ngOnInit(): void {
    this.getAll();
  }
  getAll() {
    this.clientLayoutService.getAll().subscribe(res => { this.films = res;})
  }

} 
