import { Component, Directive, forwardRef, Attribute, OnChanges, SimpleChanges, Input } from '@angular/core';
import { NG_VALIDATORS, Validator, Validators, AbstractControl, ValidatorFn } from '@angular/forms';
import {BrowserModule} from '@angular/platform-browser';
import { Router } from '@angular/router';
import {platformBrowserDynamic} from '@angular/platform-browser-dynamic';
import {Authenticate} from '../authenticate-service';
import swal from 'sweetalert2';
@Component({
  moduleId: module.id,
  selector: 'app-login-page',
  templateUrl: 'login.component.html'
})

export class LoginComponent {
  public userDetails = {
    'mobile': '',
    'pswrd': ''
  };
  constructor(public authenticate: Authenticate, private router: Router) {
  }
  onSubmit() {
    if (this.userDetails.mobile && this.userDetails.pswrd) {
      this.authenticate.authenticateService(this.userDetails).subscribe(result => {
        if (result.Status === true) {
            sessionStorage.setItem('userData', JSON.stringify(result.Response));
            this.router.navigate(['dashboard']);
        } else {
          swal('Authentication Failed', 'Username or password is incorrect.', 'error');
        }
     },
       err => {
         }
      );
    }
  }
  // submitted = false;
  // onSubmit() { this.submitted = true; }
  // newHero() {}
}
