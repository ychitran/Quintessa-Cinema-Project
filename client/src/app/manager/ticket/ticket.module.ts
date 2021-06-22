import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ListComponent } from './list/list.component';
import { RouterModule, Routes } from '@angular/router';
import { ReactiveFormsModule } from '@angular/forms';
import { TicketPriceComponent } from './ticket-price/ticket-price.component';
import { EditPriceComponent } from './edit-price/edit-price.component';

const ROUTES : Routes = [
  {
    path:'',
    component: ListComponent
  },
  {
    path:'ticket-price',
    component:TicketPriceComponent
  }
]


@NgModule({
  declarations: [ListComponent, TicketPriceComponent, EditPriceComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(ROUTES),
    ReactiveFormsModule
  ]
})
export class TicketModule { }
