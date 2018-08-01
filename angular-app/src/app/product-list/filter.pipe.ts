import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filter'
})
export class FilterPipe implements PipeTransform {

  transform(productList: any= [], productFilter: any): any {
   if (productFilter === undefined) {
    return productList;
   }
   return productList.filter(function(product) {
     console.log('productList', productList);
    return (product.title.toLowerCase().includes(productFilter.toLowerCase()) ||
    product.department.toLowerCase().includes(productFilter.toLowerCase()));
   });
  }

}
