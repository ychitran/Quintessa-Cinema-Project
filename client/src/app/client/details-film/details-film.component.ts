import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Film } from 'src/app/_shared/models/film.model';

@Component({
  selector: 'app-details-film',
  templateUrl: './details-film.component.html',
  styleUrls: ['./details-film.component.scss']
})
export class DetailsFilmComponent implements OnInit {
  film?:Film

  constructor(
    private readonly route: ActivatedRoute,
    private readonly httpClient: HttpClient
  ) { }

  ngOnInit(): void {
    this.loadFilmDetails();
  }
  
  loadFilmDetails() {
    const id = this.route.snapshot.paramMap.get("id")
    this.httpClient.get('https://60ce078a91cc8e00178dc6b4.mockapi.io/cinema/film/' + id).subscribe((res:any) => this.film = res)
  }


}
