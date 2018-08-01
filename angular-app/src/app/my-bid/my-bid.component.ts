import { Component, OnInit, ViewContainerRef } from '@angular/core';
import {Authenticate} from '../authenticate-service';
import { ActivatedRoute, Router } from '@angular/router';
import { ToastsManager } from 'ng2-toastr';
//import { FilterBidPipe } from './filter.pipe';

@Component({
  selector: 'app-my-bid',
  templateUrl: './my-bid.component.html',
  styleUrls: ['./my-bid.component.css'],
 // providers: [FilterBidPipe]
})
export class MyBidComponent implements OnInit {
  productList: any = [];
  
  details:any=[];
  productman: any = [];
  save_productList: any;
  
  user_data: any;
  constructor(private router: Router, public authenticate: Authenticate, private toastr: ToastsManager, private _vcr: ViewContainerRef) {
    this.toastr.setRootViewContainerRef(_vcr);
    this.authenticate.searchEvent.subscribe(value => {
      this.updateList(value);
    });
    this.authenticate.invokeEvent.subscribe(value => {
      this.getProducts();
    });
    this.user_data = JSON.parse(sessionStorage.getItem('userData'));
   }

   singleproduct(product, flag) {
    this.details.flag = flag;
   this.getId(product.product_id);
    
    sessionStorage.setItem('productDetails',  JSON.stringify(this.details) );
    this.router.navigate(['single-product/' + product.product_id]);
  }
  ngOnInit() {
    this.getProducts();
   
  }
  getId(idd){
  

for (let entry of this.productman) {
    if(entry.id == idd){
    this.details= entry;
    console.log(this.details);
}
  }
}

  
 
  getProducts() {
    const userId = {
      'user_id': this.user_data.id
    };
    this.authenticate.getBidProductList(userId).subscribe(result => {
      if (result.Status === true) {
        for (let i = 0; i < result.Response.break.length; i++) {
          if (result.Response.break[i].product_image1) {
            result.Response.break[i].product_image1 = 'http://localhost/olx/' + result.Response.break[i].product_image1;
          }
          if (result.Response.break[i].product_image2) {
            result.Response[i].product_image2 = 'http://localhost/olx/' + result.Response[i].product_image2;
          }
          if (result.Response.break[i].product_image3) {
            result.Response.break[i].product_image3 = 'http://localhost/olx/' + result.Response[i].product_image3;
          }
        }
        this.productList = result.Response.break;
        
       console.log(this.productList);
        this.save_productList = result.Response.break;
        this.updateList('All');
        for (let j = 0; j < result.Response.promise.products.length; j++) {
          if (result.Response.promise.products[j].item_image1) {
            result.Response.promise.products[j].item_image1 = 'http://localhost/olx/' + result.Response.promise.products[j].item_image1;
          }
          if (result.Response.promise.products[j].item_image2) {
            result.Response.promise.products[j].item_image2 = 'http://localhost/olx/' + result.Response.promise.products[j].item_image2;
          }
          if (result.Response.promise.products[j].item_image3) {
            result.Response.promise.products[j].item_image3 = 'http://localhost/olx/' + result.Response.promise.products[j].item_image3;
          }
        }

        this.productman = result.Response.promise.products;
        
        console.log(this.productman);
        
        
        
      } else {
        this.toastr.error('No data', 'Error');
      }

      
   },
     err => {
       }
    );
  }
  // updateList (val) {
  //   if (val === 'All') {
  //     this.productList = this.save_productList;
  //   } else {
  //     this.productList = [];
  //     for (let i = 0; i < this.save_productList.length; i++) {
  //       if (this.save_productList[i].department === val) {
  //         this.productList.push(this.save_productList[i]);
  //       }
  //     }
  //   }
  // }

  updateList (val) {
    this.productList = [];
    if (val === 'All') {
      this.productList = this.save_productList;
      this.productList.sort(function(a, b) {
        a = new Date(a.date_updated);
        b = new Date(b.date_updated);
        return b - a;
      });
    } else {
      this.productList = [];
      for (let i = 0; i < this.save_productList.length; i++) {
        if (this.save_productList[i].department === val) {
          this.productList.push(this.save_productList[i]);
        }
      }
      this.productList.sort(function(a, b) {
        a = new Date(a.date_updated);
        b = new Date(b.date_updated);
        return b - a;
      });
    }
  }




}
