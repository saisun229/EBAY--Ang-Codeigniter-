import { Component, Inject, Directive, OnInit, forwardRef, Attribute, OnChanges, SimpleChanges,
  Input, ViewContainerRef } from '@angular/core';
import {BrowserModule} from '@angular/platform-browser';
// import { Router } from '@angular/router';
import {platformBrowserDynamic} from '@angular/platform-browser-dynamic';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material';
import {Authenticate} from '../authenticate-service';
import { ToastsManager } from 'ng2-toastr';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-header-component',
  templateUrl: './header-component.component.html',
  styleUrls: ['./header-component.component.css']
})
export class HeaderComponentComponent implements OnInit {
  user_data: any;
  constructor(private router: Router, public dialog: MatDialog, private authenticate: Authenticate,
    private toastr: ToastsManager, private _vcr: ViewContainerRef) {
    this.toastr.setRootViewContainerRef(_vcr);
    this.user_data = JSON.parse(sessionStorage.getItem('userData'));
  }

  ngOnInit() {
  }
  signOut() {
    sessionStorage.setItem('userData', null);
    this.user_data = '';
    this.router.navigate(['dashboard']);
  }

  openDialog(): void {
    if (this.user_data) {
      const dialogRef = this.dialog.open(AddProductComponent, {
        width: '550px',
        height: '600px',
        data: {
          data : this.user_data
        }
      });
      dialogRef.afterClosed().subscribe(result => {
        this.authenticate.updateProduct();
      });
    } else {
      this.toastr.info('Please login to add product.', 'Info');
    }
  }

  navigate () {
    this.router.navigate(['Login']);
  }
  navigateAllProducts () {
    this.router.navigate(['allproducts']);
  }

}


@Component({
  selector: 'app-add-product-component',
  templateUrl: 'add-product.component.html',
})
export class AddProductComponent {
  // addproduct: any;
//  public addproDetail: any;
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
  user_id: '',
  title: '',
  department: this.categories[0].id,
  bid_status:'active',
  description: '',
  min_bid: '',
  first_min_bid: '',
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
    public dialogRef: MatDialogRef<AddProductComponent>,
    @Inject(MAT_DIALOG_DATA) public data: any, private authenticate: Authenticate,
    private toastr: ToastsManager, private _vcr: ViewContainerRef) {
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
//sendmail

  sendmail(){
    
      if (this.user_data ) {
        this.authenticate.sendMail(this.user_data).subscribe(result => {
          if (result.Status === true) {
            this.toastr.success('mail sended succesfully.', 'Success');
          } else {
            this.toastr.success('mail not sent.', 'Success');
          }
       },
         err => {
           }
        );
      }
    }
  
// form submitting
addproducts() {
  this.addproDetail.user_id = this.user_data.id;
  this.addproDetail.item_image1 = this.item_image1;
  this.addproDetail.item_image2 = this.item_image2;
  this.addproDetail.item_image3 = this.item_image3;
  this.addproDetail.first_min_bid = this.addproDetail.min_bid;
  // const fd = new FormData();
  // fd.append('product', JSON.stringify(this.addproDetail));
  // fd.append('item_image1', this.item_image1);
  // fd.append('item_image2', this.item_image2);
  // fd.append('item_image3', this.item_image3);
  if (this.addproDetail.title && this.addproDetail.department && this.addproDetail.description
    && this.addproDetail.min_bid && this.addproDetail.price && this.addproDetail.bid_time && this.addproDetail.city && this.item_image1 ) {
    this.authenticate.addProduct(this.addproDetail).subscribe(result => {
      if (result.Status === true) {
        this.addproDetail = {
          user_id: '',
          title: '',
          department: '',
          bid_status:'',
          description: '',
          min_bid: '',
          price: '',
          bid_time: '',
          first_min_bid: '',
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
  }
}
}
