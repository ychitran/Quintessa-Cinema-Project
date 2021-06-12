import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { EditStaffComponent } from './edit-staff/edit-staff.component';
import { AddStaffComponent } from './add-staff/add-staff.component';
import { ListStaffComponent } from './list-staff/list-staff.component';
import { RouterModule, Routes } from '@angular/router';
import { ReactiveFormsModule } from '@angular/forms';

const ROUTES : Routes = [
  {
    path:'',
    component: ListStaffComponent
  },
  {
    path:'add',
    component: AddStaffComponent
  },
  {
    path:'edit/:id',
    component: EditStaffComponent
  }
]

@NgModule({
  declarations: [EditStaffComponent, AddStaffComponent, ListStaffComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(ROUTES),
    ReactiveFormsModule
  ]
})
export class StaffModule { }
