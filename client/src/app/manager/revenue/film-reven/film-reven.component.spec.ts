import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FilmRevenComponent } from './film-reven.component';

describe('FilmRevenComponent', () => {
  let component: FilmRevenComponent;
  let fixture: ComponentFixture<FilmRevenComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ FilmRevenComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(FilmRevenComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
