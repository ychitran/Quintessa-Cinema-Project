import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { FilmRevenue } from 'src/app/_shared/models/film-revenue.model';
import { RevenueService } from '../revenue.service';

@Component({
  selector: 'app-film-reven',
  templateUrl: './film-reven.component.html',
  styleUrls: ['./film-reven.component.scss']
})
export class FilmRevenComponent implements OnInit {
  revenues: Array<FilmRevenue>
  constructor(
    private revenueService:RevenueService,
    private route:ActivatedRoute
  ) { }

  ngOnInit(): void {
    const monthly_id = this.route.snapshot.paramMap.get('monthly_id')
    this.revenueService.getFilmRevenList(monthly_id).subscribe(res => this.loadList(res))
  }
  loadList(res) {
    this.revenues = res
  }

}
