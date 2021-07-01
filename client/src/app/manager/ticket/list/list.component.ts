import { Component, OnInit } from '@angular/core';
import { TicketDetail } from 'src/app/_shared/models/ticket.model';
import { TicketService } from '../ticket.service';

@Component({
  selector: 'app-list',
  templateUrl: './list.component.html',
  styleUrls: ['./list.component.scss']
})
export class ListComponent implements OnInit {
  tickets : Array<TicketDetail>
  constructor(
    private readonly ticketService: TicketService
  ) { }

  ngOnInit(): void {
    this.loadList();
  }

  loadList():void  {
    this.ticketService.getList().subscribe(res => this.tickets = res);
  }

  searchList($event):void {
    this.ticketService.getSearchList($event).subscribe(res => this.tickets = res)
  }

  

}
