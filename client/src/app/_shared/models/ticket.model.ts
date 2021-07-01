export interface TicketDetail {
    id:number,
    film_id:number;
    seats: Array<string>,
    phone_number:string,
    user_id:number,
    screening_id:number,
    combo_id:number,
    discount_id:number,
    status:number,
    order_date:Date,
    ticket_price: number,
    total_price:number
}