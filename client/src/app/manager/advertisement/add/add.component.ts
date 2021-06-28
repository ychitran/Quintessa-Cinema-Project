import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
// import { format , addDays } from 'date-fns';
import { AdvertisementService } from '../advertisement.service';
@Component({
  selector: 'app-add',
  templateUrl: './add.component.html',
  styleUrls: ['./add.component.scss']
})
export class AddComponent implements OnInit {

  addAdvForm: FormGroup
  constructor(
    private readonly formBuilder: FormBuilder,
    private readonly advertisementService: AdvertisementService
  ) { }

  ngOnInit(): void {
    this.addAdvForm = this.formBuilder.group({
      company_name: ["",[Validators.required]],
      content: ["",[Validators.required]],
      contract_price: ["",[Validators.required]],
      start_time: ["",[Validators.required]],
      duration: ["",[Validators.required]],
      date_count: ["",[Validators.required]]

    })
  }

  save() {
    if(this.addAdvForm.invalid){
      alert('Thêm mới thất bại');
      return;
    }

    const { value } = this.addAdvForm;

    this.advertisementService.save(value).subscribe(
      res =>
      alert('Thêm mới thành công'),
      err => alert('Thêm mới thất bại')      
    )
  }

}
