import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { MemberService } from '../member.service';

@Component({
  selector: 'app-add',
  templateUrl: './add.component.html',
  styleUrls: ['./add.component.scss']
})
export class AddComponent implements OnInit {
  addMemberForm: FormGroup
  constructor(
    private readonly formBuilder: FormBuilder,
    private readonly memberService: MemberService
  ) { }

  ngOnInit(): void {
    this.addMemberForm = this.formBuilder.group({
      full_name: ["",[Validators.required]],
      email: ["",[Validators.required]],
      password: ["123456"],
      phone_number: ["",[Validators.required]],
    })
  }

  save() {
    if(this.addMemberForm.invalid){
      alert('Thêm mới thất bại');
      return;
    }

    const { value } = this.addMemberForm;

    this.memberService.save(value).subscribe(
      res =>
      alert('Thêm mới thành công'),
      err => alert('Thêm mới thất bại')      
    )
  }

}
