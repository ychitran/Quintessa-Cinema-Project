import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ListComponent } from './list/list.component';
import { FilmRevenComponent } from './film-reven/film-reven.component';
import { ComboRevenComponent } from './combo-reven/combo-reven.component';
import { AdvRevenComponent } from './adv-reven/adv-reven.component';
import { RouterModule, Routes } from '@angular/router';

const ROUTES : Routes = [
  {
    path:'',
    component:ListComponent
  },
  {
    path:'film/:monthly_id',
    component:FilmRevenComponent
  },
  {
    path:'combo/:monthly_id',
    component:ComboRevenComponent
  },
  {
    path:'adv/:monthly_id',
    component:AdvRevenComponent
  }
]

@NgModule({
  declarations: [ ListComponent, FilmRevenComponent, ComboRevenComponent, AdvRevenComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(ROUTES)
  ]
})
export class RevenueModule { }
