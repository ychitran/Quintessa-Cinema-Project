import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ListComponent } from './list/list.component';
import { Router, RouterModule, Routes } from '@angular/router';

const ROUTES: Routes =[ 
  {
    path:'',
    component: ListComponent
  }
]

@NgModule({
  declarations: [ListComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(ROUTES)
  ]
})
export class SeatModule { }
