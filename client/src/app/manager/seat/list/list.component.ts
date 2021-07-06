import { Time } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { Cinema } from 'src/app/_shared/models/cinema.model';
import { Combo } from 'src/app/_shared/models/combo.model';
import { Film } from 'src/app/_shared/models/film.model';
import { Member } from 'src/app/_shared/models/member.model';
import { Order } from 'src/app/_shared/models/order.model';
import { Room } from 'src/app/_shared/models/room.model';
import { Screening } from 'src/app/_shared/models/screening.model';
import { Seat } from 'src/app/_shared/models/seat.model';
import { TicketDetail } from 'src/app/_shared/models/ticket.model';
import { SeatService } from '../seat.service';

@Component({
  selector: 'app-list',
  templateUrl: './list.component.html',
  styleUrls: ['./list.component.scss']
})
export class ListComponent implements OnInit {
  public_films : Array<Film>
  unpublic_films: Array<Film>
  films: Array<Film>
  film : Film
  combos: Array<Combo>
  film_id : number
  move_name : string
  orderTicketForm : FormGroup
  orderTicket : TicketDetail 
  seats : Array<Seat> = []
  dates : Array<Screening> = []
  start_times : Array<Screening> = []
  rooms: Array<Screening> = []
  orders : Array<Order> = []

  status: boolean = false
  date : Date
  start_time : Time
  seat = []
  screening_id: number
  combo_id:number
  combo_name:string
  combo_price:number
  count_ticket : Number
  room_id:number
  format_price: number
  total_price: number = 0;
  seat_id = []
  user_id :number

  member : Member
  check_auth :true
  constructor(
    private readonly seatService:SeatService,
    private formBuilder:FormBuilder,
    private route: ActivatedRoute,
    private readonly router: Router

  ) { }

  ngOnInit(): void {
    // this.getAll();
    this.loadFilm();
    this.ticketForm();
    // this.loadCombo();
  }

  loadCombo() {
    this.seatService.getCombos().subscribe(res =>this.getProductList(res));
  }
  getProductList(res): void {
    this.combos = res.data;
  }
  

  searchUser(event): void {
    this.seatService.getUser(event).subscribe(res => this.getUserInfo(res))
  }
  getUserInfo(res): void {
    console.log(res)
    this.member = res;
  }

  ticketForm() {
    this.orderTicketForm = this.formBuilder.group({
      film_id:[],
      user_id:[],
      screening_id:[],
      discount_id:[],
      status:[],
      total_price:[],
      seats: [],
      seat_id: [],
    })  
  }
  
  loadFilm() {
    this.seatService.getFilms().subscribe(res => this.loadFilmStatus(res))
  }
  loadFilmStatus(res): void {
    this.public_films = res.publics
    this.unpublic_films = res.unpublics
  }
  // getAll() {
  //   this.seatService.getAll().subscribe(res => { this.films = res;})
  // }

  getProductDetail(event):void {
    this.combo_id = event
    this.seatService.getComboDetail(event).subscribe(res => this.loadProductDetail(res))
  }
  loadProductDetail(res): void {
    this.combo_name = res.product_name;
    this.combo_price = res.product_value;
  }

  loadScreeningDate(event):void {
    this.film_id = event
    this.dates = []
    this.seatService.getDate(event).subscribe(res => this.getDateDetail(res))
    this.seatService.getFilmPrice(event).subscribe(res => this.getPrice(res))
  }
  getPrice(res){
    this.format_price = res;
  }

  loadFilmDetail(id):void{
    this.seatService.getFilm(id).subscribe(res=> this.filmDetail(res));
  }
  filmDetail(res): void {
    this.film =  res;
    this.move_name = this.film.global_name
  }


  patchFormValue(id,screening_id,combo_id,combo_price,total_price,seat,seat_id,member): void {
      this.orderTicketForm.patchValue({
      film_id:id,
      user_id:member.id,
      screening_id:screening_id,
      discount_id:null,
      status:0, 
      total_price:total_price,
      seats: seat,
      seat_id : seat_id
        })
  }

  

  save() {
    if(this.orderTicketForm.invalid){
      alert('Xin chọn đầy đủ thông tin vé !');
      return;
    }

    const { value } = this.orderTicketForm;
    let string = ''
    for(let i=0; i< value.seats.length;i++) {
      string =  value.seats[i]+ ' ' + string ;
    }
    value.seats = string
    this.seatService.save(value).subscribe(
      res =>{
        alert('Đặt vé thành công')
          
        this.router.navigateByUrl('/list-film')
      }
      ,
      err => alert('Đặt vé thất bại')      
    )
  }

  getDateDetail(res): void {
    this.dates = res;
  }

  loadStartTime(event):void {
    this.date = event
    this.start_times = []
    this.seatService.getStartTime(event,this.film_id).subscribe(res => this.getStartTimeDetail(res))
  }
  getStartTimeDetail(res) {
    this.start_times = res
  }

  loadRoom(start_time) {
    this.rooms = []
    this.start_time = start_time
    this.seatService.getRoom(this.film_id,this.date,start_time).subscribe(res => this.getRoomList(res))
  }
  getRoomList(res): void {
    this.rooms = res;
  }

  loadScreeningId(room_id) {
    this.room_id = room_id
    this.seatService.getScreeningId(this.film_id,this.date,this.start_time,room_id).subscribe(res => this.getScreeningId(res))
  }
  getScreeningId(res): void {
    this.screening_id = res.id
    this.loadSeat(this.screening_id,this.room_id)
  }


  loadSeat(screening_id,room_id):void{
    this.seatService.getSeat(room_id,screening_id).subscribe(res=>this.getSeatDetail(res));
  }
    getSeatDetail(res) {
    this.seats=res;
  }

  // disableSeat(seat_id) {
    
  // }

  getSeatValue(event,seat_id) {
    const value = event.target.value;
    this.seat.push(value);
    this.seat_id.push(seat_id);
    this.total_price = this.format_price * this.seat.length
  }

  removeSeatValue(event,seat_id) {
     
    const value = event.target.value;
    for(let j = 0; j <= this.seat.length; j++) {
      if(value == this.seat[j]){
        this.seat.splice(j,1);
      }
    };
    for(let i = 0; i <= this.seat_id.length; i++) {
      if(seat_id == this.seat_id[i]){
        this.seat_id.splice(i,1);
      }
    }

  }

  clearSeat(){
    for(let i = 0;i<this.seat.length;i++){
      const seat_select = document.getElementById('seatSelected')
      seat_select.classList.remove('seat-select')
    }
    this.seat = []
    this.total_price = 0
  }

  seatSelect(event,seat_id) {
    if(event.target.classList.contains('seat-select')) {
      event.target.classList.remove('seat-select');
      this.removeSeatValue(event,seat_id);
    } else {
      event.target.classList.add('seat-select');
      this.getSeatValue(event,seat_id);
      this.patchFormValue(this.film.id,this.screening_id,this.combo_id,this.combo_price,this.total_price,this.seat,this.seat_id,this.member)
    }
  }
}
