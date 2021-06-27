import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ComboRevenComponent } from './combo-reven.component';

describe('ComboRevenComponent', () => {
  let component: ComboRevenComponent;
  let fixture: ComponentFixture<ComboRevenComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ComboRevenComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ComboRevenComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
