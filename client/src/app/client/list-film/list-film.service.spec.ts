import { TestBed } from '@angular/core/testing';

import { ListFilmService } from './list-film.service';

describe('ListFilmService', () => {
  let service: ListFilmService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ListFilmService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
