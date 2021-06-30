import { AppRoutingModule } from './../app-routing.module';
import { AdminLayoutComponent } from './../_shared/layouts/admin-layout/admin-layout.component';
import { RouterModule, Routes } from '@angular/router';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HomeComponent } from '../manager/home/home.component';
import { ReactiveFormsModule } from '@angular/forms';

const ROUTES: Routes = [
      {
        path: '', component: HomeComponent
      },
      {
        path:'films',
        loadChildren: () => import(`../manager/film/film.module`). then(m => m.FilmModule)
      },
      {
        path:'cinemas',
        loadChildren: () => import(`../manager//cinema/cinema.module`). then(m => m.CinemaModule)
      },
      {
        path:'staffs',
        loadChildren: () => import(`../manager/staff/staff.module`). then(m => m.StaffModule)
      },
      {
        path:'advs',
        loadChildren: () => import(`../manager/advertisement/advertisement.module`). then(m => m.AdvertisementModule)
      },
      {
        path:'combos',
        loadChildren: () => import(`../manager/combo/combo.module`). then(m => m.ComboModule)
      },
      {
        path:'discounts',
        loadChildren: () => import(`../manager/discount/discount.module`). then(m => m.DiscountModule)
      },
      {
        path:'revenues',
        loadChildren: () => import(`../manager/revenue/revenue.module`). then(m => m.RevenueModule)
      },
      {
        path:'rooms',
        loadChildren: () => import(`../manager/room/room.module`). then(m => m.RoomModule)
      },
      {
        path:'screenings',
        loadChildren: () => import(`../manager/screening/screening.module`). then(m => m.ScreeningModule)
      },
      {
        path:'seats',
        loadChildren: () => import(`../manager/seat/seat.module`). then(m => m.SeatModule)
      },
      {
        path:'members',
        loadChildren: () => import(`../manager/user/user.module`). then(m => m.UserModule)
      },
      {
        path:'tickets',
        loadChildren: () => import(`../manager/ticket/ticket.module`). then(m => m.TicketModule)
      },
      {
        path:'advertisements',
        loadChildren: () => import(`./advertisement/advertisement.module`).then(m => m.AdvertisementModule)
      },
      {
        path:'revenues',
        loadChildren: () => import(`./revenue/revenue.module`).then(m => m.RevenueModule)
      }


    ]


@NgModule({
  declarations: [HomeComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(ROUTES),
    ReactiveFormsModule
  ]
})
export class ManagerModule { }
