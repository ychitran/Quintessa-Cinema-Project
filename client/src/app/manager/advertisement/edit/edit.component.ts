import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { Advertisement } from 'src/app/_shared/models/advertisement.model';
import { AdvertisementService } from '../advertisement.service';

@Component({
  selector: 'app-edit',
  templateUrl: './edit.component.html',
  styleUrls: ['./edit.component.scss']
})
export class EditComponent implements OnInit {
  editAdvForm: FormGroup
  advertisement: Advertisement
  constructor(
    private readonly route:ActivatedRoute,
    private readonly advertisementService : AdvertisementService  ,
    private readonly formBuilder: FormBuilder,
  ) { }

  ngOnInit(): void {
    const id = this.route.snapshot.paramMap.get("id")
    this.advertisementService.getElement(id).subscribe(
      res => this.loadAdvValue(res)

    )
  }
  loadAdvValue(advertisement: Advertisement): void {
    this.editAdvForm = this.formBuilder.group({
      company_name: [advertisement.company_name,[Validators.required]],
      content: [advertisement.content,[Validators.required]],
      contract_price: [advertisement.contract_price,[Validators.required]],
      start_time: [advertisement.start_time,[Validators.required]],
      duration: [advertisement.duration,[Validators.required]],
      date_count: [advertisement.date_count,[Validators.required]]
    })
  }

  update() {
    if(this.editAdvForm.invalid){
      alert('Dữ liệu không hợp lệ !');
      return;
    }

    const { value } = this.editAdvForm;
    const id = this.route.snapshot.paramMap.get('id')

    this.advertisementService.update(id,value).subscribe(
      res =>
      alert('Chỉnh sửa thành công'),
      err => alert('Chỉnh sửa thất bại')      
    )
  }

}
