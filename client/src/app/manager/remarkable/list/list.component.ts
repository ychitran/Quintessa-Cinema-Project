import { Component, OnInit } from '@angular/core';
import { Remarkable } from 'src/app/_shared/models/remarkable.model';
import { RemarkableService } from '../remarkable.service';

@Component({
  selector: 'app-list',
  templateUrl: './list.component.html',
  styleUrls: ['./list.component.scss']
})
export class ListComponent implements OnInit {

  remarkables : Array<Remarkable>
  category: string
  status : number = 1
  constructor(
    private readonly remarkableService: RemarkableService
  ) { }

  ngOnInit(): void {
    this.loadList();
  }
  loadList():void  {
    this.remarkableService.getList().subscribe(res => this.getList(res));
  }
  getList(res): void {
    this.category = res.categories
    this.status = res.status
    this.remarkables = res;
  }

  changeStatus(id,status) {
    this.remarkableService.changStatus(id,status).subscribe(
      res => { alert('thay đổi trạng thái thành công!')
      this.loadList();
    },
    err => alert('Thay đổi trạng thái thất bại')
    )
  }

}
