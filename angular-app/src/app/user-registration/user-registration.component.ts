import { Component, Directive, forwardRef, Attribute, OnChanges, SimpleChanges, Input } from '@angular/core';
import { NG_VALIDATORS, Validator, Validators, AbstractControl, ValidatorFn, RadioControlValueAccessor } from '@angular/forms';
import { Router } from '@angular/router';
import {BrowserModule} from '@angular/platform-browser';
import {platformBrowserDynamic} from '@angular/platform-browser-dynamic';
import {Authenticate} from '../authenticate-service';
@Component({
  selector: 'app-user-registration',
  templateUrl: './user-registration.component.html',
  styleUrls: ['./user-registration.component.css']
})

export class UserRegistrationComponent {
  public userDetail = {
    'name': '',
    'pswrd': '',
    'email': '',
    'mobile': ''
  };
constructor(public httpauthenticate: Authenticate, private router: Router) {
}
onSubmit() {
  if (this.userDetail.name && this.userDetail.pswrd  && this.userDetail.email && this.userDetail.mobile) {
    this.httpauthenticate.register_user(this.userDetail).subscribe(result => {
      if (result.Status === true) {
        this.userDetail = {
          'name': '',
          'pswrd': '',
          'email': '',
          'mobile': ''
        };
        this.router.navigate(['/']);
      }
   },
     err => {
       }
    );
  }
}
}
