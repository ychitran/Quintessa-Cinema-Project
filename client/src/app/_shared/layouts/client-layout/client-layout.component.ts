import { Time } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { Film } from 'src/app/_shared/models/film.model';
import { Order } from '../../models/order.model';
import { Screening } from '../../models/screening.model';
import { Seat } from '../../models/seat.model';
import { TicketDetail } from '../../models/ticket.model';
import { ClientLayoutService } from './client-layout.service';

@Component({
  selector: 'app-client-layout',
  templateUrl: './client-layout.component.html',
  styleUrls: ['./client-layout.component.scss']
})
export class ClientLayoutComponent implements OnInit {
  // public film_name = '';
  // // public date = '';
  // public time = '';
  public_films : Array<Film>
  unpublic_films: Array<Film>
  films: Array<Film>
  film : Film
  move_name : string
  orderTicketForm : FormGroup
  orderTicket : TicketDetail 
  seats : Array<Seat> = []
  dates : Array<Screening> = []
  start_times : Array<Screening> = []
  orders : Array<Order> = []
  status: boolean = false
  date : Date
  start_time : Time
  seat = []
  screening_id: number
  count_ticket : Number

  constructor(
    private readonly clientLayoutService:ClientLayoutService,
    private formBuilder:FormBuilder,
    private route: ActivatedRoute
  ) { }

  ngOnInit(): void {
    // this.getAll();
    this.loadFilm();
    this.ticketForm();
  }
  ticketForm() {
    this.orderTicketForm = this.formBuilder.group({
      film_id:[],
      phone_number: [],
      user_id:[],
      screening_id:[],
      combo_id:[],
      discount_id:[],
      status:[],
      ticket_price:[],
      total_price:[],
      seats: [],
    })  }
  loadFilm() {
    this.clientLayoutService.getFilms().subscribe(res => this.loadFilmStatus(res))
  }
  loadFilmStatus(res): void {
    this.public_films = res.publics
    this.unpublic_films = res.unpublics
  }
  // getAll() {
  //   this.clientLayoutService.getAll().subscribe(res => { this.films = res;})
  // }

  loadScreeningDate(event):void {
    this.clientLayoutService.getDate(event).subscribe(res => this.getDateDetail(res))
  }

  loadFilmDetail(id):void{
    this.clientLayoutService.getFilm(id).subscribe(res=> this.filmDetail(res));
  }
  filmDetail(res): void {
    this.film =  res[0];
    this.move_name = this.film.global_name
    this.patchFormValue(this.film.id)
  }


  patchFormValue(id): void {
      this.orderTicketForm.patchValue({
      film_id:id,
      phone_number: null,
      user_id:null,
      screening_id:this.screening_id,
      combo_id:null,
      discount_id:null,
      status:1, 
      ticket_price:45000,
      total_price:60000,
      seats: this.seat
    })
  }

  save() {
    if(this.orderTicketForm.invalid){
      alert('Xin chọn đầy đủ thông tin vé !');
      return;
    }

    const { value } = this.orderTicketForm;

    this.clientLayoutService.save(value).subscribe(
      res =>
      alert('Đặt vé thành công'),
      err => alert('Đặt vé thất bại')      
    )
  }

  getDateDetail(res): void {
    this.dates = res;
  }

  loadStartTime(event):void {
    this.date = event;
    this.clientLayoutService.getStartTime(event).subscribe(res => this.getStartTimeDetail(res))
  }
  getStartTimeDetail(res) {
    this.start_times = res
  }

  loadSeat(room_id, screening_id,start_time):void{
    this.start_time = start_time,
    this.screening_id = screening_id,
    this.clientLayoutService.getSeat(room_id,screening_id).subscribe(res=>this.getSeatDetail(res));
  }
    getSeatDetail(res) {
    this.seats=res;
  }

  getSeatValue(event) {
    const value = event.target.value;
    this.seat.push(value);
  }

  removeSeatValue(event) {
     
    const value = event.target.value;
    for(let j = 0; j <= this.seat.length; j++) {
      if(value == this.seat[j]){
        this.seat.splice(j,1);
      }
    }
  }

  clearSeat(){
    this.seat = []
  }

  seatSelect(event) {
    if(event.target.classList.contains('seat-select')) {
      event.target.classList.remove('seat-select');
      this.removeSeatValue(event);
    } else {
      event.target.classList.add('seat-select');
      this.getSeatValue(event);
    }
  }

} 
