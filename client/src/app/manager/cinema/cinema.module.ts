import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ListCinemaComponent } from './list-cinema/list-cinema.component';
import { AddCinemaComponent } from './add-cinema/add-cinema.component';
import { EditCinemaComponent } from './edit-cinema/edit-cinema.component';



@NgModule({
  declarations: [ListCinemaComponent, AddCinemaComponent, EditCinemaComponent],
  imports: [
    CommonModule
  ]
})
export class CinemaModule { }
