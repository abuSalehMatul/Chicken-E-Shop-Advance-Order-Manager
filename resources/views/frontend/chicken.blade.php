<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Order</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.menu-item {
    color: #1C494D;
    display: block;
    line-height: 1.4;
    margin: 0 -30px 0 -45px;
    position: relative;
    padding: 7px 100px 7px 45px;
    text-decoration: none!important;
}
  .menu-item .heading {
    font-size: 16px;
}

.menu__items .heading {
    color: #1C494D;
    display: block;
    margin-bottom: 2px;
}

.menu-item__description {
    font-size: 13px;
    margin: 0;
}

.menu-item .price {
    font-size: 18px;
    position: absolute;
    right: 30px;
    top: 7px;
}

.item-back, .price {
    font-family: jaf-bernino-sans-comp,Helvetica,Arial,sans-serif;
    font-weight: 700;
    letter-spacing: 1px;
    text-align: right;
}

.varradio {
    display: inline-block;
    margin-bottom: 1.5rem;
    margin-left: 7%;
    font-size: 15px;
}

.contact100-form-btn {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: auto;
    padding: 0 20px;
    width: 90%;
    height: 50px;
    border-radius: 10px;
    background: #6675df;
    font-family: Montserrat-Bold;
    font-size: 12px;
    color: #fff;
    line-height: 1.2;
    text-transform: uppercase;
    letter-spacing: 1px;
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    -moz-transition: all 0.4s;
    margin-right: 5%;
    transition: all 0.4s;
}

.open
{
  display: block;
}

.close
{
  display: none;
}

.order-particulars__info {
    background: #fbfbfb;
    border-bottom: 1px solid #eee;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 1;
    margin: 0;
    overflow: hidden;
    padding: 10px 15px;
}

.heading {
    font-family: jaf-bernino-sans-condensed,Helvetica,Arial,sans-serif;
}

.order-particulars__info .address {
    font-size: 12px;
    font-weight: 100;
    line-height: 16px;
}
.cart-list-item .mods, .item-options-list .price, .order-particulars__info .address {
    font-family: ff-tisa-web-pro,Georgia,"Times New Roman",serif;
}

.cart-item-name, .order-particulars__info {
    text-overflow: ellipsis;
    white-space: nowrap;
}

.cart-checkout {
    -webkit-align-self: flex-end;
    -ms-flex-item-align: end;
    align-self: flex-end;
    color: #85939e;
    -webkit-flex-shrink: 0;
    -ms-flex-negative: 0;
    flex-shrink: 0;
    padding: 15px;
    width: 100%;
}
.cart-checkout, .cart-terms {
    background: #fff;
}
.pane-stack__pane {
    border: 0;
    padding: 0;
    width: 100%;
}

.cart-checkout__list {
    width: 100%;
    margin-bottom: 10px;
    font-family: jaf-bernino-sans-comp,Helvetica,Arial,sans-serif;
    color: #999;
    letter-spacing: 1px;
}

.cart-checkout__list>li:last-child {
    border: none;
}
.cart-checkout__list>li {
    border-bottom: 1px #f2f2f2 solid;
    padding: 2px 0;
    position: relative;
    background-color: #fbfbfb;
    font-size: 1.4em;
}

.total
{
  width: 100%;
  margin-bottom: 10px;
  font-family: jaf-bernino-sans-comp,Helvetica,Arial,sans-serif;
  color: #999;
  letter-spacing: 1px;
}

#itemhere3
{
  overflow-y: hidden !important;
}

.map {
    margin-left: -61%;
    margin-top: 64.5%;
}

.carts
{
    margin-left: -13%;
    margin-top: -4%;
    padding: 2%;
    width: 129%;
}

iframe {
    border: none !important;
}

.time:hover {
    background: #f5fafd;
    cursor: pointer;
}

.time-picker__methods .ss-check {
    color: #5cb85c;
    font-size: 15px;
    margin-right: 2px;
    top: 3px;
}

.selectbtn
{
    background-color: #53a653;width: 100%;box-shadow: 0 1px 0 #408140;color: #fff;border-radius: 2px;font-weight: 600;font-size: 18px;line-height: 1;padding: 15px 12px;
}

.no-touch .day-picker>li:hover a {
    color: #3498db;
}

.selectdate {
    color: #3498db;
    border-radius: 3px;
    background: #e9e8eb;
}

.col-md-12 {
    -webkit-box-flex: 0;
    -webkit-flex: 0 0 100%;
    -moz-box-flex: 0;
    -ms-flex: 0 0 100%;
    flex: 0 0 125% !important;
    max-width: 125% !important;
}
.fa-facebook{
    content:"\f39e";
}
</style>
@include('frontend.layout.style')
@include('frontend.layout.js')
<script>

    $(document).on('click', '.timing', function(){
        
        $('.timing').removeClass("selectbtn");
        $(this).addClass("selectbtn");
        
        var text = $(this).text();
        
        $('#inputtime').val(text);
        
        
        $('#pickupdate').html(text);
        
    });
    
    $(document).on('click', '.timedate', function(){
        
        var html = '';
        
        $('.timedate').removeClass("selectdate");
        $(this).addClass("selectdate");
        
        var item1 = $(this).find(".selectdate,.day-picker__day-word").text();
        var item2 = $(this).find(".selectdate,.day-picker__day-number").text();
        
        var item3 = $('#inputtime').val();
        $('#inputdate').val(item1+" "+item2);
        
        $('#pickupday').html(item1);
        
        
        $('#ember1921').attr('style','height: 100%;');
        
        html = `<ul>
    <li class="time" data-ember-action="1404">
        <button type="button" class="timing" data-timig="11:00 am">11:00 am</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup</strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1406">
        <button type="button" class="timing" data-timig="11:15 am">11:15 am</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1408">
        <button type="button" class="timing" data-timig="11:30 am">11:30 am</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1410">
        <button type="button" class="timing" data-timig="11:45 am">11:45 am</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1411">
        <button type="button" class="timing" data-timig="12:00 pm">12:00 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1411">
        <button type="button" class="timing" data-timig="12:15 pm">12:15 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1413">
        <button type="button" class="timing" data-timig="12:30 pm">12:30 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1412">
        <button type="button" class="timing" data-timig="12:45 pm">12:45 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1414">
        <button type="button" class="timing" data-timig="1:00 pm">1:00 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1415">
        <button type="button" class="timing" data-timig="1:15 pm">1:15 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1416">
        <button type="button" class="timing" data-timig="1:30 pm">1:30 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1418">
        <button type="button" class="timing" data-timig="1:45 pm">1:45 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1419">
        <button type="button" class="timing" data-timig="2:00 pm">2:00 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1420">
        <button type="button" class="timing" data-timig="2:15 pm">2:15 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1421">
        <button type="button" class="timing" data-timig="2:30 pm">2:30 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1422">
        <button type="button" class="timing" data-timig="2:45 pm">2:45 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1423">
        <button type="button" class="timing" data-timig="3:00 pm">3:00 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1424">
        <button type="button" class="timing" data-timig="3:15 pm">3:15 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1425">
        <button type="button" class="timing" data-timig="3:30 pm">3:30 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1425">
        <button type="button" class="timing" data-timig="3:45 pm">3:45 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1426">
        <button type="button" class="timing" data-timig="4:00 pm">4:00 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1427">
        <button type="button" class="timing" data-timig="4:30 pm">4:30 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1428">
        <button type="button" class="timing" data-timig="4:30 pm">4:30 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1429">
        <button type="button" class="timing" data-timig="4:45 pm">4:45 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1430">
        <button type="button" class="timing" data-timig="5:00 pm">5:00 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1431">
        <button type="button" class="timing" data-timig="5:15 pm">5:15 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1432">
        <button type="button" class="timing" data-timig="5:30 pm">5:30 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1432">
        <button type="button" class="timing" data-timig="5:45 pm">5:45 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1433">
        <button type="button" class="timing" data-timig="6:00 pm">6:00 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1434">
        <button type="button" class="timing" data-timig="6:15 pm">6:15 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1435">
        <button type="button" class="timing" data-timig="6:30 pm">6:30 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1436">
        <button type="button" class="timing" data-timig="6:45 pm">6:45 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1437">
        <button type="button" class="timing" data-timig="7:00 pm">7:00 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1438">
        <button type="button" class="timing" data-timig="7:15 pm">7:15 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1439">
        <button type="button" class="timing" data-timig="7:30 pm">7:30 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1440">
        <button type="button" class="timing" data-timig="7:45 pm">7:45 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1441">
        <button type="button" class="timing" data-timig="8:00 pm">8:00 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1442">
        <button type="button" class="timing" data-timig="8:15 pm">8:15 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1443">
        <button type="button" class="timing" data-timig="8:30 pm">8:30 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1444">
        <button type="button" class="timing" data-timig="8:45 pm">8:45 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
    <li class="time" data-ember-action="1445">
        <button type="button" class="timing" data-timig="9:00 pm">9:00 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
      <li class="time" data-ember-action="1446">
        <button type="button" class="timing" data-timig="9:15 pm">9:15 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
      <li class="time" data-ember-action="1447">
        <button type="button" class="timing" data-timig="9:30 pm">9:30 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
      <li class="time" data-ember-action="1448">
        <button type="button" class="timing" data-timig="9:45 pm">9:45 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
      <li class="time" data-ember-action="1449">
        <button type="button" class="timing" data-timig="10:00 pm">10:00 pm</button>
        <ul class="time-picker__methods">
          <li><span class="ss-icon ss-check text--success"></span><strong>pickup </strong></li>
        </ul>
    </li>
     
</ul>`
        
        $('#ember1211').html(html);
        
    });
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery.session@1.0.0/jquery.session.js"></script>
<script>
  $(document).ready(function() {

    var session = $.session.get("productid");
    var total = $.session.get("total");

    if(session == undefined)
    {
      $('#checkoutbtn').attr('disabled','disabled');
    }
    else
    {
      $('.subtotal').text('$'+total);

      $('#itemhere').html('');
      $('#itemhere').html(session);

      $('#checkoutbtn').click();
    }

  });

  $(document).on('click','#checkoutbtn',function(){

    var productid = [];
    var qty = [];
    var total = $.session.get("total");
    var date = $('#inputdate').val();
    var time = $('#inputtime').val();

    $('.formqty').each(function(){

       qty.push($(this).val());

    });

    $('.formid').each(function(){

       productid.push($(this).val());

    });

    $.ajax({
          url:'{{url("storeorder")}}',
          method:"GET",
          data:{productid:productid,qty:qty,total:total,date:date,time:time},
          dataType:'json',
          success:function(data)
          {
            shows_form_part(2);
            
            $('#checkoutbtn').attr('style','display:none');
          }
    });

  });

function check_dd() {
    if(document.getElementById('div')) {
        document.getElementById('test').style.display = 'none';
    document.getElementById('test1').style.display = 'block';
    } 
  
  if(document.getElementById('div1')){
     document.getElementById('test1').style.display = 'none';
    document.getElementById('test').style.display = 'block';
  } 
}
$(document).ready(
    function() {
        $("#div").click(function() {
            $("#test1").fadeToggle();
      document.getElementById('test').style.display = 'none';
      document.getElementById('main').style.display = 'none';
        });
        
        $("#div1").click(function() {
            $("#test").fadeToggle();
      document.getElementById('test1').style.display = 'none';
      document.getElementById('main').style.display = 'none';
        });
     $("#back").click(function() {
            $("#main").fadeToggle();
      document.getElementById('test').style.display = 'none';
      document.getElementById('test1').style.display = 'none';
        });
     $("#back1").click(function() {
            $("#main").fadeToggle();
      document.getElementById('test').style.display = 'none';
      document.getElementById('test1').style.display = 'none';
        });

    

      $(".divmenu").click(function(){
        var id = $(this).attr('data-id');
        var html = '';


        $.ajax({

          url:'{{ url("fetchproduct") }}',
          method: 'GET',
          data: {id:id},
          dataType: "json",
          success:function(data)
          { 
            if(data == null || data == [''] || data == '')
            {
                if($('#category'+id).hasClass('open'))
                {
                    $('#category'+id).html('');
                    $('#category'+id).addClass('close');
                    $('#category'+id).removeClass('open');
                }
                else
                {
                   html = `
                     <ul class="menu__items" style="display: block;"><hr>
                       <li class="check">
                         No Data Found !!
                       </li>
                     </ul>
                   `;

                   $('#category'+id).append(html);
                   $('#category'+id).addClass('open');
                   $('#category'+id).removeClass('close'); 
                }
            }
            else
            {
                if($('#category'+id).hasClass('open'))
                {
                    $('#category'+id).html('');
                    $('#category'+id).addClass('close');
                    $('#category'+id).removeClass('open');
                }
                else
                {
                  var my_table = "";
                  $.each(data, function( key, row ) {

                    html = `
                      <ul class="menu__items" id="id.`+row['id']+`" style="display: block;">
                        <li class="check" id="`+row['product_id']+`">
                          <a class="menu-item">
                            <span class="heading heading--link">
                              `+row['name']+`
                            </span>
                            <p class="menu-item__description">`+row['description']+`</p>
                            <span class="price">`+row['regural_price']+`</span>
                          </a>
                        </li>
                      </ul>
                    `;

                    $('#category'+id).append(html);
                    $('#category'+id).addClass('open');
                    $('#category'+id).removeClass('close');
                  });
                }
            }
            
            
          }

        });
        //alert(id);
      });

      $(document).on('click','.check',function(){

        var id = $(this).attr('id');

        //$('#vardiv').html('');

        $.ajax({

          url:'{{ url("fetchvariation") }}',
          method: 'GET',
          data: {id:id},
          success:function(data)
          {

            json_data = $.parseJSON(data);

            $('#form_part4').attr('style','display:block;');
            $('#form_part3').attr('style','display:none;');
            $('#vardiv').append(json_data.DATA);
            $('#vardiv').append('<input type="text" id="productId" value="'+json_data.Id+'"');

            //$('.wrap-input104').html(json_data.DATA);
          }

        });

      });

      $(document).on('click','#addorderbtn',function(){

         var name = $('.varcheck:checked').val();
         var id = $('.productId').val();
         var qty = $('input[name=quantity]').val();

         var total = 0;

         var html = '';
         var amount = [];
         var productid = [];
         
         if(name == null || name == '' )
         {
             alert('Select Any Item');
         }
         else
         {
             $(id).each(function(){

            productid.push($(this).val());

            if(productid == null || productid == '')
            {
              productid.push($(this).val());
            }
            else
            {
              if(jQuery.inArray(id, productid) == -1)
              {
                productid.push($(this).val());
              }
            }

          });

         $.ajax({

            url:'{{ url("fetchproductdata") }}',
            data: {id:id},
            method:'GET',
            success:function(data)
            {

              var my_table = "";

              $.each(data, function( key, row ) {

                var price = row['regural_price'].substr(1);

                total = parseInt(qty) * price;

                html = `
                  <div class="wrap-pad">
                    <div class="item" style="background-color: #fbfbfb;">
                      <span class="cart-item__quantity text--center ">`+qty+` 
                      <input type="hidden" name="qty[]" class="formqty" value="`+qty+`">
                      </span>

                      <span class="cart-item-name" title="`+row['slug']+`">`+row['slug']+`</span>
                      <input type="hidden" name="productid[]" class="formid" value="`+id+`">
                      <div class="price">`+total+`<input type="hidden" value="`+total+`" name="total[]" class="total"></div>
                      <a class="ss-gizmo ss-delete remove remove_cart" href="javascript::void(0);" id="`+id+`" style="color:red">X</a>
                    </div>
                  </div>
                `;

              });

              var h = $('.subtotal1').text();

              var price = h.substr(1);

              var total1 = parseFloat(price) + parseFloat(total);

              $('#checkoutbtn').removeAttr('disabled','disabled');


              $('#itemhere').append(html);
              $('.subtotal').text('$'+total1);

              $('#itemhere3').append(html);
              $('.subtotal').text('$'+total1);

              var item = $('#itemhere2').html();

              $.session.set("productid", item);
              $.session.set("total", total1);
              
            }

         });
         }

      });
      
  });
    
    $(document).on('click', '.remove_cart', function(){
        $.session.clear();
    });

  /*$(document).on('click','#submenu', function(){
      var id = $(this).attr('data-id');
      var url = $('#getcategory_url').val();
      var spliting_url = url.split('').toString().replace();
      var modified_url = spliting_url+''+id;
      $.ajax({
          url :modified_url,
          type :'GET',
          success:function(response){
            json_data = $.parseJSON(response);
            if(json_data.ERROR == true){
            }else{
                $('#submenu').Appenddiv(json_data.DATA);        
            }
          }
      })
  });*/
function shows_form_part(n){
    var i = 1, p = document.getElementById("form_part"+1);
    while (p !== null){
        if (i === n){
            p.style.display = "";
        }
        else{
            p.style.display = "none";
        }
        i++;
        p = document.getElementById("form_part"+i);
    }
}
 function SelectFirst(SelVal) {
   var arrSelVal = SelVal.split(",")
   if (arrSelVal.length > 1) {
     Valuetoselect = arrSelVal[0];
     document.getElementById("select1").value = Valuetoselect;
   }
 }
  $(function(){
$("#ShowHide").click(function() {
    if($("#collapsable").is(":hidden"))
        $("#collapsable").show("fast");
    else $("#collapsable").hide("slow");;
});
});         
</script>
<script>
function expandCollapse() {
    if($(".divmenu").css('display') == 'none') {
        $("#expand-collapse").html("Collapse All");
        $(".divmenu").show("slow");
    } else {
        $("#expand-collapse").html("Expand All");
        $(".divmenu").hide("slow");
    }
}
</script>
</head>
<body>
    
    <input type="hidden" id="inputtime" class="inputtime"><input type="hidden" id="inputdate" class="inputdate">
    
    <div id="itemhere2" style="display: none;">
        <li class="cart-list-item" id="itemhere3" style="overflow-y: scroll; max-height: 200px; height: 180px; background-color: white;">
        </li>
    </div>
    
    <div class="col-md-12" style="margin-left: -29px;">
        <div class="col-md-5" style="float: left;">
            <input type="hidden" id="inputtime" class="inputtime"><input type="hidden" id="inputdate" class="inputdate">
            
            <div id="itemhere2" style="display: none;">
                <li class="cart-list-item" id="itemhere3" style="overflow-y: scroll; max-height: 200px; height: 180px; background-color: white;">
                </li>
            </div>
            
            <div class="container-contact100">
                <div class="wrap-contact100">
                    <form class="contact100-form validate-form" name="form_part1" id="form_part1">
                        <div class="label-input100">
                            <img class="cn-logo" height="19" alt="" src="{{asset('public/assets/front/images/Frito Chicken-01.jpg')}}">
                        </div>
                        <button type="button" onclick="shows_form_part(2)" name="btn" id="btn" class="contact101-form-btn" id="btn" ><span class="ss-gizmo ss-user"></span>Log In</button>
                        
                        <div class="wrap-input100">
                            <div id="location" class="label-input100">Super Chicken - Vienna</div>
                            <div class="wrap-input105">
                                <div class="label-input104" id="locationinfo" style="display:none;"><a href="#" style="font-size:12px;">44650 Waxpool Rd # 100 Ashburn VA 20147</a><br>
                                <a href="#" style="font-size:12px;">6007 Centreville Crest lane Centreville VA 20121</a><br>
                            <a href="#" style="font-size:12px;">6699 B Frontier Dr Springfield VA 22150 (opening Soon)</a></div>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <span class="focus-input100"></span>
                        </div>
                        
                        <div class="wrap-input101" id="main">
                            <div class="label-input101">Choose a time</div>
                            <div class="wrap-input105">
                                <div class="label-input103 div" id="div">
                                    <span>Order For Now </span>
                                    <p>Have your order prepared as soon as possible.</p><hr>
                                </div>
                            </div>
                            <div class="wrap-input105">
                                <div class="label-input103 div" id="div1">
                                    <span>Order For Later </span>
                                    <p>Have your order prepared at a specified future date & time.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="wrap-input100" id="test"  style="display:none" style="height:282px;">
                            <div id="ember1921" class="ember-view" style="height: 300px;">
                                <div id="ember1923" class="ember-view ember-view__accordion-overlay order-ahead active" style="display: block; top: 0px; opacity: 1;">
                                    <div class="order-ahead__days">
                                        <div class="order-ahead__header div">
                                            <span>Choose a Date &amp; Time</span>
                                            <a href="#" class="order-ahead__close"  data-ember-action="1943" id="back" style="font-size:12px;">
                                                <span class="ss-gizmo ss-navigateleft" ></span>Back
                                            </a>
                                        </div>
                                        <ul id="ember1924" class="ember-view day-picker">
                                        <li class="timedate">
                              <a class="time is-today" data-ember-action="1960" id="datepicker">
                                  <span class="day-picker__day-word">Today</span>
                                  <span class="day-picker__day-number">{{$newdate}}</span>
                              </a>
                          </li>
                          <li class="timedate">
                              <a class="time" data-ember-action="1962">
                                <span class="day-picker__day-word">{{$day2}}</span>
                                <span class="day-picker__day-number">{{$newdate2}}</span>
                              </a>
                          </li>
                          <li class="timedate">
                              <a class="time" data-ember-action="1964">
                                <span class="day-picker__day-word">{{$day3}}</span>
                                <span class="day-picker__day-number">{{$newdate3}}</span>
                              </a>
                          </li>
                          <li class="timedate">
                              <a class="time" data-ember-action="1966">
                                <span class="day-picker__day-word">{{$day4}}</span>
                                <span class="day-picker__day-number">{{$newdate4}}</span>
                              </a>
                          </li>
                          <li class="timedate">
                              <a class="time" data-ember-action="1966">
                                <span class="day-picker__day-word">{{$day5}}</span>
                                <span class="day-picker__day-number">{{$newdate5}}</span>
                              </a>
                          </li>
                          <li class="timedate">
                              <a class="time" data-ember-action="1970">
                                <span class="day-picker__day-word">{{$day6}}</span>
                                <span class="day-picker__day-number">{{$newdate6}}</span>
                              </a>
                          </li>
                          <li class="timedate">
                              <a class="time" data-ember-action="1972">
                                <span class="day-picker__day-word">{{$day7}}</span>
                                <span class="day-picker__day-number">{{$newdate7}}</span>
                              </a>
                          </li>
                                    </ul>
                                    </div>
                                    <div class="order-ahead__times">
                                        <div id="ember1211" class="ember-view time-picker"></div>
                                    </div>
                                </div>
                                 <button type="button" onclick="shows_form_part(3)" name="btn11" id="btn11" class="contact100-form-btn" id="btn" style="">Confrim and View Menu</button>
                                 <span class="focus-input100"></span>
                            </div>
                        </div>
                        
                        <div class="wrap-input102" id="test1" style="display:none">
                            <div class="wrap-input102">
                                <div class="wrap-input101">
                                    <div class="label-input101">Choose a Method</div>
                                    <div class="wrap-input105">
                                        <div class="label-input104">
                                         <a href="#" class="order-ahead__close"  data-ember-action="1943" id="back1" style="font-size:12px;">
                                                <span class="ss-gizmo ss-navigateleft" ></span>Back
                                            </a>
                                            <span>Pickup </span>
                                            <p>Pick up your order at Super Chicken - Vienna.</p>
                                        </div>
                                        <br><br>
                                        <button type="button" onclick="shows_form_part(3)" name="btn12" id="btn12" class="contact100-form-btn" id="btn" style="">Confrim and View Menu</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                    <form class="contact100-form validate-form" name="form_part2" id="form_part2" style="display:none" method="POST" action="{{ route('User_validation')}}">
                        {{ csrf_field() }}
                        <span class="contact102-form-title" >
                            Super Chicken - Vienna
                        </span><hr>
                        <button type="button" class="contact102-form-btn" name="btn1" id="btn1">
                        <img src="{{asset('public/assets/front/images/facebook.ico')}}"  style="width:28px;">
                            <a href="https://www.facebook.com"   class="contact102-form-btn">
                               Login with FaceBook
                            </a>
                            
                        </button>
                        <button type="button" class="contact103-form-btn"  name="btn2" id="btn2">
                        <img src="{{asset('public/assets/front/images/google1.png')}}"  style="width:28px;">
                            <a href="https://www.gmail.com" class="contact103-form-btn">
                               Login with Google
                            </a>
                        </button>
                        <div class="text--center">
                            <span class="text-hr">or</span>
                        </div>
                        <div class="wrap-input103 validate-input" data-validate="Email is required">
                            <input id="email1" class="input100" type="text" name="email1" placeholder="Email...">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input103 validate-input" data-validate = "Valid password is required">
                            <input id="pass" class="input100" type="password" name="pass" placeholder="Password...">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="container-contact100-form-btn">
                            <button class="contact102-form-btn" style="background-color:#bb4238;" name="btn3" value="btn3">
                                Login
                            </button>
                        </div>
                        <div class="container-contact100-form-btn">
                            <button type="button" onclick="shows_form_part(1)" name="btn9" id="btn9" class="contact106-form-btn"  >Cancel</button>
                            <button type="button" onclick="shows_form_part(6)" name="btn10" id="btn10" class="contact107-form-btn" >Forget Password?</button>
                        </div>
                        <div class="container-contact100-form-btn"></div><br>
                        <button type="button" class="contact103-form-btn" onclick="shows_form_part(5)" name="btn14" id="btn14">
                            Create an Account
                        </button>
                        <br>
                        <div class="container-contact100-form-btn"><a target="_blank" href="https://www.chownow.com/">
                          <img class="cn-logo" height="19" alt="Powered by ChowNow" src="{{asset('public/assets/front/images/Frito Chicken-01.jpg')}}">
                          </a>
                        </div>
                    </form>
                    
                    <form class="contact100-form validate-form" name="form_part6" id="form_part6" style="display:none" method="" action="">
                        <br><br>
                        <div class="container-contact100-form-btn">
                            <a target="_blank" href="https://www.chownow.com/">
                                <img class="cn-logo" height="19" alt="Powered by ChowNow" src="https://cf.chownowcdn.com/ordering-web/assets/images/poweredby-logo-color-073d4ea87ba56a4b6ab9015cd669fb9f.png">
                            </a>
                        </div><hr>
                        <div class="wrap-input103 validate-input" data-validate="Email is required">
                          <input id="email" class="input100" type="text" name="email" placeholder="Email...">
                          <span class="focus-input100"></span>
                        </div>
                        <button type="button" class="contact102-form-btn" name="btn15" id="btn15">
                            Reset my Password
                        </button>
                        <div class="container-contact100-form-btn">
                            <button type="button" onclick="shows_form_part(1)" name="btn9" id="btn9" class="contact106-form-btn" id="btn" >Cancel</button>
                        </div><br>
                    </form>
                    
                     <form class="contact100-form validate-form" name="form_part5" id="form_part5" style="display:none" method="POST" action="{{ route('usersignup') }}">
                        {{ csrf_field() }}
                            <div class="flash-message">
                              @foreach(['success','danger'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                  <p class="alert alert-{{$msg}}">{{Session::get('alert-' . $msg)}}</p>
                                @else
                                @endif
                              @endforeach
                            </div> 
                            <span class="contact102-form-title">
                              Super Chicken - Vienna
                            </span><hr>
                            
                            <button type="button" class="contact102-form-btn">
                            <img src="{{asset('public/assets/front/images/facebook.ico')}}" style="width:28px;">
                                <a href="https://www.facebook.com" class="contact102-form-btn" >
                                    <span class="icon"></span>
                                    Sign up facebook
                                </a>
                            </button>
                            <button type="button" class="contact103-form-btn">
                            <img src="{{asset('public/assets/front/images/google1.png')}}"  style="width:28px;">
                                <a href="https://www.gmail.com" class="contact103-form-btn">
                                Sign up Google
                                </a>
                            </button>
                            <div class="text--center">
                                <span class="text-hr">or</span>
                            </div>
                            <div class="wrap-input103 validate-input" data-validate="First Name is required">
                                <input id="first" class="input100" type="text" name="first" placeholder="First Name...">
                                <span class="focus-input100"></span>
                            </div>
                            <div class="wrap-input103 validate-input" data-validate="Last Name is required">
                              <input id="last" class="input100" type="text" name="last" placeholder="Last Name...">
                              <span class="focus-input100"></span>
                            </div>
                            <div class="wrap-input103 validate-input" data-validate="Email is required">
                              <input id="email2" class="input100" type="text" name="email" placeholder="Email Address...">
                              <span class="focus-input100"></span>
                            </div>
                            <div class="wrap-input103 validate-input" data-validate = "Valid password is required">
                              <input id="pass1" class="input100" type="password" name="pass1" placeholder="Password...">
                              <span class="focus-input100"></span>
                            </div>
                            <button class="contact102-form-btn" style="background-color:#53a653;" name="btn4" id="btn4">Create Account</button>
                            <div class="container-contact100-form-btn">
                                <button type="button" onclick="shows_form_part(1)" name="btn9" id="btn9" class="contact106-form-btn" id="btn" >Cancel</button>
                            </div>
                            <div class="form-group">
                                <label name="optIn" class="checkbox">
                                    <div class="row1">
                                        <div class="col col--12">
                                            <input id="ember1188" type="checkbox" name="optIn" class="ember-view ember-checkbox">
                                            &nbsp; I want to receive promotional messages from ChowNow and ChowNow restaurant clients, and I can
                                            unsubscribe at any time.<br><br>
                                            <p class="text--terms">
                                              By creating an account you agree to our
                                              <a target="_blank" href="https://www.chownow.com/terms-of-service" style="font-size:12px;">Terms of Use</a> and
                                              <a target="_blank" href="https://www.chownow.com/privacy-policy" style="font-size:12px;">Privacy Policy</a>.
                                            </p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="container-contact100-form-btn">
                                <a target="_blank" href="https://www.chownow.com/">
                                    <img class="cn-logo" height="19" alt="Powered by ChowNow" src="{{asset('public/assets/front/images/Frito Chicken-01.jpg')}}">
                                </a>
                            </div>
                    </form>
                    
                    <form class="contact100-form validate-form" name="form_part3" id="form_part3" style="display:none" method="" action="{{route('view')}}">
                        <div class="label-input100">
                            <button type="button" onclick="shows_form_part(1)" name="btn13" id="btn13" class="contact104-form-btn" ><span class="ss-icon ss-navigateleft"></span></button>
                        </div>
                        <button type="button" onclick="shows_form_part(2)" name="btn" id="btn" class="contact101-form-btn" id="btn" ><span class="ss-gizmo ss-user"></span>Log In</button>
                        <hr>
                        <div class="menus-actions">
                            <ul class="menus-actions__btns">
                              <li><a href="#" data-ember-action="1755" onclick="expandCollapse()" id="expand-collapse"><span class="ss-icon ss-expand"></span> Expand All</a> <span class="divider"> </span> </li>
                             <!-- <li><a href="#" data-ember-action="1756" data-role="button" id="closeAll" ><span class="ss-icon ss-contract"></span> Collapse All</a></li>-->
                            </ul>
                        </div>
    
                        <div class="wrap-input104">
                            @if(!empty($data))
                                @foreach($data as $row)
                            
                                    <div class="label-input100">
                                    
                                        <a href="javascript::void(0);" id="divmenu" class="divmenu" data-id="{{ $row->id }}">{{ $row->name }}
                                        
                                            <div class="category" id="category{{ $row->id }}"></div>
                                        </a>
                                    </div> 
                                     
                                    <div class="submenu" data-id="{{ $row->id }}">
                                        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="charcoal" >
                                            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#charcoal" data-parent="#exampleAccordion" ></a>
                                        </li>
                                        <ul class="sidenav-second-level collapse" id="charcoal">
                                            <li class="label-input105" onclick="shows_form_part(4)">
                                              <a href="#"><br>Served with two side orders.<br><hr></a>
                                            </li>
                                        </ul>
                                    </div>
                                @endforeach
                            @else
                                No data found !!
                            @endif
                        </div>
                    </form>
                    
                    <form class="contact100-form validate-form" name="form_part4" id="form_part4" style="display:none" method="" action="">
                        <button type="button" onclick="shows_form_part(3)" class="contact104-form-btn" name="btn5"  id="btn5" >Back to Menu</button><hr>
                        <div class="label-input100">Choose a Quantity</div><br>
                        <div class="wrap-input100 validate-input" data-validate="Email is required">
                          <input type="number" class="input100" name="quantity" min="1" max="20" step="1" value="1">
                        </div><hr>
                        
                        <div class="wrap-input105 validate-input">
                        <div class="row" id="vardiv">
                        </div>
                        </div><hr>
                        
                        <div class="wrap-input100 validate-input">
                          <label class="label-input100" for="pass"> Special Instructions (Optional)</label>
                          <input id="text" class="input100" type="text" name="pass" placeholder="Optional">
                          <span class="focus-input100"></span>
                        </div>
                        
                        <div class="container-contact100-form-btn">
                          <button type="button" onclick="shows_form_part(3)" class="contact100-form-btn"  id="addorderbtn">
                            Add to Order
                          </button>
                        </div>
                    </form>
                    
                </div>
            </div>
            
        </div>
        
        <div class="col-md-3" style="float: left;margin-left: -1.3%;">
            <div class="col-md-12" style="margin-left: -13%;">
                <iframe width="129%" height="222" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=8357%20Leesburg%20Pike%20+(My%20Business%20Name)&amp;ie=UTF8&amp;t=&amp;z=22&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/map-my-route/">Draw map route</a></iframe>
            </div>
            <div class="col-md-12 carts" style="width: 129%;">
                <div class="order-particulars__info heading">
                    44650 Waxpool Rd # 100 Ashburn VA 20147
                    <div class="address">
                    6007 Centreville Crest lane Centreville VA 20121
                    <br>
                    6699 B Frontier Dr Springfield VA 22150 (opening Soon)
                    </div>
                </div>
                <div class="order-particulars__info heading">Pickup - <span id="pickupday">Thursday</span> at <span id="pickupdate">11:15 AM</span></div>
                    <ul class="pane-stack__pane-scroller cart-list">
                        <div id="ember1753" class="ember-view" id="itemhere1">
                            <li class="cart-list-item" id="itemhere" style="overflow-y: scroll; max-height: 200px; height: 180px; background-color: white;">
                            </li>
                        </div>
                        <div class="total">
                            <ul class="cart-checkout__list">
                                <li>
                                  <span>Subtotal</span>
                                  <span class="text--bold price subtotal subtotal1">$0</span>
                                </li>
                                <li class="cart-taxes">
                                  <span>Taxes</span>
                                  <span class="text--bold price subtotal">$0</span>
                                </li>
                            </ul>
                        </div>
                        <div id="ember1928" class="ember-view" style="background-color: white; margin-top: -4%;">
                            <div class="alert alert-danger">
                                <span class="message">Order amount is below $0.50 pickup minimum.</span>
                            </div>
                        </div>
                    </ul>
            </div>
            <div class="col-md-12" style="margin-top: -8%;margin-left: -7%;width: 113%;background-color:#fbfbfb;padding-top: 3%;padding-bottom: 3%;">
                <button type="button" class="btn btn-primary btn-block checkoutbtn" id="checkoutbtn" style="margin-top: 10%;">Checkout</button>
            </div>
            
        </div>
        
        <div class="col-md-5" style="float: left;"></div>
    </div>
  
<script>
    $(".js-select2").each(function(){
      $(this).select2({
        minimumResultsForSearch: 20,
        dropdownParent: $(this).next('.dropDownSelect2')
      });
    })
    $(".js-select2").each(function(){
      $(this).on('select2:open', function (e){
        $(this).parent().next().addClass('eff-focus-selection');
      });
    });
    $(".js-select2").each(function(){
      $(this).on('select2:close', function (e){
        $(this).parent().next().removeClass('eff-focus-selection');
      });
    });

  </script>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
  </script>


</body>
</html>
