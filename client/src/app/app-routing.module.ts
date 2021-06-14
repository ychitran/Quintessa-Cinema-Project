import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import { AppComponent } from './app.component';

const ROUTES: Routes = [
  {
    path: '',
    loadChildren: () => import(`./client/client.module`). then(m => m.ClientModule)
  },
  {
    path: 'admin',
    loadChildren: () => import(`./manager/manager.module`). then(m => m.ManagerModule)
  }
]

@NgModule({
  declarations: [],
  imports: [
    CommonModule,
    RouterModule.forRoot(ROUTES)
  ],
  exports: [
    RouterModule
  ]
})
export class AppRoutingModule { }
