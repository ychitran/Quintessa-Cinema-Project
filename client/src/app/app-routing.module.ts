import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import { AppComponent } from './app.component';
import { AdminLayoutComponent } from './_shared/layouts/admin-layout/admin-layout.component';
import { ClientLayoutComponent } from './_shared/layouts/client-layout/client-layout.component';
import { ReactiveFormsModule } from '@angular/forms';
import { AuthModule } from './auth/auth.module';

const ROUTES: Routes = [
  {
    path: '',
    component: ClientLayoutComponent,
    children: [{
      path:'',
      loadChildren: () => import(`./client/client.module`). then(m => m.ClientModule)
      }]
  },
  {
    path: 'login',
    loadChildren: () => import(`./auth/auth.module`). then(m => m.AuthModule)
    
  },
  {
    path: 'admin',
    component: AdminLayoutComponent,
    children: [
      {
        path:'',
        loadChildren: () => import(`./manager/manager.module`). then(m => m.ManagerModule)
      }
    ]
  }
]

@NgModule({
  declarations: [],
  imports: [
    CommonModule,
    RouterModule.forRoot(ROUTES),
    ReactiveFormsModule
  ],
  exports: [
    RouterModule
  ]
})
export class AppRoutingModule { }
