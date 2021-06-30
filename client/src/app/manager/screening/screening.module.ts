import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { EditComponent } from './edit/edit.component';
import { AddComponent } from './add/add.component';
import { ListComponent } from './list/list.component';
import { RouterModule, Routes } from '@angular/router';
import { ReactiveFormsModule } from '@angular/forms';

const ROUTES : Routes = [
  {
    path:'',
    component:ListComponent
  },
  {
    path:'add',
    component:AddComponent
  },
  {
    path:'edit/:id',
    component:EditComponent
  }
]

@NgModule({
  declarations: [EditComponent, AddComponent, ListComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(ROUTES),
    ReactiveFormsModule
  ]
})
export class ScreeningModule { }
