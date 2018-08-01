import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import {HttpClientModule} from '@angular/common/http';
import {HttpModule} from '@angular/http';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import {NoopAnimationsModule} from '@angular/platform-browser/animations';
import { RouterModule, Routes } from '@angular/router';
import { NgxCarouselModule } from 'ngx-carousel';
import {CdkTableModule} from '@angular/cdk/table';
import { PopoverModule } from 'ng2-popover';
import {Authenticate} from './authenticate-service';
import { StorageServiceModule} from 'angular-webstorage-service';
import { ToastModule } from 'ng2-toastr/ng2-toastr';
//import { FlexLayoutModule } from '@angular/flex-layout';

// import {AuthGuard} from './auth.guard';


import { AppComponent } from './app.component';
import { LoginComponent } from './login/login.component';
import { DashboardComponent, UpdateModalComponent} from './dashboard/dashboard.component';
import { EqualValidator } from './login/password.match.directive';
import { SidebarComponent } from './sidebar/sidebar.component';
import { HeaderComponentComponent, AddProductComponent } from './header-component/header-component.component';
import { SingleProductComponent } from './single-product/single-product.component';
import { UserRegistrationComponent } from './user-registration/user-registration.component';
import { ProductListComponent } from './product-list/product-list.component';
import {CountDown} from 'ng2-date-countdown';

import {
  MatAutocompleteModule,
  MatButtonModule,
  MatButtonToggleModule,
  MatCardModule,
  MatCheckboxModule,
  MatChipsModule,
  MatDialogModule,
  MatExpansionModule,
  MatGridListModule,
  MatIconModule,
  MatInputModule,
  MatListModule,
  MatMenuModule,
  MatNativeDateModule,
  MatProgressBarModule,
  MatProgressSpinnerModule,
  MatRadioModule,
  MatRippleModule,
  MatSelectModule,
  MatSliderModule,
  MatSlideToggleModule,
  MatSnackBarModule,
  MatSortModule,
  MatTableModule,
  MatTabsModule,
  MatToolbarModule,
  MatTooltipModule,
  MatStepperModule
} from '@angular/material';
import { FilterPipe } from './dashboard/filter.pipe';
//import { FilterBidPipe } from './my-bid/filter.pipe';
import { MyBidComponent } from './my-bid/my-bid.component';
import { ContactUsComponent } from './contact-us/contact-us.component';
import { MyHistoryComponent } from './my-history/my-history.component';

const appRoutes: Routes = [
  // { path: '', component: AppComponent },
  // ,canActivate: [AuthGuard]
  { path: '', redirectTo: '/dashboard', pathMatch: 'full' },
  { path: 'dashboard', component: ProductListComponent},
  { path: 'Login', component: LoginComponent  },
  { path: 'user-registration', component: UserRegistrationComponent },
  { path: 'my-products', component: DashboardComponent},
  { path: 'my-bids', component: MyBidComponent},
  { path: 'my-history', component: MyHistoryComponent},
  { path: 'contactus', component: ContactUsComponent},
  { path: 'single-product/:id', component: SingleProductComponent },
  { path: '**', redirectTo: '/dashboard'}
];

@NgModule({
  entryComponents: [DashboardComponent, AddProductComponent, UpdateModalComponent],
  declarations: [
    AppComponent,
    LoginComponent,
    DashboardComponent,
    EqualValidator,
    SidebarComponent,
    HeaderComponentComponent,
    AddProductComponent,
    SingleProductComponent,
    UserRegistrationComponent,
    ProductListComponent,
    FilterPipe,
    //FilterBidPipe,
    UpdateModalComponent,
    CountDown,
    MyBidComponent,
    ContactUsComponent,
    MyHistoryComponent
  ],

  imports: [
    BrowserModule,
    CdkTableModule,
    BrowserAnimationsModule,
    NoopAnimationsModule,
    PopoverModule,
    MatAutocompleteModule,
    MatButtonModule,
    MatButtonToggleModule,
    MatCardModule,
    MatCheckboxModule,
    MatChipsModule,
    MatDialogModule,
    MatExpansionModule,
    MatGridListModule,
    MatIconModule,
    MatInputModule,
    MatListModule,
    MatMenuModule,
    MatNativeDateModule,
    MatProgressBarModule,
    MatProgressSpinnerModule,
    MatRadioModule,
    MatRippleModule,
    MatSelectModule,
    MatSliderModule,
    MatSlideToggleModule,
    MatSnackBarModule,
    MatSortModule,
    MatTableModule,
    MatTabsModule,
    MatToolbarModule,
    MatTooltipModule,
    MatStepperModule,
    FormsModule,
    ReactiveFormsModule,
    NgxCarouselModule,
    HttpModule,
    //FlexLayoutModule,
    StorageServiceModule,
    HttpClientModule,
    ToastModule.forRoot(),
    RouterModule.forRoot(
      appRoutes,
      { enableTracing: true }
    ),
  ],
  providers: [Authenticate],
  bootstrap: [AppComponent],
})
// AuthGuard
export class AppModule { }
