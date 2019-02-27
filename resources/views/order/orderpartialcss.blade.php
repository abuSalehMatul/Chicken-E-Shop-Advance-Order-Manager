{{-- <link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"> --}}
<style>
    
    *{
	margin: 0;
	padding: 0;
    }
    .card-div-order{
        margin-top:25px;
    }
    .checkout-whole-div{
           margin: 0px 0px 60px 15px;
    }
    .orderlistitem{
        list-style: none;
       
    }
   .right-font {
    font-size: 1.4rem;
    /* margin-right: 10px; */
    margin: -5px 10px 3px 0px;
}
    .shop-name{
        margin:0 5px 0 0;
        border-bottom: solid 1px #cccccc;
        cursor: pointer;
    }
.shop-name:hover{
    background:#f2f2f2;
}
.onhover-blue{
color: #222;
    margin-left: 10px;
    font-style: normal;
    font-family: jaf-bernino-sans-condensed,Helvetica,Arial,sans-serif;
    font-weight: 500;
    font-size: 24px;
}
.onhover-blue:hover{
    color:#8fc6eb !important;
}
.welcome{
    background: #cccccc;
}
.shopBack{
    background: #cccccc;
}
.special-instruction{
    margin:0;
}
.name-and-price{
    margin:0;
    height: 100px;
}
.increment{
    margin:0;
}
#map{
    height: 660px;
}
.counterdown{
    margin:0px 0px 115px 16px;
}
.instruction{
    padding:20px;
}
.map-section-map{
 height: 140px;
    background: green;
}
.map-section-name{
 height: 88px;
 background: #fbfbfb;
 padding:5px;
}
.map-section-name h3{
 font-size: .80rem;
}
.map-section-name h5{
    font-size: .60rem;
}
.pickup-date{
 height: 50px;
 background: #fbfbfb;
 padding:10px;
}
.pickup-cart{
 height: 315px;
  background: #eff0f2;
}
.map-subtotal{
 height: 70px;
background: #ffffff;
padding:6px;
}
.map-checkout{
    height:53px;
    background: #ffffff;
}
.plus-minus-input {
  align-items: center;

  .input-group-field {
    text-align: center;
    margin-left: 0.5rem;
    margin-right: 0.5rem;
    padding: 1rem;

    &::-webkit-inner-spin-button,
    ::-webkit-outer-spin-button {
      appearance: none;
    }
  }

  .input-group-button {
    .circle {
      border-radius: 50%;
      padding: 0.25em 0.8em;
    }
  }
}

.alink{
    color:royalblue;

}
.alink:hover{
    color:blue;
    cursor: pointer;
}



.cat-list-style{
    margin: 0px 0px 0px 0px;
    font-size: .88rem;
    border-bottom: solid 1px #cccccc;
}
.cat-list-style h3{
    font-size: 1.5rem;
    font-family: Arial, Helvetica, sans-serif;
    margin:0;
    padding-top: 18px;
}
.bg-light {
    height: 50px;
    border-radius: 0px;
    border-right: 1px solid #eee;
    background-color: #fff!important;
}
.navbar-brand img{
	height: 22px;
}
.map-section-cart-item:hover{
   color:#55a9e1;
    box-shadow: #cccccc 2px 2px;
}
.main-layout{
	height: 100%;
    position: absolute;
    max-width: 550px;
    z-index: 2; 
}
.navbar-light .navbar-nav .nav-link {
    color: #222;
    font-weight: bold;
    font-family: inherit;
}
.accordion {
    height: 100%;
    width: 100%;
}
.card {
    border-radius: 0px;
    border: none;
}
i.fa.fa-map-marker-alt {
    margin-left: -4px;
    color: #555;
    font-size: 20px;
}
i.fa.fa-pencil-alt {
    font-size: 20px;
    margin-left: 275px;
    color: #3498DB;
}
#listOne{
	border-right: 1px solid #eee;
	background-color: #F2F2F2;
    border-bottom:1px solid #eee
}
#headingTwo {
    background-color: #4C555D;
    border-right: 1px solid #eee;
    height: 65px;
}
i.far.fa-clock {
    color: #fff;
    font-size: 20px;
    margin-left: -18px;
}
ul.accordion-menu {
    list-style: none;
}
.accordion-menu a {
    color: #555;
    text-decoration: none;
}
i.fa.fa-utensils {
    font-size: 20px;
    color: #777;
    margin-left: -14px;
}
li.listOne,.listTwo {
	border-bottom: 1px solid #eee;
    padding: 12px;
    background: #fff;
    margin: 0px 0px 0px 19px;
    border-top: 1px solid #eee;
    color: #58aae1;
}
li.listOne:hover{
	background: #F5FAFD;
}
li.listTwo:hover{
	background: #F5FAFD;
}
.modal__footer {
    margin-top: 10px;
}
div#collapseTwo {
    height: 348px;
    border: 1px solid #eee;
}
#collapseorder{
	height: 466px;
    border: 1px solid #eee;
}
ul {
    list-style-type: none;
}
.day-picker>li {
    display: block;
    float: left;
    width: 14.195%;
}
.day-picker a {
    transition: all .2s ease-in;
    color: #4c555d;
    display: block;
    text-align: center;
    padding: 10px 2px;
}
.order-ahead-days {
    border-bottom: 1px solid #dadada;
    height: 156px;
    left: 0;
    position: absolute;
    padding: 0px 25px;
    width: 100%;
    z-index: 5;
    background: #f2f2f2;
}
.order-ahead-header {
    border-bottom: 1px solid #ccc;
    font-weight: 600;
    margin-bottom: 10px;
    padding: 10px 0;
    font-size: 16px;
}
span.day-word {
    display: block;
    font-size: 16px;
    font-weight: bold;
}
span.day-number {
    color: #444;
    display: block;
    font-size: 20px;
    font-weight: 600;
    cursor: pointer;
}
.day-picker a {
    text-decoration: none;
    transition: all .2s ease-in;
    color: #4c555d;
    display: block;
    text-align: center;
    padding: 10px 14px;
}
i.fa.fa-less-than {
    color: #444;
    font-size: 15px;
}
p.text-center {
    margin-top: 90px;
    font-size: 20px;
}
.order-ahead-times {
    overflow: hidden;
   
    height: 80px;
    padding: 0 20px;
    margin: -2px 0px -15px -6px;
    /* padding: 0; */
    background: white;
}
.time-picker {

    margin: 0 -20px;
    position: relative;
}
.gtime-before{

}
.gtime-after{
    cursor:pointer !important;
    height:260px !important;
    overflow-y:scroll !important;

}
.spinner-overlay {
    background: rgba(255,255,255,.7);
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    z-index: 50;
}
.spinner{
	position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
    z-index: 10;
}
.time-picker ul a{
	color: #444;
	text-decoration: none;
    border-top: 1px solid #eee;
    display: block;
    font-size: 18px;
    padding: 15px 20px;
    position: relative;
    text-align: center;
}
.time-picker ul a:hover{
       background-color: #f5fafd!important;
    color: black!important;
}
.time-picker-confirm ul li{
	color: #fff;
    border-top: 1px solid #eee;
    display: block;
    font-size: 18px;
    padding: 15px 20px;
    position: relative;
    text-align: center;
}
.time-picker-methods{
    right: 30px;
    margin-top: -12px;
    position: absolute;
    top: 50%;
}
.time-picker-methods>li {
    color: #9b9b9b;
    font-size: 12px;
    float: left;
    margin-left: 10px;
}
i.fa.fa-check-square {
    color: #5cb85c;
    font-size: 15px;
    margin-right: 2px;
    top: 3px;
}
.card-header {
    padding: 4px 20px;
    margin-bottom: 0;
    background-color: rgba(0,0,0,.03);
    border-bottom: 0px solid #eee;
}
.spinner-overlay {
    background: rgba(255,255,255,.7);
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    z-index: -50;
}
a.btn.btn-primary.btn-block {
    margin-top: 20px;
    padding: 10px;
}
</style>