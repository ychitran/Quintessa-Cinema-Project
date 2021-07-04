import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
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
    private router : Router
  ) { }

  ngOnInit(): void {
    this.addComboForm = this.formBuilder.group({
      product_name: ["",[Validators.required]],
      product_detail: [,[Validators.required]],
      product_image: [,[Validators.required]],
      product_value: [,[Validators.required,Validators.min(1)]]

    })
  }

  save() {
    if(this.addComboForm.invalid){
      alert('Vui lòng nhập đầy đủ thông tin');
      return;
    }

    const { value } = this.addComboForm;

    console.log(value)
    this.comboService.save(value).subscribe(
      res =>{alert('Thêm mới thành công');
      this.router.navigateByUrl('/admin/combos')
    }
      ,
      err => alert('Thêm mới thất bại')      
    )
  }

}
