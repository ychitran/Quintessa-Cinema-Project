import { Component, OnInit } from '@angular/core';
import { Staff } from 'src/app/_shared/models/staff.model';
import { StaffService } from '../staff.service';

@Component({
  selector: 'app-list-staff',
  templateUrl: './list-staff.component.html',
  styleUrls: ['./list-staff.component.scss']
})
export class ListStaffComponent implements OnInit {
  staffs : Array<Staff>
  constructor(
    private readonly staffService: StaffService

  ) { }

  ngOnInit(): void {
    this.loadList();

  }

  loadList(keyword= ''):void  {
    this.staffService.getList(keyword).subscribe(res => this.staffs = res);
  }

  loadListSearch($event):void  {
    this.staffService.getListSearch($event).subscribe(res => this.staffs = res);
  }

  remove(id):void {
    if(!confirm("Bạn có chắc muốn xóa?")) {
      return;
    } 
    this.staffService.remove(id).subscribe(
      res => this.loadList() 
      ,
      err => alert('Xóa thất bại')
    )
    
  }

}
