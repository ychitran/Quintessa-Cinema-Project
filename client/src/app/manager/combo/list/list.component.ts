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
    this.comboService.getList(keyword).subscribe(res => this.combos = res);
  }

  remove(id):void {
    if(!confirm("Bạn có chắc muốn xóa?")) {
      return;
    } 
    this.comboService.remove(id).subscribe(
      res => this.loadList() 
      ,
      err => alert('Xóa thất bại')
    )
    
  }

}
