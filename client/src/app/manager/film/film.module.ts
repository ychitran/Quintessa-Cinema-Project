import { AppRoutingModule } from './../../app-routing.module';
import { Routes, RouterModule } from '@angular/router';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ListFilmComponent } from './list-film/list-film.component';
import { AddFilmComponent } from './add-film/add-film.component';
import { EditFilmComponent } from './edit-film/edit-film.component';
import { ReactiveFormsModule } from '@angular/forms';


const ROUTES : Routes = [
  {
    path:'',
    component: ListFilmComponent
  },
  {
    path:'addfilm',
    component: AddFilmComponent
  },
  {
    path:'editfilm/:id',
    component: EditFilmComponent
  }
]


@NgModule({
  declarations: [ListFilmComponent, AddFilmComponent, EditFilmComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(ROUTES),
    ReactiveFormsModule
  ]
})
export class FilmModule { }
