@include('admin.layouts.header')

@php
    //$cart=App\cart_table::all();
    $orders=App\tbl_order::all();
    $day=['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
    $month=['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Dec'];
   
@endphp
    <div class="content-body card" style="margin: 2px 2px 2px 2px;border: 5px #eee solid;">
        <table class="card table" >
             @foreach($orders as $order)
            <tr>
                <td><h6>Order No</h6></td>
                <td><h6>Customer</h6></td>
                <td><h6>Products</h6></td>
                <td><h6>Subtotal</h6></td>
                <td><h6>Tax</h6></td>
                <td><h6>Tip</h6></td>
                <td><h6>Total</h6></td>
                <td><h6>Order Date</h6></td>
               
                <td><h6>Shop</h6></td>
            </tr>
           
            <tr >
                <td><h6>{{$order->id}}</h6></td>
                @php
                    $u=$order->user_id;
                    $user=App\User::find($u);
                    $d=explode(',',$order->later_date);
                    $date=$d[0];
                    $weekday=$d[1];
                    $cur_month=$d[2];
                @endphp
                <td><h6>{{$user->first_name}} {{$user->last_name}} </h6>
                    <h6> {{$user->email}} </h6>
                    <h6>{{$user->cell_number1}}</h6>
                
                </td>
                @php
                    $cart=App\cart_table::where('order_id',$order->id)->get();
                    //print_r($cart) ;
                @endphp
                <td style="padding:0">

                
                @foreach($cart as $con)
               
                    <div style="border:1px #eee solid">
                        <h6 style = "margin:0;font-size:12px" >Quantity:{{$con->quantity}}</h6><br>
                        <h6 style = "margin:0;font-size:12px" >{{$con->name}}</h6><br>
                        <h6 style = "margin:0;" >${{$con->price}}</h6>
                        <h6><b>Special Instruction:</b>{{$con->special_instruction}}</h6>
                  </div>
                   
               

                @endforeach
                </td>
                <td><h6>${{$order->subtotal}}</h6></td>
                <td><h6>${{$order->total_tax}}</h6></td>
                <td><h6>${{$order->tip}}</h6></td>
                <td><h6>${{$order->total}}</h6></td>
                {{-- <td><h6>{{$order->later_date}}</h6></td> --}}
                <td><h6>{{$day[$weekday]}}  {{$date}} {{$month[$cur_month]}}</h6></td>
               
                {{-- <td><h6>{{$order->shop_id}}</h6></td> --}}
                <td>
                  @if($order->shop_id==1)
                        <h3 style="margin:0;font-size: 20px;">Frito Chicken</h3>
                        <h6 style="margin-top: 7px;font-size: 12px;">44650 Waxpool<br> Rd #100 Ashburn VA 20147 
                        </h6>
                        @endif
                        @if($order->shop_id==2)
                        <h3 style="margin:0;font-size: 20px;">Frito Chicken</h3>
                        <h6 style="margin-top: 7px;font-size: 12px;">6007 Centreville<br> Crest Lane Centreville VA 20121 
                    
                        </h6>
                        @endif
                        @if($order->shop_id==3)
                        <h3 style="margin:0;font-size: 20px;">Frito Chicken</h3>
                        <h6 style="margin-top: 7px;font-size: 12px;">6699 B Frontier<br> Dr Springfield VA 22150
                    
                        </h6>
                   @endif 
                 </td>      
            </tr>
            
            @endforeach
        </table>
    </div>
@include('admin.layouts.footer')