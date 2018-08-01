import { Component, OnInit, ViewContainerRef } from '@angular/core';
import {Authenticate} from '../authenticate-service';
import { ActivatedRoute, Router } from '@angular/router';
import { ToastsManager } from 'ng2-toastr';
import { FilterPipe } from './filter.pipe';

@Component({
  selector: 'app-product-list',
  templateUrl: './product-list.component.html',
  styleUrls: ['./product-list.component.css'],
  providers: [FilterPipe]
})
export class ProductListComponent implements OnInit {
  productList: any = [];
  save_productList: any;
  user_data:any;
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
    product.flag = flag;
    sessionStorage.setItem('productDetails',  JSON.stringify(product) );
    this.router.navigate(['single-product/' + product.id]);
  }
  ngOnInit() {
    this.getProducts();
  }
  getProducts() {
    const userId = {
      'user_id': ''
    };
    this.authenticate.getProductList(userId).subscribe(result => {
      if (result.Status === true) {
        for (let i = 0; i < result.Response.products.length; i++) {
          if (result.Response.products[i].item_image1) {
            result.Response.products[i].item_image1 = 'http://localhost/olx/' + result.Response.products[i].item_image1;
          }
          if (result.Response.products[i].item_image2) {
            result.Response.products[i].item_image2 = 'http://localhost/olx/' + result.Response.products[i].item_image2;
          }
          if (result.Response.products[i].item_image3) {
            result.Response.products[i].item_image3 = 'http://localhost/olx/' + result.Response.products[i].item_image3;
          }
        }
        this.productList = result.Response.products;
        this.save_productList = result.Response.products;
        this.updateList('All');
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
