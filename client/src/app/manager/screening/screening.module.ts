import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { EditComponent } from './edit/edit.component';
import { AddComponent } from './add/add.component';
import { ListComponent } from './list/list.component';



@NgModule({
  declarations: [EditComponent, AddComponent, ListComponent],
  imports: [
    CommonModule
  ]
})
export class ScreeningModule { }
