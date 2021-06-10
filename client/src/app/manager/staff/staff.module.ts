import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { EditStaffComponent } from './edit-staff/edit-staff.component';
import { AddStaffComponent } from './add-staff/add-staff.component';
import { ListStaffComponent } from './list-staff/list-staff.component';



@NgModule({
  declarations: [EditStaffComponent, AddStaffComponent, ListStaffComponent],
  imports: [
    CommonModule
  ]
})
export class StaffModule { }
