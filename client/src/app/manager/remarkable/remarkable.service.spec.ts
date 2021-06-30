import { TestBed } from '@angular/core/testing';

import { RemarkableService } from './remarkable.service';

describe('RemarkableService', () => {
  let service: RemarkableService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(RemarkableService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
