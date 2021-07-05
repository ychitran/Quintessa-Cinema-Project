import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { FilmService } from '../film.service';
import { Router } from '@angular/router';
import { FormatFilm } from 'src/app/_shared/models/format-film.model';

@Component({
  selector: 'app-add-film',
  templateUrl: './add-film.component.html',
  styleUrls: ['./add-film.component.scss']
})
export class AddFilmComponent implements OnInit {
  addFilmForm: FormGroup;
  formats : Array<FormatFilm> = []
  constructor(
    private readonly HttpClient: HttpClient,
    private readonly formBuilder: FormBuilder,
    private readonly filmService: FilmService,
    private readonly router: Router
  ) { }

  ngOnInit(): void {
    this.filmService.getInformation().subscribe(res => this.cinemaInfo(res))
    this.addFilmForm = this.formBuilder.group({
      film_name: ["",[Validators.required]],
      global_name: ["",[Validators.required]],
      producer: ["",[Validators.required]],
      categories: ["",[Validators.required]],
      director: ["",[Validators.required]],
      caster: ["",[Validators.required]],
      duration: [1,[Validators.min(1)]],
      poster: ["",[Validators.required]],
      banner: [,[Validators.required]],
      trailer: ["",[Validators.required]],
      format_id: [""],
      release_date: [""],
      status: [""],
      description: [""]
    })
  }
  cinemaInfo(res): void {
    this.formats = res  }

  save() {

    if(this.addFilmForm.invalid){
      alert('Dữ liệu không hợp lệ');
      return;
    }


    const { value } = this.addFilmForm;
    const format_id = Number(value.format_id)
    const status = Number(value.status)
    value.format_id = format_id
    value.status = status
    // console.log(value)

    this.filmService.save(value).subscribe(
      res =>{
        alert('Thêm mới thành công'),

        this.router.navigateByUrl('/admin/films')
      },
      err => alert('Thêm mới thất bại')      
    )
  }

}
