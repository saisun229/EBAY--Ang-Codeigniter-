/*import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-my-history',
  templateUrl: './my-history.component.html',
  styleUrls: ['./my-history.component.css']
})
export class MyHistoryComponent implements OnInit {

  constructor() { }

  ngOnInit() {
  }

}

*/
import { Component, OnInit, ViewContainerRef } from '@angular/core';
import {Authenticate} from '../authenticate-service';
import { ActivatedRoute, Router } from '@angular/router';
import { ToastsManager } from 'ng2-toastr';
import {NgForm} from '@angular/forms';
//import { FilterBidPipe } from './filter.pipe';

@Component({
  selector: 'app-my-history',
  templateUrl: './my-history.component.html',
  styleUrls: ['./my-history.component.css']
})
export class MyHistoryComponent implements OnInit {
  productList: any = [];
  
  details:any=[];
  productman: any = [];
  save_productList: any;
  productListing:any =[];
  save_productListing:any;
  comment:Date;
  date:any;
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
    this.getProductses();
   
  }
  getId(idd){
  

for (let entry of this.productman) {
    if(entry.id == idd){
    this.details= entry;
    console.log(this.details);
}
  }
}


onAddComment(form: NgForm){
  
  //sconsole.log(form.value.comment);
  
  this.comment=  form.value.comment;
 
  

    }


    check(productdate){
  
      
     // console.log(productdate);

      const date1 = new Date(productdate);
      const date2 = new Date ( date1 );
      const date3 = new Date();
    
      const date5= new Date(this.comment);
      
//console.log(date3.getTime() - date5.getTime());
     
      
      
    //console.log(this.date);
  //  ;
  //console.log(this.date);
     // this.date = date2;
      //console.log(this.date.getTime());
      //console.log( date2.setMinutes ( date1.getMinutes() + parseInt(this.pdet.bid_time) ));
      if(date5.getTime()){
       
      if(date2.getTime()>0 ){
    if  (  date2.getTime() > date5.getTime()){
    
      return "true";

    }else{
      return "false";
    }
  }else{
    return "false";
  }
    
        }else{
          return "true";
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

  getProductses() {
    const userId = {
      'user_id': this.user_data.id
    };
    this.productList = [];
    this.save_productList = [];
    this.authenticate.getProductList(userId).subscribe(result => {
      if (result.Status === true) {
        for (let l = 0; l < result.Response.products.length; l++) {
          if (result.Response.products[l].item_image1) {
            result.Response.products[l].item_image1 = 'http://localhost/olx/' + result.Response.products[l].item_image1;
          }
          if (result.Response.products[l].item_image2) {
            result.Response.products[l].item_image2 = 'http://localhost/olx/' + result.Response.products[l].item_image2;
          }
          if (result.Response.products[l].item_image3) {
            result.Response.products[l].item_image3 = 'http://localhost/olx/' + result.Response.products[l].item_image3;
          }
        }
        for (let j = 0; j < result.Response.bid_persons.length; j++) {
          for (let i = 0; i < result.Response.products.length; i++) {
            if (!result.Response.products[i].bid_list) {
              result.Response.products[i].bid_list = [];
            }
            if (result.Response.bid_persons[j].length > 0) {
              const bid_list = result.Response.bid_persons[j];
              for (let k = 0; k < bid_list.length; k++) {
                if (result.Response.products[i].id === bid_list[k].product_id) {
                  result.Response.products[i].bid_list.push(bid_list[k]);
                }
              }
            }
          }
        }
        this.productListing = result.Response.products;
        this.save_productListing = result.Response.products;
        this.updateListing('All');
      } else {
        // this.toastr.error('No data', 'Error');
      }
   },
     err => {
       }
    );
  }


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
  updateListing (val) {
    if (val === 'All') {
      this.productListing = this.save_productListing;
      this.productListing.sort(function(a, b) {
        a = new Date(a.date_updated);
        b = new Date(b.date_updated);
        return b - a;
      });
    } else {
      this.productListing = [];
      for (let i = 0; i < this.save_productListing.length; i++) {
        if (this.save_productListing[i].department === val) {
          this.productListing.push(this.save_productListing[i]);
        }
      }
      this.productListing.sort(function(a, b) {
        a = new Date(a.date_updated);
        b = new Date(b.date_updated);
        return b - a;
      });
    }
  }




}
