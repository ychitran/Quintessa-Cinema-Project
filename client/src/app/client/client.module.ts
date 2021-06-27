import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HomeComponent } from './home/home.component';
import { RouterModule, Routes } from '@angular/router';
import { ClientLayoutComponent } from '../_shared/layouts/client-layout/client-layout.component';
import { DetailsFilmComponent } from './details-film/details-film.component';
import { ListFilmComponent } from './list-film/list-film.component';
import { ReactiveFormsModule } from '@angular/forms';


const ROUTES: Routes = [
{
    path: '', component: HomeComponent
    },
      {
      path: 'list-film', component: ListFilmComponent
      },
      {
      path: 'details-film/:id', component: DetailsFilmComponent
      }
]



@NgModule({
  declarations: [HomeComponent, DetailsFilmComponent, ListFilmComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(ROUTES),
    ReactiveFormsModule
  ]
})
export class ClientModule { }
