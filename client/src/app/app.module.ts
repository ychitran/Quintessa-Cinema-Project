import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { AppRoutingModule } from './app-routing.module';
import { AdminLayoutComponent } from './_shared/layouts/admin-layout/admin-layout.component';
import { ClientLayoutComponent } from './_shared/layouts/client-layout/client-layout.component';

@NgModule({
  declarations: [
    AppComponent,
    AdminLayoutComponent,
    ClientLayoutComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
