import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-admin-layout',
  templateUrl: './admin-layout.component.html',
  styleUrls: ['./admin-layout.component.scss',
]
})
export class AdminLayoutComponent implements OnInit {

  constructor(
    private readonly router: Router
  ) { }

  ngOnInit(): void {
  }
  

  goToHome() {
    this.router.navigateByUrl("/admin")
  }

  goToFilm(){
    this.router.navigateByUrl("/admin/films")
  }

  goToCinema(){
    this.router.navigateByUrl("/admin/cinemas")
  }

  goToScreening(){
    this.router.navigateByUrl("/admin/screenings")
  }

  goToMember(){
    this.router.navigateByUrl("/admin/members")

  }

  goToStaff(){
    this.router.navigateByUrl("/admin/staffs")

  }

  goToSeat(){
    this.router.navigateByUrl("/admin/seats")

  }

  goToRoom(){
    this.router.navigateByUrl("/admin/rooms")

  }

  goToRevenue(){
    this.router.navigateByUrl("/admin/revenues")

  }

  goToAd(){
    this.router.navigateByUrl("/admin/advs")
  }

  goToTicket() {
    this.router.navigateByUrl("/admin/tickets")
  }

  goToAds() {
    this.router.navigateByUrl("/admin/advertisements")
  }

}
