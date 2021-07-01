import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HomeComponent } from './home/home.component';
import { RouterModule, Routes } from '@angular/router';
import { ClientLayoutComponent } from '../_shared/layouts/client-layout/client-layout.component';
import { DetailsFilmComponent } from './details-film/details-film.component';
import { ListFilmComponent } from './list-film/list-film.component';
import { ReactiveFormsModule } from '@angular/forms';
import { ProfileComponent } from './profile/profile.component';



const ROUTES: Routes = [
  {
    path: '', component: HomeComponent
    },
      {
      path: 'list-film', component: ListFilmComponent
      },
      {
      path: 'details-film/:id', component: DetailsFilmComponent
      },
      {
      path: 'profile', component: ProfileComponent
      }
]



@NgModule({
  declarations: [HomeComponent, DetailsFilmComponent, ListFilmComponent, ProfileComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(ROUTES),
    ReactiveFormsModule
  ]
})
export class ClientModule { }
