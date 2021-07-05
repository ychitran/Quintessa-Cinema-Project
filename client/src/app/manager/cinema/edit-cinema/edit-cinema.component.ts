import { Component, OnInit } from '@angular/core';
import { Cinema } from 'src/app/_shared/models/cinema.model';
import { FormGroup , FormBuilder, Validators  } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { CinemaService } from '../cinema.service';

@Component({
  selector: 'app-edit-cinema',
  templateUrl: './edit-cinema.component.html',
  styleUrls: ['./edit-cinema.component.scss']
})
export class EditCinemaComponent implements OnInit {
  cinema:Cinema
  editCinemaForm: FormGroup
  constructor(
    private readonly route:ActivatedRoute,
    private readonly cinemaService : CinemaService  ,
    private readonly formBuilder: FormBuilder,
    private router: Router
  ) { }

  ngOnInit(): void {
    const id = this.route.snapshot.paramMap.get("id")
    this.cinemaService.getElement(id).subscribe(
      res => this.loadCinemaValue(res)

    )
  }
  loadCinemaValue(cinema: Cinema): void {
    this.editCinemaForm = this.formBuilder.group({
      cinema_name: [cinema.cinema_name,[Validators.required]],
      information: [cinema.information,[Validators.required]]
    })
  }

  update() {
    if(this.editCinemaForm.invalid){
      alert('Dữ liệu không hợp lệ !');
      return;
    }

    const { value } = this.editCinemaForm;
    const id = this.route.snapshot.paramMap.get('id')

    this.cinemaService.update(id,value).subscribe(
      res =>{
        alert('Chỉnh sửa thành công'),
        this.router.navigateByUrl('/admin/cinemas')
      },
      err => alert('Chỉnh sửa thất bại')      
    )
  }

}
