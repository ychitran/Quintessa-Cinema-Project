import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { Staff } from 'src/app/_shared/models/staff.model';
import { StaffService } from '../staff.service';

@Component({
  selector: 'app-edit-staff',
  templateUrl: './edit-staff.component.html',
  styleUrls: ['./edit-staff.component.scss']
})
export class EditStaffComponent implements OnInit {
  staff: Staff;
  editStaffForm: FormGroup
  constructor(
    private readonly HttpClient:HttpClient,
    private readonly route:ActivatedRoute,
    private readonly staffService : StaffService  ,
    private readonly formBuilder: FormBuilder,
    private readonly router:Router
  ) { }

  ngOnInit(): void {
    const id = this.route.snapshot.paramMap.get("id")
    this.staffService.getElement(id).subscribe(
      res => this.loadStaffValue(res)

    )
  }
  loadStaffValue(staff : Staff): void {
    this.editStaffForm = this.formBuilder.group({
      full_name: [staff.full_name,[Validators.required]],
      email: [staff.email,[Validators.required]],
      password: [staff.password,[Validators.required]],
      phone_number: [staff.phone_number,[Validators.required]],
      role_id: [staff.role_id,[Validators.required]],
      cinema_id: [staff.cinema_id,[Validators.required]],
      
    })
  }

  update() {
    if(this.editStaffForm.invalid){
      alert('Dữ liệu không hợp lệ !');
      return;
    }

    const { value } = this.editStaffForm;
    const id = this.route.snapshot.paramMap.get('id')

    this.staffService.update(id,value).subscribe(
      res =>
      alert('Chỉnh sửa thành công'),
      err => alert('Chỉnh sửa thất bại')      
    )
  }

}
