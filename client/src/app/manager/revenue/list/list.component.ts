import { Component, OnInit } from '@angular/core';
import { MonthlyRevenue } from 'src/app/_shared/models/monthly-revenue.model';
import { RevenueService } from '../revenue.service';

@Component({
  selector: 'app-list',
  templateUrl: './list.component.html',
  styleUrls: ['./list.component.scss']
})
export class ListComponent implements OnInit {
  revenues : Array<MonthlyRevenue>
  constructor(
    private revenueService: RevenueService
  ) { }

  ngOnInit(): void {
    this.loadList();
  }
  loadList(keyword=''):void {
    this.revenueService.getMonthRevenList(keyword).subscribe(res=>this.revenues = res)
  }

}
