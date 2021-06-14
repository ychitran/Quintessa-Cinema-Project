import { AppRoutingModule } from './../app-routing.module';
import { AdminLayoutComponent } from './../_shared/layouts/admin-layout/admin-layout.component';
import { RouterModule, Routes } from '@angular/router';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HomeComponent } from '../manager/home/home.component';

const ROUTES: Routes = [
  {
    path:'',
    component:AdminLayoutComponent,
    children: [
      {
        path: '', component: HomeComponent
      },
      {
        path:'film',
        loadChildren: () => import(`../manager/film/film.module`). then(m => m.FilmModule)
      }
    ]
    
  },
  
]


@NgModule({
  declarations: [HomeComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(ROUTES),
  ]
})
export class ManagerModule { }
