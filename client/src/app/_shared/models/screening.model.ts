import { Time } from "@angular/common";

export interface Screening {
    id:number,
    date:Date,
    start_time:Time,
    film_id:number,
    room_id:number
}