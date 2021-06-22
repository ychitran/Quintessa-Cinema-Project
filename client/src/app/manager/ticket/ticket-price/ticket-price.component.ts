import { Component, OnInit } from '@angular/core';
import { TicketPrice } from 'src/app/_shared/models/ticket-price.model';
import { TicketService } from '../ticket.service';

@Component({
  selector: 'app-ticket-price',
  templateUrl: './ticket-price.component.html',
  styleUrls: ['./ticket-price.component.scss']
})
export class TicketPriceComponent implements OnInit {
  prices: Array<TicketPrice>
  constructor(
    private ticketService: TicketService
  ) { }

  ngOnInit(): void {
    this.loadList()
  }
  loadList() {
    this.ticketService.getListNd().subscribe(res => this.prices = res)
  }

}
