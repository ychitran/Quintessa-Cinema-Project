import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ListCinemaComponent } from './list-cinema/list-cinema.component';
import { AddCinemaComponent } from './add-cinema/add-cinema.component';
import { EditCinemaComponent } from './edit-cinema/edit-cinema.component';
import { RouterModule, Routes } from '@angular/router';
import { ReactiveFormsModule } from '@angular/forms';

const ROUTES : Routes = [
  {
    path:'',
    component: ListCinemaComponent
  },
  {
    path:'add',
    component: AddCinemaComponent
  },
  {
    path:'edit/:id',
    component: EditCinemaComponent
  }
]


@NgModule({
  declarations: [ListCinemaComponent, AddCinemaComponent, EditCinemaComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(ROUTES),
    ReactiveFormsModule
  ]
})
export class CinemaModule { }
