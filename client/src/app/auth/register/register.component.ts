import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { AuthService } from '../auth.service';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.scss']
})
export class RegisterComponent implements OnInit {
  registerForm:FormGroup
  constructor(
    private formBuilder:FormBuilder,
    private authService:AuthService,
    private readonly router: Router
  ) { }

  ngOnInit(): void {
    this.registerForm = this.formBuilder.group({
      email: ["",[Validators.required]],
      password: ["",[Validators.required]],
      phone_number: ["",[Validators.required]],
      full_name: ["",[Validators.required]],
    })
  }

  register() {
    if(this.registerForm.invalid){
      alert('Vui lòng nhập đầy đủ thông tin!');
      return;
    }

    const { value } = this.registerForm;

    this.authService.register(value).subscribe(
      res =>
      this.router.navigateByUrl("/"),
      err => alert('Đăng ký thất bại')      
    )
  }

}
