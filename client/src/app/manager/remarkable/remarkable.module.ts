import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ListComponent } from './list/list.component';
import { AddComponent } from './add/add.component';
import { EditComponent } from './edit/edit.component';
import { ReactiveFormsModule } from '@angular/forms';
import { ActivatedRoute, RouterModule, Routes } from '@angular/router';

const ROUTES : Routes = [
  {
    path:'',
    component:ListComponent
  },
  {
    path:'add',
    component:AddComponent
  },
  // {
  //   path:'edit/:id',
  //   component:EditComponent
  // }
]

@NgModule({
  declarations: [ListComponent, AddComponent, EditComponent],
  imports: [
    CommonModule,
    ReactiveFormsModule,
    RouterModule.forChild(ROUTES)
  ]
})
export class RemarkableModule { }
