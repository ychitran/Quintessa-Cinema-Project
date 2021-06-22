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
    this.getRole();
  }
  getRole() {
    throw new Error('Method not implemented.');
  }

  goToHome() {
    this.router.navigateByUrl("/admin")
  }

  goToFilm(){
    this.router.navigateByUrl("/admin/film")
  }

  goToCinema(){
    this.router.navigateByUrl("/admin/cinema")
  }

  goToScreening(){
    this.router.navigateByUrl("/admin/screening")
  }

  goToMember(){
    this.router.navigateByUrl("/admin/member")

  }

  goToStaff(){
    this.router.navigateByUrl("/admin/staff")

  }

  goToSeat(){
    this.router.navigateByUrl("/admin/seat")

  }

  goToRoom(){
    this.router.navigateByUrl("/admin/room")

  }

  goToRevenue(){
    this.router.navigateByUrl("/admin/revenue")

  }

  goToAd(){
    this.router.navigateByUrl("/admin/ad")
  }

  goToTicket() {
    this.router.navigateByUrl("/admin/ticket")
  }

  goToAds() {
    this.router.navigateByUrl("/admin/advertisement")
  }

}
