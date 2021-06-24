import { TestBed } from '@angular/core/testing';

import { DetailsFilmService } from './details-film.service';

describe('DetailsFilmService', () => {
  let service: DetailsFilmService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(DetailsFilmService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
