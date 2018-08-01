import {Component, Inject, ViewContainerRef} from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material';
//import { Data } from '../model/data';
//import { Datas } from '../model/mock-datas';
import {Authenticate} from '../authenticate-service';
import { ActivatedRoute, Router } from '@angular/router';
import { ToastsManager } from 'ng2-toastr';
import { FilterPipe } from './filter.pipe';

@Component({
  selector: 'app-dashboard-page',
  templateUrl: 'dashboard.component.html',
  styleUrls: ['dashboard.component.css'],
  providers: [FilterPipe]
})

export class DashboardComponent {
  // labData = Datas;
  public pData: any;
  item = '';
  productList: any = [];
  save_productList: any;
  user_data;
  constructor(public dialog: MatDialog, private router: Router, public authenticate: Authenticate,
    private toastr: ToastsManager, private _vcr: ViewContainerRef) {
    this.toastr.setRootViewContainerRef(_vcr);
    this.user_data = JSON.parse(sessionStorage.getItem('userData'));
    this.getProducts();
    this.authenticate.invokeEvent.subscribe(value => {
      this.getProducts();
    });
    this.authenticate.searchEvent.subscribe(value => {
      this.updateList(value);
    });
  }

  ngOnIt() {
  }

  singleproduct(product, flag) {
    product.flag = flag;
    sessionStorage.setItem('productDetails',  JSON.stringify(product) );
    this.router.navigate(['single-product/' + product.id]);
  }

  getProducts() {
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
        this.productList = result.Response.products;
        this.save_productList = result.Response.products;
        this.updateList('All');
      } else {
        // this.toastr.error('No data', 'Error');
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


  // delete product frm my products
  delete_product (product_id) {
    const obj = {
      id : product_id
    };
    this.authenticate.delete_product(obj).subscribe(result => {
      if (result.Status === true) {
        this.toastr.success('Product Deleted successfully', 'Success');
        this.getProducts();
        // this.productList = [];
      } else {
        this.toastr.error('No data', 'Error');
      }
    },
    err => {
      }
   );
  }

  cancel_bid(product) {
    const obj = {
      'product_id': product.id,
      'user_id': product.user_id
    };
    this.authenticate.cancel_bid(obj).subscribe(result => {
      if (result.Status === true) {
        this.toastr.success('Bidding Cancelled Successfully', 'Success');
        this.getProducts();
        this.router.navigate(['dashboard']);
      } else {
        this.toastr.error('No data', 'Error');
      }
    },
    err => {
      }
   );
  }
  openDialog(product): void {
    if (this.user_data) {
      const dialogRef = this.dialog.open(UpdateModalComponent, {
        width: '550px',
        height: '600px',
        data: {
          data : product
        }
      });
      dialogRef.afterClosed().subscribe(result => {
      this.getProducts();
      });
    } else {
      this.toastr.info('Please login to add product.', 'Info');
    }
  }
  updateList (val) {
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


// @Component({
//   selector: 'app-dashboard-modal-example-dialog',
//   templateUrl: 'dashboard-modal-example-dialog.html',
//   styleUrls: ['dashboard.component.css']
// })
// export class DashboardModalComponent {
//   public lab_info = {};
//   constructor(
//     public dialogRef: MatDialogRef<DashboardModalComponent>,
//     @Inject(MAT_DIALOG_DATA) public data: any, public authenticate: Authenticate) {
//       console.log('FULL_NAME', this.data);
//      }

//   onNoClick(): void {
//     this.dialogRef.close();
//   }

// }


@Component({
  selector: 'app-dashboard-update-modal-dialog',
  templateUrl: 'update_product_modal.html',
  styleUrls: ['dashboard.component.css']
})
export class UpdateModalComponent {
item_image1: File = null;
item_image2: File = null;
item_image3: File = null;
user_data;
categories = [
  {'id': 'Cars', 'name': 'Cars'},
  {'id': 'Mobiles', 'name': 'Mobiles'},
  {'id': 'Bikes', 'name': 'Bikes'},
  {'id': 'Books, sports', 'name': 'Books, sports'},
  {'id': 'Pets', 'name': 'Pets'},
  {'id': 'Job', 'name': 'Job'}
];
addproDetail = {
  id: '',
  user_id: '',
  title: '',
  department: this.categories[0].id,
  description: '',
  min_bid: '',
  price: '',
  bid_time: '',
  state: '',
  city: '',
  area: '',
  item_image1: File = null,
  item_image2: File = null,
  item_image3: File = null
};
  constructor(
    public dialogRef: MatDialogRef<UpdateModalComponent>,
    @Inject(MAT_DIALOG_DATA) public data: any, private authenticate: Authenticate,
    private toastr: ToastsManager, private _vcr: ViewContainerRef) {
      console.log('data', this.data.data);
      this.addproDetail = {
        id: this.data.data.id,
        user_id: this.data.data.user_id,
        title: this.data.data.title,
        department: this.data.data.department,
        description: this.data.data.description,
        min_bid: this.data.data.min_bid,
        price: this.data.data.price,
        bid_time: this.data.data.bid_time,
        state: this.data.data.state,
        city: this.data.data.city,
        area: this.data.data.area,
        item_image1: File = null,
        item_image2: File = null,
        item_image3: File = null
      };
      this.toastr.setRootViewContainerRef(_vcr);
      this.user_data = JSON.parse(sessionStorage.getItem('userData'));
    }

  onNoClick(): void {
    this.dialogRef.close();
  }

  omit_special_char(event) {
    let k;
    k = event.charCode;  //         k = event.keyCode;  (Both can be used)
    return((k >= 48 && k <= 57));
  }
  changeListener($event, val): void {
    this.readThis($event.target, val);
  }

  readThis(inputValue: any, val): void {
    const file: File = inputValue.files[0];
    const myReader: FileReader = new FileReader();

    myReader.onloadend = (e) => {
      if (val === 0) {
        this.item_image1 = myReader.result.split(',')[1];
      }
      if (val === 1) {
        this.item_image2 = myReader.result.split(',')[1];
      }
      if (val === 2) {
        this.item_image3 = myReader.result.split(',')[1];
      }
    };
    myReader.readAsDataURL(file);
  }
// form submitting
updateProducts() {
  this.addproDetail.user_id = this.user_data.id;
  this.addproDetail.item_image1 = this.item_image1;
  this.addproDetail.item_image2 = this.item_image2;
  this.addproDetail.item_image3 = this.item_image3;
  // const fd = new FormData();
  // fd.append('product', JSON.stringify(this.addproDetail));
  // fd.append('item_image1', this.item_image1);
  // fd.append('item_image2', this.item_image2);
  // fd.append('item_image3', this.item_image3);
  if (this.addproDetail.title && this.addproDetail.department && this.addproDetail.description
    && this.addproDetail.min_bid && this.addproDetail.price && this.addproDetail.bid_time && this.addproDetail.city && this.item_image1) {
    this.authenticate.addProduct(this.addproDetail).subscribe(result => {
      if (result.Status === true) {
        this.addproDetail = {
          id: '',
          user_id: '',
          title: '',
          department: '',
          description: '',
          min_bid: '',
          price: '',
          bid_time: '',
          state: '',
          city: '',
          area: '',
          item_image1: File = null,
          item_image2: File = null,
          item_image3: File = null
        };
        this.toastr.success('Product Addedd.', 'Success');
        this.dialogRef.close();
        return;
      } else {
        this.toastr.info('Please try again later.', 'Info');
      }
   },
     err => {
       }
    );
  } else {
    this.toastr.info('Please all details and add one image atleast.', 'Info');
  }
}

}
