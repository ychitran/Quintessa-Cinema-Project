import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AdvRevenComponent } from './adv-reven.component';

describe('AdvRevenComponent', () => {
  let component: AdvRevenComponent;
  let fixture: ComponentFixture<AdvRevenComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AdvRevenComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AdvRevenComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
