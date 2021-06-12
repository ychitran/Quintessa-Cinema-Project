import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { CinemaService } from '../cinema.service';

@Component({
  selector: 'app-add-cinema',
  templateUrl: './add-cinema.component.html',
  styleUrls: ['./add-cinema.component.scss']
})
export class AddCinemaComponent implements OnInit {
  addCinemaForm: FormGroup
  constructor(
    private readonly formBuilder: FormBuilder,
    private readonly cinemaService: CinemaService
  ) { }

  ngOnInit(): void {
    this.addCinemaForm = this.formBuilder.group({
      cinema_name: ["",[Validators.required]],
      information: ["",[Validators.required]]
    })
  }

  save() {
    if(this.addCinemaForm.invalid){
      alert('Thêm mới thất bại');
      return;
    }

    const { value } = this.addCinemaForm;

    this.cinemaService.save(value).subscribe(
      res =>
      alert('Thêm mới thành công'),
      err => alert('Thêm mới thất bại')      
    )
  }

}
