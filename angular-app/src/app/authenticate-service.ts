import { Injectable } from '@angular/core';
// import { Headers, Http ,RequestOptions} from '@angular/http';

import 'rxjs/add/operator/toPromise';
import { Http, Response, Headers, RequestOptions } from '@angular/http';
import { Observable } from 'rxjs/Observable';

// Observable class extensions
import 'rxjs/add/observable/of';
import 'rxjs/add/observable/throw';
import 'rxjs/add/operator/map';
import 'rxjs/add/operator/toPromise';
// Observable operators
import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/debounceTime';
import 'rxjs/add/operator/distinctUntilChanged';
import 'rxjs/add/operator/do';
import 'rxjs/add/operator/filter';
import 'rxjs/add/operator/map';
import 'rxjs/add/operator/switchMap';
import {Subject} from 'rxjs/Subject';
@Injectable()
export class Authenticate {
 //  private AppUrl = 'http://sslabs.info/olx';
  private AppUrl = 'http://localhost/olx';
    headers: Headers;
    options: RequestOptions;

    constructor(private http: Http) {
        this.headers = new Headers({ 'Content-Type': 'application/json', 'Accept': 'q=0.8;application/json;q=0.9' });
        this.options = new RequestOptions({ headers: this.headers });
    }
    invokeEvent: Subject<any> = new Subject();
    searchEvent: Subject<any> = new Subject();
    updateProduct() {
        this.invokeEvent.next();
    }
    searchCategory(category) {
        this.searchEvent.next(category);
    }
    authenticateService(user): Observable<any> {
        const header = new Headers();
        header.append('Content-Type',  'application/x-www-form-urlencoded; charset=UTF-8');
        return this.http
            .post(this.AppUrl + '/Sell_buy/signin', user, { headers: header })
            .map((res: Response) => res.json())
            .catch((error: any) => Observable.throw(error.json().error || 'Server error'));
    }
    addProduct(product: any): Observable<any> {
        const header = new Headers();
        header.append('Content-Type',  'application/x-www-form-urlencoded; charset=UTF-8');
        return this.http
            .post(this.AppUrl + '/Sell_buy/add_product', product, { headers: header })
            .map((res: Response) => res.json())
            .catch((error: any) => Observable.throw(error.json().error || 'Server error'));
    }
    getProductList(userId: any): Observable<any> {
        const header = new Headers();
        header.append('Content-Type',  'application/x-www-form-urlencoded; charset=UTF-8');
        return this.http
            .post(this.AppUrl + '/Sell_buy/get_products_list', userId, { headers: header })
            .map((res: Response) => res.json())
            .catch((error: any) => Observable.throw(error.json().error || 'Server error'));
    }
    biddingProducts(bid_obj: any): Observable<any> {
        const header = new Headers();
        header.append('Content-Type',  'application/x-www-form-urlencoded; charset=UTF-8');
        return this.http
            .post(this.AppUrl + '/Sell_buy/bidding_products', bid_obj, { headers: header })
            .map((res: Response) => res.json())
            .catch((error: any) => Observable.throw(error.json().error || 'Server error'));
    }
    proceedBuy(bid_winner: any): Observable<any> {
        const header = new Headers();
        header.append('Content-Type',  'application/x-www-form-urlencoded; charset=UTF-8');
        return this.http
            .post(this.AppUrl + '/Sell_buy/bidding_products_buy', bid_winner, { headers: header })
            .map((res: Response) => res.json())
            .catch((error: any) => Observable.throw(error.json().error || 'Server error'));
    }
    register_user(user: any): Observable<any> {
        const header = new Headers();
        header.append('Content-Type',  'application/x-www-form-urlencoded; charset=UTF-8');
        return this.http
        .post(this.AppUrl + '/Sell_buy/signup', user, { headers: header })
        .map((res: Response) => res.json())
        .catch((error: any) => Observable.throw(error.json().error || 'Server error'));
    }
    delete_product(product_id: any): Observable<any> {
        const header = new Headers();
        header.append('Content-Type',  'application/x-www-form-urlencoded; charset=UTF-8');
        return this.http
        .post(this.AppUrl + '/Sell_buy/delete_products', product_id, { headers: header })
        .map((res: Response) => res.json())
        .catch((error: any) => Observable.throw(error.json().error || 'Server error'));
    }
    cancel_bid(product_id: any): Observable<any> {
        const header = new Headers();
        header.append('Content-Type',  'application/x-www-form-urlencoded; charset=UTF-8');
        return this.http
        .post(this.AppUrl + '/Sell_buy/cancel_bidding_products', product_id, { headers: header })
        .map((res: Response) => res.json())
        .catch((error: any) => Observable.throw(error.json().error || 'Server error'));
    }
    getBidProductList(userId: any): Observable<any> {
        const header = new Headers();
        header.append('Content-Type',  'application/x-www-form-urlencoded; charset=UTF-8');
        return this.http
            .post(this.AppUrl + '/Sell_buy/bid_products_list', userId, { headers: header })
            .map((res: Response) => res.json())
            .catch((error: any) => Observable.throw(error.json().error || 'Server error'));
    }
   sendMail(user): Observable<any> {
        const header = new Headers();
        header.append('Content-Type',  'application/x-www-form-urlencoded; charset=UTF-8');
        return this.http
            .post(this.AppUrl + '/Sell_buy/send_mail', user, { headers: header })
            .map((res: Response) => res.json())
            .catch((error: any) => Observable.throw(error.json().error || 'Server error'));
    } 
    addComment(user): Observable<any> {
        const header = new Headers();
        header.append('Content-Type',  'application/x-www-form-urlencoded; charset=UTF-8');
        return this.http
            .post(this.AppUrl + '/Sell_buy/add_comment', user, { headers: header })
            .map((res: Response) => res.json())
            .catch((error: any) => Observable.throw(error.json().error || 'Server error'));
    }
    completeBid(bid_winner: any): Observable<any> {
        const header = new Headers();
        header.append('Content-Type',  'application/x-www-form-urlencoded; charset=UTF-8');
        return this.http
            .post(this.AppUrl + '/Sell_buy/complete_bidding', bid_winner, { headers: header })
            .map((res: Response) => res.json())
            .catch((error: any) => Observable.throw(error.json().error || 'Server error'));
    }
    declareWinner(bid_winner: any): Observable<any> {
       const header = new Headers();
        header.append('Content-Type',  'application/x-www-form-urlencoded; charset=UTF-8');
       return this.http
            .post(this.AppUrl + '/Sell_buy/declare_winner', bid_winner, { headers: header })
          .map((res: Response) => res.json())
            .catch((error: any) => Observable.throw(error.json().error || 'Server error'));
   }
}
