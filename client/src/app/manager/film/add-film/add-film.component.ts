import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { FilmService } from '../film.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-add-film',
  templateUrl: './add-film.component.html',
  styleUrls: ['./add-film.component.scss']
})
export class AddFilmComponent implements OnInit {
  addFilmForm: FormGroup;

  constructor(
    private readonly HttpClient: HttpClient,
    private readonly formBuilder: FormBuilder,
    private readonly filmService: FilmService,
    private readonly router: Router
  ) { }

  ngOnInit(): void {
    this.addFilmForm = this.formBuilder.group({
      film_name: ["",[Validators.required]],
      global_name: ["",[Validators.required]],
      producer: ["",[Validators.required]],
      categories: ["",[Validators.required]],
      director: ["",[Validators.required]],
      caster: ["",[Validators.required]],
      duration: [1,[Validators.min(1)]],
      poster: ["",[Validators.required]],
      trailer: ["",[Validators.required]],
      format_id: [],
      release_at: [],
      status: [],
      description: []
    })
  }

  save() {
    if(this.addFilmForm.invalid){
      alert('Thêm mới thất bại');
      return;
    }

    const { value } = this.addFilmForm;

    this.filmService.save(value).subscribe(
      res =>
      alert('Thêm mới thành công'),
      err => alert('Thêm mới thất bại')      
    )
  }

}
