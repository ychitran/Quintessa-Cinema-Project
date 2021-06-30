export interface Discount {
    id:number,
    information:string,
    start_time:Date,
    end_time:Date,
    category_discount: string,
    discount_method:string,
    discount_value:number
}