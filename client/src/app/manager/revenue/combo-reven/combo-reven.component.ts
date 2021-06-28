import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { ComboRevenue } from 'src/app/_shared/models/combo-revenue.model';
import { RevenueService } from '../revenue.service';

@Component({
  selector: 'app-combo-reven',
  templateUrl: './combo-reven.component.html',
  styleUrls: ['./combo-reven.component.scss']
})
export class ComboRevenComponent implements OnInit {
  revenues: Array<ComboRevenue>
  constructor(
    private route: ActivatedRoute,
    private revenueService: RevenueService
  ) { }

  ngOnInit(): void {
    const monthly_id = this.route.snapshot.paramMap.get('monthly_id');
    this.revenueService.getComboRevenList(monthly_id).subscribe(res => this.loadList(res))
  }
  loadList(res) {
this.revenues = res  }

}
