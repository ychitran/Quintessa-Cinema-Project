import { Component, OnInit } from '@angular/core';
import { Advertisement } from 'src/app/_shared/models/advertisement.model';
import { AdvertisementService } from '../advertisement.service';

@Component({
  selector: 'app-list',
  templateUrl: './list.component.html',
  styleUrls: ['./list.component.scss']
})
export class ListComponent implements OnInit {
  ads : Array<Advertisement>
  constructor(
    private readonly advertisementService : AdvertisementService
  ) { }

  ngOnInit(): void {
    this.loadList();
  }
  loadList(keyword= ''):void  {
    this.advertisementService.getList(keyword).subscribe(res => this.ads = res);
  }

  remove(id):void {
    if(!confirm("Bạn có chắc muốn xóa?")) {
      return;
    } 
    this.advertisementService.remove(id).subscribe(
      res => this.loadList() 
      ,
      err => alert('Xóa thất bại')
    )
    
  }

}
