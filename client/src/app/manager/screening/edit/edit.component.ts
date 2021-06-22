import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { Screening } from 'src/app/_shared/models/screening.model';
import { ScreeningService } from '../screening.service';

@Component({
  selector: 'app-edit',
  templateUrl: './edit.component.html',
  styleUrls: ['./edit.component.scss']
})
export class EditComponent implements OnInit {
  screening: Screening;
  editForm: FormGroup
  constructor(
    private readonly route: ActivatedRoute,
    private screeningService: ScreeningService,
    private formBuilder:FormBuilder
  ) { }

  ngOnInit(): void {
    const id = this.route.snapshot.paramMap.get("id")
    this.screeningService.getElement(id).subscribe(
      res => this.loadValue(res)

    )
  }
  loadValue(screening: Screening): void {
    this.editForm = this.formBuilder.group({
      date: [screening.date,[Validators.required]],
      start_time: [screening.start_time,[Validators.required]],
      film_id: [screening.film_id,[Validators.required]],
      room_id: [screening.room_id,[Validators.required]]
    })
  }

  update() {
    if(this.editForm.invalid){
      alert('Dữ liệu không hợp lệ !');
      return;
    }

    const { value } = this.editForm;
    const id = this.route.snapshot.paramMap.get('id')

    this.screeningService.update(id,value).subscribe(
      res =>
      alert('Chỉnh sửa thành công'),
      err => alert('Chỉnh sửa thất bại')      
    )
  }

}
