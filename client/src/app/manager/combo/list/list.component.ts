import { Component, OnInit } from '@angular/core';
import { Combo } from 'src/app/_shared/models/combo.model';
import { ComboService } from '../combo.service';

@Component({
  selector: 'app-list',
  templateUrl: './list.component.html',
  styleUrls: ['./list.component.scss']
})
export class ListComponent implements OnInit {
  combos: Array<Combo>
  constructor(
    private readonly comboService:ComboService
  ) { }

  ngOnInit(): void {
    this.loadList();
  }
  loadList(keyword= ''):void  {
    this.comboService.getList(keyword).subscribe(res => this.getList(res));
  }
  getList(res): void {
    this.combos = res.data;
  }

  remove(id):void {
    if(!confirm("Bạn có chắc muốn xóa?")) {
      return;
    } 
    this.comboService.remove(id).subscribe(
      res =>{
        alert('Xóa thành công')
        this.loadList() 
      }
      ,
      err => alert('Xóa thất bại')
    )
    
  }

}
