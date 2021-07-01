import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { AuthService } from '../auth.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {
  loginForm : FormGroup
  constructor(
    private formBuilder:FormBuilder,
    private authService:AuthService,
    private readonly router: Router

  ) { }

  ngOnInit(): void {
    this.loginForm = this.formBuilder.group({
      email: ["",[Validators.required]],
      password: ["",[Validators.required]]
    })
  }

  login() {
    if(this.loginForm.invalid){
      alert('Chưa nhập Email hoặc mật khẩu');
      return;
    }

    const { value } = this.loginForm;

    this.authService.login(value).subscribe(
      res =>
      this.router.navigateByUrl("/"),
      err => alert('Email hoặc mật khẩu không đúng')      
    )
  }

}
