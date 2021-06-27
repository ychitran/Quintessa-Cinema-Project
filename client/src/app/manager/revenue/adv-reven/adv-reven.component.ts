import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Advertisement } from 'src/app/_shared/models/advertisement.model';
import { RevenueService } from '../revenue.service';

@Component({
  selector: 'app-adv-reven',
  templateUrl: './adv-reven.component.html',
  styleUrls: ['./adv-reven.component.scss']
})
export class AdvRevenComponent implements OnInit {
  revenues : Array<Advertisement>
  constructor(
    private readonly revenueService : RevenueService,
    private route: ActivatedRoute
  ) { }

  ngOnInit(): void {

    const monthly_id = this.route.snapshot.paramMap.get('monthly_id');
    this.revenueService.getAdvRevenList(monthly_id).subscribe(res => this.loadList(res))
  }
  loadList(res) {
    this.revenues = res;
  }
}
