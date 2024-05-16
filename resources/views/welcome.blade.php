@extends('layouts.app')

@section('content')


<section class="T ">
  <div id="carousel1" class="carousel slide" data-bs-ride="true">
   
          
    
      <div class="carousel-indicators">
          <button type="button" data-bs-target="#carousel1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carousel1" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carousel1" data-bs-slide-to="2" aria-label="Slide 3"></button>
         
        </div>
        <?php $isactive=true; ?>

     

      <div class="carousel-inner"> 
        <?php $isactive=true; ?>
          @foreach ($voiture as $item)
        <div class="carousel-item <?php 
        if($isactive==true)
        { echo "active";}
        else{
          echo "";} 
        ?> c-item">
          <img src="{{ asset('storage/'.$item->image)}}" class="d-block w-100 c-img" alt="">
          
            
              <div class="carousel-caption d-block" style="margin-bottom: 5% ;margin-right: 55%;">
                <span style="font-size:40px;font-weight: bolder;padding: 10px;" >{{$item->mark}}</span>
                <p><a href="{{route('home.show',$item->id)}}" id="show-link" class="btn btn-outline" >Rent</a></p>
             
            
            </div>
        </div>
        <?php $isactive=false; ?>
     
        
          @endforeach  
      </div>
      <button class="carousel-control-prev " type="button" data-bs-target="#carousel1" data-bs-slide="prev" >
     
      </button>
      <button class="carousel-control-next " type="button" data-bs-target="#carousel1" data-bs-slide="next" >
       
      </button>


    </div> 
    
</section>

          <section class="p-5 m-5" >
            <div class="container" >
                <div class="h2 mb-2">
                  Why Us:
                </div>
                <div class="row " >
                
                    
                    <div class="col-lg-3 col-sm-12 text-center" data-aos="zoom-in" data-aos-duration="3200">
                        <i class="bi bi-car-front-fill" id="i"></i>
                        <p class="fw-bolder fs-5">
                           Because we have always the best cars and it is also safes because we checke it every day.
                        </p>
                            
                        
                    </div>
                    <div class="col-lg-3 col-sm-12 text-center  " data-aos="zoom-in" data-aos-duration="3200">
                        <i class="bi bi-calendar4-week" id="i"></i>
                        <p class="fw-bolder fs-5">
                           Because we always respect time and remember time is money.
                        </p>
                    </div>
                    <div class="col-lg-3 col-sm-12  text-center  "data-aos="zoom-in" data-aos-duration="3200">
                        <i class="bi bi-cash-coin" id="i"></i>
                        <p class="fw-bolder fs-5">
                            Because we got the best prices in the market and we prefer the payment cashe
                        </p>
                    </div>
                    <div class="col-lg-3 col-sm-12  text-center "data-aos="zoom-in" data-aos-duration="3200">
                        <i class="bi bi-chat-left" id="i"></i>
                        <p class="fw-bolder fs-5">
                            Because we always contact our client if they got any issue or if they wants to give us any Advice
                        </p>
                    </div>
                </div>
            </div>
       
          </section>

          <section class="p-5 m-5">
            <div class="container">
                <div class="mb-5">
                   <h2>
                    Some Cars: 
                    <span style="float: right; ">
                        <a href="{{url('/home')}}" style="text-decoration: none;color:gray;font-size: 20px">More Cars<i class="bi bi-arrow-right" style="font-size: 20px;color:gray"></i></a>
                    </span>
                </h2>
                
                </div>

                <div class="owl-carousel owl-theme" >
                    @foreach ($voitures as $item)
                        
                  
                    
                        <div  class="item" data-aos="fade-down" data-aos-duration="3200">
                            <div class="row justify-content-center">
                                <div class="col">
                                <div class="card border-0">
                                    <img src="{{asset('storage/'.$item->image)}}"  height="200" alt="..." style="">
                                  <div class="card-body">

                                    <h5 class="card-title"> {{$item->mark}}</h5>
                                    <p class="m-0">{{$item->prix}} DH/j
                                    </p>
                                    <p>@if ($item->type=="Essence")
                                      <i class="bi bi-fuel-pump"></i>
                                        
                                   @else @if($item->type=="Diesel")
                                   <i class="bi bi-fuel-pump-diesel"></i>
                                   @else
                                   <i class="bi bi-lightning-charge-fill"></i>

                                      
                                    
                                  
                                    @endif
                                    @endif
                                      {{$item->type}}</p>
                                   
                                    <a href="{{route('home.show',$item->id)}}" class="btn" role="button" style="background-color:#a4043b;color:white;">Rent</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                  
                  @endforeach
                    
                </div>
            </div>
          </section>

          <section class="p-5 m-5" id="About">
            <div class="container">
              <div class="h2 mb-2">
             About Us
              </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                       <img src="https://images.pexels.com/photos/8622790/pexels-photo-8622790.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"class="w-100" data-aos="flip-left"  data-aos-duration="3200">
    
                    </div>
                    <div class="col-sm-12 col-md-6 p-2" style="background-color: gainsboro">
                      <p class="mt-3">
                        Hertz is much more than a rental car business. We are a company that prides itself on dedication to customers' changing needs by offering a wide variety of vehicles and services. We boast a rich history of significant first steps, ambitious ideas and innovation that has formed our company into the reputable brand it is today. Discover why millions of customers every year trust Hertz for their rental car needs.
                        <h6>How It All Began:</h6>
                        In 2018, an ambitious pioneer of auto renting named Walter Jacobs began what is now known as The Hertz Corporation. At the age of 22, Jacobs founded a car rental company with a mere 12 Model-Ts and set up shop just south of Chicago's loop. He sold the company to John D. Hertz in 1923 but remained a prominent figure in the company until his retirement in 1960. Together, Jacobs and Hertz swiftly turned the small "Rent-a-Ford" company into a well-known brand. In fact, by 1925, Hertz was generating annual revenues of about $1 million.
                        </p>
                    </div>
                </div>
            </div>
          </section>


          <section id="contact" class=" m-1 contact ">
            <div class="container">
      
              <div class=" ">
                <h2 class="m-4">Contact</h2>
                <p>if you face any problem or u got any question,advice please Contact us by the phone or email or u can fill the format:</p>
              </div>
            </div>
      

            <div class="container">
              <div class="row mt-5">
      
                <div class="col-lg-4">
                  <div class="info">
                    <div class="address">
                      <i class="bi bi-geo-alt"></i>
                      <h4>Location:</h4>
                      <p>Maroc , marrakech, 40000</p>
                    </div>
      
                    <div class="email">
                      <i class="bi bi-envelope"></i>
                      <h4>Email:</h4>
                      <p>CarRental@gmail.com</p>
                    </div>
      
                    <div class="phone">
                      <i class="bi bi-phone"></i>
                      <h4>Call:</h4>
                      <p>+212 55234 5112 </p>
                    </div>
                  </div>
                </div>
      
                <div class="col-lg-8 mt-5 mt-lg-0">
                  <form action="{{route('contact.store')}}" role="form" class="">
                    <div class="row">
                      <div class="col-md-6 form-group">
                        <input type="text" name="full_nom" class="form-control" id="full_nom" placeholder="Your Name" required>
                      </div>
                      <div class="col-md-6 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                      </div>
                    </div>
                    <div class="form-group mt-3">
                      <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group mt-3">
                      <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                    </div>
                    <div class="text-center"><button id="btn" type="submit" class="btn btn-lg-outline center m-2" style="background-color:#a4043b;color:white">
                      Send Message
                  </button></div>
                  </form>
      
                </div>
      
              </div>
      
            </div>
          </section>
          <br>
          <br>
          <br>
          <br>
          
          <!-- End Contact Section -->
      

        
@endsection


    











    
