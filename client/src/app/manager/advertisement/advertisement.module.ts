import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ListComponent } from './list/list.component';
import { AddComponent } from './add/add.component';
import { EditComponent } from './edit/edit.component';
import { RouterModule, Routes,  } from '@angular/router';
import { ReactiveFormsModule } from '@angular/forms';

const ROUTES : Routes = [
  {
    path:'',
    component: ListComponent
  },
  {
    path:'add',
    component: AddComponent
  },
  {
    path:'edit',
    component: EditComponent
  }
]


@NgModule({
  declarations: [ListComponent, AddComponent, EditComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(ROUTES),
    ReactiveFormsModule
  ]
})
export class AdvertisementModule { }
