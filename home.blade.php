@extends('master')
@section('style')
    <title>Apex Union Gas Company</title>
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/component.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom-styles.css')}}">
    <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">   
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
     <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.min.css')}}">
  <!--   <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->

    <link href="{{asset('assets/css/icon.css')}}" rel="stylesheet" type="text/css" />  

@section('content')


   <div class="banner">  
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>

          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="{{asset('assets/image/banner/3.jpg')}}" alt="">
              <div class="carousel-caption"><br><br>
                <h1>APEX Union Gas Company Ltd.,</h1>           
       
              </div>
            </div>
            <div class="item">
               <img src="{{asset('assets/image/banner/6.jpg')}}" alt="">
              <div class="carousel-caption"><br><br>
                <h1>APEX Union Gas Company Ltd.,</h1>

              </div>
            </div>
            <div class="item">
              <img src="{{asset('assets/image/banner/4.jpg')}}" alt="">
              <div class="carousel-caption"><br><br>
                 <h1>APEX Union Gas Company Ltd.,</h1>

              </div>
            </div>
              <div class="item">
              <img src="{{asset('assets/image/banner/7.jpg')}}" alt="">
              <div class="carousel-caption"><br><br>
              <h1>APEX Union Gas Company Ltd.,</h1>

              </div>
            </div>
              <div class="item">
              <img src="{{asset('assets/image/banner/8.jpg')}}" alt="">
              <div class="carousel-caption"><br><br>
               <h1>APEX Union Gas Company Ltd.,</h1>

              </div>
            </div>
          </div>

       <!--  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
          <img src="{{asset('assets/image/left.png')}}" alt="" style="width:50px;height:50px;">
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
           <img src="{{asset('assets/image/right.png')}}" alt="" style="width:50px;height:50px;">
        </a> -->
      </div>
    </div>

          <div id="iconn">
            <div class="row">
              <div class="col-lg-1 col-md-6 col-lg-offset-3 text-center wow zoomIn" data-wow-duration="3s">                  
                  <a href="{{url('about')}}" class="iconn"><i class="fa fa-home " aria-hidden="true" ></i></a>
                        <h5> ABOUT</h5>                       
                
                </div>
                <div class="col-lg-1 col-md-6 text-center wow zoomIn" data-wow-duration="4s">
                   
                        <a href="{{url('company')}}" class="iconn"><i class="fa fa-group"></i></a>
                        <h5>TEAM</h5>              
                 
                </div>
                <div class="col-lg-1 col-md-6 text-center wow zoomIn" data-wow-duration="5s">
                   
                      <a href="{{url('service')}}" class="iconn"><i class="  fa fa-location-arrow"></i></a>
                       <h5> PURPOSE </h5>                    
                  
                </div>
                <div class="col-lg-1 col-md-6 text-center wow zoomIn" data-wow-duration="6s">
                    
                        <a href="{{url('contact')}}" class="iconn"><i class="fa fa-phone text-primary sr-icons"></i></a>
                        <h5> CONTACT</h5>               
                </div>
                <div class="col-lg-1 col-md-6 text-center wow zoomIn" data-wow-duration="6s">
                    
                        <a href="#" target="" class="iconn"><i class="fa fa-facebook text-primary sr-icons" style="color: "></i></a>
                        <h5> FACEBOOK</h5>               
                </div>
            </div>
        </div>         
    </br>

<div class="container" id="start" >
  <div  style="background: #454855;">
    <div class="row">
      <div class="col-md-6">
             
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
    @if(!empty($banner_post->banner_post_images_1))
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    @endif
    @if(!empty($banner_post->banner_post_images_2))
      <li data-target="#myCarousel" data-slide-to="1"></li>
    @endif
    @if(!empty($banner_post->banner_post_images_3))
      <li data-target="#myCarousel" data-slide-to="2"></li>
    @endif
    @if(!empty($banner_post->banner_post_images_4))
      <li data-target="#myCarousel" data-slide-to="3"></li>
    @endif
    @if(!empty($banner_post->banner_post_images_5))
      <li data-target="#myCarousel" data-slide-to="4"></li>
    @endif
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
    @if(!empty($banner_post->banner_post_images_1))
      <div class="item active">
        <img src="{{asset('uploads/bannerposts/'.$banner_post->banner_post_images_2)}}" alt="" style="width: 559px; height: 322px;">
      
      </div>
    @endif
    @if(!empty($banner_post->banner_post_images_2))
      <div class="item">
         <img src="{{asset('uploads/bannerposts/'.$banner_post->banner_post_images_1)}}" alt="" style="width: 559px; height: 322px;">
        
      </div>
    @endif
    @if(!empty($banner_post->banner_post_images_3))
      <div class="item" >
         <img src="{{asset('uploads/bannerposts/'.$banner_post->banner_post_images_3)}}" alt="" style="width: 559px; height: 322px;">
        
      </div>
    @endif
    @if(!empty($banner_post->banner_post_images_4))
      <div class="item" >
        <img src="{{asset('uploads/bannerposts/'.$banner_post->banner_post_images_4)}}" alt="" style="width: 559px; height: 322px;">
    
      </div>
    @endif
    @if(!empty($banner_post->banner_post_images_5))
      <div class="item" >
        <img src="{{asset('uploads/bannerposts/'.$banner_post->banner_post_images_5)}}" alt="" style="width: 559px; height: 322px;">
    
      </div>
    @endif
    </div>
  </div>
 </div> 

        <div class="col-md-6 latestnew">
            @if(!empty($banner_post))
          <h4>
            {!!$banner_post->banner_post_header!!}
          </h4><br>
                <div id="bodydesc">
                  <div style="margin-right: 1em;">

                       <p>{{$banner_post->banner_post_body}}</p>
                     
                    </div>

              </div><br>
            @endif
      
           <!--  <button type="button" class="btn btn-primary" style="float: right;margin-right: 1em;">More</button> -->
         </div>      
        
        </div>
      </div>
    </div>

    <div class="container" id="start" >
      <div class="featured-block">
        <div class="row">
            @if(isset($general_post))
            @foreach($general_post as $general)
              <div class="col-md-3">
                <div class="block wow  fadeInUp" data-wow-duration="3s">
                  <div class="thumbnail" style="height:370px;">
                    <img src="{{asset('uploads/posts/'.$general->feature_post_image)}}" style="width:252px;height:147px;" alt="" class="img-responsive">
                    <div class="caption">
                    <div style="height:134px;">
                      <h1>{{$general->post_header}}</h1>
                      <?php $post_body = strip_tags($general->post_body_detail); ?>
                      <p>{!!str_limit($post_body,50)!!}</p>
                    </div>
                      <a class="btn" href="{{url('/post/'.$general->id.'/detail')}}">more</a>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
            @endif    
        </div>      
      </div>
    </div>

@endsection
@section('scripts')

    <script src="{{asset('assets/js/jquery-1.9.1.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/js/modernizr-2.6.2-respond-1.1.0.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.mobilemenu.js')}}"></script>
    <script src="{{asset('assets/js/html5shiv.js')}}"></script>
    <script src="{{asset('assets/js/respond.min.js')}}"></script>
    <script src="{{asset('assets/js/scrollreveal.js')}}"></script>
    <script src="{{asset('assets/js/carousel.js')}}"></script>
    <script src="{{asset('assets/js/wow.min.js')}}"></script>

</script> 
      <script>
          function toggleSub(){
            var obj=document.getElementById("sub");
            if (obj.style.display=="block"){
              obj.style.display ="none";
            } else{
              obj.style.display="block";
            }
          }
      </script> 
@endsection

        
    

