<?php $i=0;?>
@extends($login_check !=null ? 'pages.layouts.user-master' : 'pages.layouts.master')
@section('content')
  <section class="top-header pricing-header with-bottom-effect transparent-effect dark">
   <div class="bottom-effect"></div>
   <div class="header-container wow fadeInUp">
      <div class="header-title">
         <div class="header-icon"><span class="icon icon-Wheelbarrow"></span></div>
         <div class="title">our prices</div>
         <em>Concierge Dry Cleaning Service<br>
         Owned and Operated Facility in Manhattan</em>
      </div>
   </div>
   <!--container-->
</section>
<!-- ========================== -->
<!-- HOME - FEATURES -->
<!-- ========================== -->
<section class="features-section">
   <div class="container">
      <div class="row">
         <div class="section-heading " >
            <div class="section-title">Our Prices</div>
            <div class="section-subtitle">
               Our Master Craftsmen can do miracles--you will be amazed! <br>we offer full service Dry Cleaning, Green Cleaning (chemical free) and Wash & Fold , We also professionally clean Leather & Suede
            </div>
            <div class="design-arrow"></div>
         </div>
      </div>
         
      </div>
   </div>
</section>
<section class="features-section pricing-page">
   <div class="container">
   @foreach($price_list as $i=>$category)
      <div class="row">
         <h2 style="color: #ff6400;">{{$category->name}}</h2>
         <div class="item-container">


         @foreach($category->pricelists as $pricelist)
            <div class="col-md-6">
               <div class="product">
                  <div class="product-section">
                     <div class="col-md-7"><h3>{{$pricelist->item}}</h3></div>
                     <div class="col-md-5"><h3>${{number_format((float)$pricelist->price, 2, '.', '')}}</h3></div>
                  </div>
               </div>
            </div>
         @endforeach


         </div>
      </div>
      @endforeach
      <!-- <div class="row">
         <h2>ABC</h2>
         <div class="item-container">
            <div class="col-md-6">
               <div class="product">
                  <div class="product-section">
                     <div class="col-md-7"><h3>Item Name</h3></div>
                     <div class="col-md-5"><h3>$199.00</h3></div>
                  </div>
               </div>
               <div class="product">
                  <div class="product-section">
                     <div class="col-md-7"><h3>Item Name</h3></div>
                     <div class="col-md-5"><h3>$199.00</h3></div>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="product">
                  <div class="product-section">
                     <div class="col-md-7"><h3>Item Name</h3></div>
                     <div class="col-md-5"><h3>$199.00</h3></div>
                  </div>
               </div>
               <div class="product">
                  <div class="product-section">
                     <div class="col-md-7"><h3>Item Name</h3></div>
                     <div class="col-md-5"><h3>$199.00</h3></div>
                  </div>
               </div>
            </div>
         </div>
      </div> -->
   </div>
</section>
@endsection


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
      $(".plans h2").click(function(){
         var product_box = $(this).parent().find($('.product'));
         product_box.toggleClass("close");
         if(product_box.hasClass("close")){
            product_box.slideUp(100);
            $(this).find($('.fa.fa-caret-up')).hide();
            $(this).find($('.fa.fa-caret-down')).show();
            
         }
         else{
            product_box.slideDown(100);
            $(this).find($('.fa.fa-caret-up')).show();
            $(this).find($('.fa.fa-caret-down')).hide();
         }
      });
   });
</script>