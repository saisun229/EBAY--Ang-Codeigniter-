import { Component, OnInit } from '@angular/core';
import {Authenticate} from '../authenticate-service';

@Component({
  selector: 'app-sidebar',
  templateUrl: './sidebar.component.html',
  styleUrls: ['./sidebar.component.css']
})
export class SidebarComponent implements OnInit {
  public userData = {};
  constructor(private authenticate: Authenticate) {
    const  userData = JSON.parse(sessionStorage.getItem('userData'));
    this.userData = userData;
  }

  ngOnInit() {
  }
  search (category) {
    this.authenticate.searchCategory(category);
  }
  // typesOfShoes = ['Boots', 'Clogs', 'Loafers', 'Moccasins', 'Sneakers'];

}
