import { Component, OnInit} from '@angular/core';
import { Router } from '@angular/router';
import {NgForm} from '@angular/forms';
import {Authenticate} from '../authenticate-service';

@Component({
  selector: 'app-contact-us',
  templateUrl: './contact-us.component.html',
  styleUrls: ['./contact-us.component.css']
})
export class ContactUsComponent implements OnInit {
  comment:any;
  returned:string;
  constructor(private router: Router,  private authenticate: Authenticate) {
     
  }

  ngOnInit() {
  }
   onAddComment(form: NgForm){
this.comment= form.value;

if(this.comment){
      this.authenticate.addComment(this.comment).subscribe(result => {
        if (result.Status === true) {
         this.returned = result.Response;
         } 
      } );//end
    }
  }
}
 
