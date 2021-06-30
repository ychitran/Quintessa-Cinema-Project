import { Component, OnInit } from '@angular/core';
import { FormGroup , FormBuilder, Validators  } from '@angular/forms';
import { HttpClient } from '@angular/common/http';
import { ActivatedRoute, Router } from '@angular/router';
import { FilmService } from '../film.service';
import { Film } from 'src/app/_shared/models/film.model';

@Component({
  selector: 'app-edit-film',
  templateUrl: './edit-film.component.html',
  styleUrls: ['./edit-film.component.scss']
})
export class EditFilmComponent implements OnInit {
  film:Film
  editFilmForm: FormGroup
  constructor(
    private readonly HttpClient:HttpClient,
    private readonly route:ActivatedRoute,
    private readonly filmService : FilmService  ,
    private readonly formBuilder: FormBuilder,
    private readonly router:Router
  ) { }

  ngOnInit(): void {
    const id = this.route.snapshot.paramMap.get("id")
    this.filmService.getElement(id).subscribe(
      res => this.loadFilmValue(res)

    )
  }
  loadFilmValue(film : Film): void {
    this.editFilmForm = this.formBuilder.group({
      film_name: [film.film_name,[Validators.required]],
      global_name: [film.global_name,[Validators.required]],
      producer: [film.producer,[Validators.required]],
      categories: [film.categories,[Validators.required]],
      director: [film.director,[Validators.required]],
      caster: [film.caster,[Validators.required]],
      duration: [film.duration,[Validators.min(1)]],
      poster: [film.poster,[Validators.required]],
      banner: [film.banner,[Validators.required]],
      trailer: [film.trailer,[Validators.required]],
      format_id: [film.format_id],
      release_date: [film.release_date],
      status: [film.status],
      description: [film.description]
    })
  }

  update() {
    if(this.editFilmForm.invalid){
      alert('Dữ liệu không hợp lệ !');
      return;
    }

    const { value } = this.editFilmForm;
    const id = this.route.snapshot.paramMap.get('id')
    console.log(value)

    this.filmService.update(id,value).subscribe(
      res =>
      alert('Chỉnh sửa thành công'),
      err => alert('Chỉnh sửa thất bại')      
    )
  }

}
