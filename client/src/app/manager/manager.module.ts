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
      },
      {
        path:'cinema',
        loadChildren: () => import(`../manager//cinema/cinema.module`). then(m => m.CinemaModule)
      },
      {
        path:'staff',
        loadChildren: () => import(`../manager/staff/staff.module`). then(m => m.StaffModule)
      },
      {
        path:'adv',
        loadChildren: () => import(`../manager/advertisement/advertisement.module`). then(m => m.AdvertisementModule)
      },
      {
        path:'combo',
        loadChildren: () => import(`../manager/combo/combo.module`). then(m => m.ComboModule)
      },
      {
        path:'discount',
        loadChildren: () => import(`../manager/discount/discount.module`). then(m => m.DiscountModule)
      },
      {
        path:'revenue',
        loadChildren: () => import(`../manager/revenue/revenue.module`). then(m => m.RevenueModule)
      },
      {
        path:'room',
        loadChildren: () => import(`../manager/room/room.module`). then(m => m.RoomModule)
      },
      {
        path:'screening',
        loadChildren: () => import(`../manager/screening/screening.module`). then(m => m.ScreeningModule)
      },
      {
        path:'seat',
        loadChildren: () => import(`../manager/seat/seat.module`). then(m => m.SeatModule)
      },
      {
        path:'member',
        loadChildren: () => import(`../manager/user/user.module`). then(m => m.UserModule)
      },
      {
        path:'ticket',
        loadChildren: () => import(`../manager/ticket/ticket.module`). then(m => m.TicketModule)
      },
      {
        path:'advertisement',
        loadChildren: () => import(`./advertisement/advertisement.module`).then(m => m.AdvertisementModule)
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
