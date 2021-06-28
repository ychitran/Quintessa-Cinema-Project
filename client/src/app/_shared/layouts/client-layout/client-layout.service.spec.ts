import { TestBed } from '@angular/core/testing';

import { ClientLayoutService } from './client-layout.service';

describe('ClientLayoutService', () => {
  let service: ClientLayoutService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ClientLayoutService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
