import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { StaffService } from '../staff.service';

@Component({
  selector: 'app-add-staff',
  templateUrl: './add-staff.component.html',
  styleUrls: ['./add-staff.component.scss']
})
export class AddStaffComponent implements OnInit {
  addStaffForm : FormGroup
  constructor(
    private readonly formBuilder: FormBuilder,
    private readonly staffService: StaffService
  ) { }

  ngOnInit(): void {
    this.addStaffForm = this.formBuilder.group({
      full_name: ["",[Validators.required]],
      email: ["",[Validators.required]],
      password: ["123456"],
      phone_number: ["",[Validators.required]],
      role_id: ["",[Validators.required]],
      cinema_id: ["",[Validators.required]],
    })
  }

  save() {
    if(this.addStaffForm.invalid){
      alert('Thêm mới thất bại');
      return;
    }

    const { value } = this.addStaffForm;

    this.staffService.save(value).subscribe(
      res =>
      alert('Thêm mới thành công'),
      err => alert('Thêm mới thất bại')      
    )
  }

}
