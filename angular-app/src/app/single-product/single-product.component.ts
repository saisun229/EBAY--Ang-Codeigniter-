import { Component, OnInit, ViewContainerRef } from '@angular/core';
import {Authenticate} from '../authenticate-service';
import { ActivatedRoute, Router } from '@angular/router';
import { ToastsManager } from 'ng2-toastr';

@Component({
  selector: 'app-single-product',
  templateUrl: './single-product.component.html',
  styleUrls: ['./single-product.component.css']
})
export class SingleProductComponent implements OnInit {

  productDetailed: any = [];
  bidCompleted = false;
  buyClicked = false;
  pdet: any;
  user_data;
  date;
  text: any = {
    Year: 'Year',
    Month: 'Month',
    Weeks: 'Weeks',
    Days: 'Days',
    Hours: 'Hours',
    Minutes: 'Minutes',
    Seconds: 'Seconds',
    MilliSeconds: 'MilliSeconds'
  };

  constructor(private router: Router, public authenticate: Authenticate, private toastr: ToastsManager, private _vcr: ViewContainerRef) {
    this.toastr.setRootViewContainerRef(_vcr);
    this.user_data = JSON.parse(sessionStorage.getItem('userData'));
    this.productDetailed = JSON.parse(sessionStorage.getItem('productDetails'));
    this.pdet = this.productDetailed;
    this.check_bid_status();
   }

  ngOnInit() {
   setInterval(() => {
      this.check_bid_status();
    }, 1000);
  }

check_bid_status() {
  const date1 = new Date(this.pdet.date_updated);
  const date2 = new Date ( date1 );
  
  date2.setMinutes ( date1.getMinutes() + parseInt(this.pdet.bid_time) );
  this.date = date2;
  //console.log(this.date.getTime());
  //console.log( date2.setMinutes ( date1.getMinutes() + parseInt(this.pdet.bid_time) ));
  const date3 = new Date();
    if (this.user_data) {
      if (date3.getTime() >= date2.getTime()) {
      //  console.log(this.pdet);
       // if (!this.pdet.winner_name) {
         const obj = {
          'user_id': this.user_data.id,
            'product_id': this.pdet.id,
            
        };

        this.authenticate.completeBid(obj).subscribe(result => {
          if (result.Status) {
            this.bidCompleted = true;
            // this.toastr.success('Successfully updated', 'Success');
          } else {
            // this.toastr.error('No data', 'Error');
          }
        },
         err => {
           }
        );
        
      }
    }  
}




buy(){
 this.buyClicked=true;
}
back(){
  this.buyClicked=false;
}
proceed(){
  const obj = {
    'user_id': this.user_data.id,
    'product_id': this.productDetailed.id,
  };
  this.authenticate.proceedBuy(obj).subscribe(result => {
    // this.productList = result.Response;
    if (result.Status) {
      this.toastr.success('You have purchased successfully', 'Success');
      this.router.navigate(['dashboard']);
    } else {
      this.toastr.error('No data', 'Error');
    }
   console.log('result', result);
 


}, 
err => {
  }
);

}




  bid (amt) {
    if (parseInt(amt) > parseInt(this.pdet.first_min_bid)) {
      const obj = {
        'user_id': this.user_data.id,
        'product_id': this.productDetailed.id,
        'bid_amount': amt,
        'checker':'unchecked'
      };
      this.authenticate.biddingProducts(obj).subscribe(result => {
        // this.productList = result.Response;
        if (result.Status) {
          this.toastr.success('Bid placed successfully', 'Success');
          this.router.navigate(['dashboard']);
        } else {
          this.toastr.error('No data', 'Error');
        }
        console.log('result', result);
     }, 
       err => {
         }
      );
    } else {
      this.toastr.info('Bid price should be more than minimum bid price.', 'Info');
    }
  }

  navigate () {
    this.router.navigate(['Login']);
  }

}
