import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { Combo } from 'src/app/_shared/models/combo.model';
import { ComboService } from '../combo.service';

@Component({
  selector: 'app-edit',
  templateUrl: './edit.component.html',
  styleUrls: ['./edit.component.scss']
})
export class EditComponent implements OnInit {
  combo: Combo
  editComboForm: FormGroup
  constructor(
    private readonly route:ActivatedRoute,
    private readonly comboService : ComboService  ,
    private readonly formBuilder: FormBuilder,
    private router: Router
  ) { }

  ngOnInit(): void {
    const id = this.route.snapshot.paramMap.get("id")
    this.comboService.getElement(id).subscribe(
      res => this.loadAdvValue(res)

    )
  }
  loadAdvValue(combo: Combo): void {
    this.editComboForm = this.formBuilder.group({
      product_name: [combo.product_name,[Validators.required]],
      product_detail: [combo.product_detail,[Validators.required]],
      product_image: [combo.product_image,[Validators.required]],
      product_value: [combo.product_value,[Validators.required,Validators.min(1)]]
    })
  }

  update() {
    if(this.editComboForm.invalid){
      alert('Dữ liệu không hợp lệ !');
      return;
    }

    const { value } = this.editComboForm;
    const id = this.route.snapshot.paramMap.get('id')

    this.comboService.update(id,value).subscribe(
      res =>{
      alert('Chỉnh sửa thành công')
      this.router.navigateByUrl('/admin/combos')}
      ,
      err => alert('Chỉnh sửa thất bại')      
    )
  }

}
