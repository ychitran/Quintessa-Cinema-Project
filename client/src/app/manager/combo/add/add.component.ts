import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { ComboService } from '../combo.service';

@Component({
  selector: 'app-add',
  templateUrl: './add.component.html',
  styleUrls: ['./add.component.scss']
})
export class AddComponent implements OnInit {
  addComboForm: FormGroup
  constructor(
    private readonly route:ActivatedRoute,
    private readonly comboService : ComboService  ,
    private readonly formBuilder: FormBuilder,
  ) { }

  ngOnInit(): void {
    this.addComboForm = this.formBuilder.group({
      product_name: ["",[Validators.required]],
      product_detail: ["",[Validators.required]],
      product_image: ["",[Validators.required]],
      product_value: ["",[Validators.required,Validators.min(1)]]

    })
  }

  save() {
    if(this.addComboForm.invalid){
      alert('Thêm mới thất bại');
      return;
    }

    const { value } = this.addComboForm;

    this.comboService.save(value).subscribe(
      res =>
      alert('Thêm mới thành công'),
      err => alert('Thêm mới thất bại')      
    )
  }

}
