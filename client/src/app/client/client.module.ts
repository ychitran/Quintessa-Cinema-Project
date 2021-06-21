import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HomeComponent } from './home/home.component';
import { RouterModule, Routes } from '@angular/router';
import { ClientLayoutComponent } from '../_shared/layouts/client-layout/client-layout.component';
import { DetailsFilmComponent } from './details-film/details-film.component';


const ROUTES: Routes = [
{
    path: '', component: HomeComponent
    },
      {
      path: 'details-film', component: DetailsFilmComponent
    }]



@NgModule({
  declarations: [HomeComponent, DetailsFilmComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(ROUTES)
  ]
})
export class ClientModule { }
