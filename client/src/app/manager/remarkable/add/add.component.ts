import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { Discount } from 'src/app/_shared/models/discount.model';
import { Film } from 'src/app/_shared/models/film.model';
import { Room } from 'src/app/_shared/models/room.model';
import { RemarkableService } from '../remarkable.service';

@Component({
  selector: 'app-add',
  templateUrl: './add.component.html',
  styleUrls: ['./add.component.scss']
})
export class AddComponent implements OnInit {
  addRemarkableForm:FormGroup;
  films : Array<Film>;
  combos: Array<Room>
  discounts : Array<Discount>
  // category : string
  constructor(
    private readonly remarkableService:RemarkableService,
    private readonly route: ActivatedRoute,
    private readonly formBuilder:FormBuilder
  ) { }

  ngOnInit(): void {
    this.loadList();
    this.addRemarkableForm = this.formBuilder.group({
      film_id: [,[Validators.required]],
      combo_id: [null],
      discount_id: [null],
      poster: [null],
      categories: [null],
      status: [1,[Validators.required]],
      banner: [,[Validators.required]]
    })
  }

  loadList():void {
    // this.category = event
    this.remarkableService.getListProvider().subscribe(res => this.loadValueProvider(res));
  }
  loadValueProvider(res): void {
    this.films = res
  }

  save() {
    if(this.addRemarkableForm.invalid){
      alert('Dữ liệu không hợp lệ');
      return;
    }

    const { value } = this.addRemarkableForm;
    console.log(value)

    this.remarkableService.save(value).subscribe(
      res =>
      alert('Thêm mới thành công'),
      err => alert('Thêm mới thất bại')      
    )
  }

}
