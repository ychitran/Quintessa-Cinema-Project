import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Member } from 'src/app/_shared/models/member.model';
import { TicketDetail } from 'src/app/_shared/models/ticket.model';
import { ProfileService } from './profile.service';

@Component({
  selector: 'app-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.scss']
})
export class ProfileComponent implements OnInit {
  profile: Member
  tickets : Array<TicketDetail>
  constructor(
    private readonly route:ActivatedRoute,
    private readonly profileService: ProfileService
  ) { }

  ngOnInit(): void {
    this.profileService.getProfile(3).subscribe(res =>this.loadProfile(res))
  }
  loadProfile(res): void {
    this.profile = res;
  }

  loadOrderTicket(id) {
    this.profileService.getOrderTicketList(id).subscribe(res => this.loadListTicket(res))
  }
  loadListTicket(res): void {
    this.tickets = res;
  }

  

}
