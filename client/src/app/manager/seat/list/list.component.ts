import { Component, OnInit } from '@angular/core';
import { Film } from 'src/app/_shared/models/film.model';
import { Room } from 'src/app/_shared/models/room.model';
import { Screening } from 'src/app/_shared/models/screening.model';
import { Seat } from 'src/app/_shared/models/seat.model';
import { SeatService } from '../seat.service';

@Component({
  selector: 'app-list',
  templateUrl: './list.component.html',
  styleUrls: ['./list.component.scss']
})
export class ListComponent implements OnInit {
  films : Array<Film>
  seats : Array<Seat> = []
  dates : Array<Screening> = []
  start_times : Array<Screening> = []
  constructor(
    private readonly seatService: SeatService
  ) { }

  ngOnInit(): void {
    this.loadFilm();
  }
  loadFilm():void {
    this.seatService.getFilm().subscribe(res=>this.films =res)
  }

  loadScreeningDate(event):void {
    this.seatService.getDate(event).subscribe(res => this.getDateDetail(res))
  }
  getDateDetail(res): void {
    this.dates = res
  }

  loadStartTime(event):void {
    this.seatService.getStartTime(event).subscribe(res => this.getStartTimeDetail(res))
  }
  getStartTimeDetail(res) {
    this.start_times = res
  }

  loadSeat(event):void{
    this.seatService.getSeat(event).subscribe(res=>this.getSeatDetail(res));
    // console.log(this.trips);
  }
    getSeatDetail(res) {
    this.seats=res;
    // console.log(this.trips);
  }

}
