import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { Member } from 'src/app/_shared/models/member.model';
import { MemberService } from '../member.service';

@Component({
  selector: 'app-edit',
  templateUrl: './edit.component.html',
  styleUrls: ['./edit.component.scss']
})
export class EditComponent implements OnInit {
  member:Member;
  editMemberForm:FormGroup
  constructor(
    private readonly HttpClient:HttpClient,
    private readonly route:ActivatedRoute,
    private readonly memberService : MemberService  ,
    private readonly formBuilder: FormBuilder,
    private readonly router:Router
  ) { }

  ngOnInit(): void {
    const id = this.route.snapshot.paramMap.get("id")
    this.memberService.getElement(id).subscribe(
      res => this.loadMemberValue(res)

    )
  }
  loadMemberValue(member : Member): void {
    this.editMemberForm = this.formBuilder.group({
      full_name: [member.full_name,[Validators.required]],
      email: [member.email,[Validators.required]],
      password: [member.password,[Validators.required]],
      phone_number: [member.phone_number,[Validators.required]],
    })
  }

  update() {
    if(this.editMemberForm.invalid){
      alert('Dữ liệu không hợp lệ !');
      return;
    }

    const { value } = this.editMemberForm;
    const id = this.route.snapshot.paramMap.get('id')

    this.memberService.update(id,value).subscribe(
      res =>
      alert('Chỉnh sửa thành công'),
      err => alert('Chỉnh sửa thất bại')      
    )
  }

}
