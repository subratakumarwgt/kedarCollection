

   <div class="modal fade product_modal" id="exampleModalCenter_{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter_{{$product->id}}" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
         <div class="modal-content" id="modal_content_{{$product->id}}">
            <div class="modal-header">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-md-5 product_view_left p-1" data-wow-duration=".8s">
                        <div class="product_view_large">
                           <img src="/{{$product->image}}" class="img-fluid" width="100%"/>
                        </div>
                        <div class="owl-carousel product_view">
                           <div class="owl-item-in product_view_item">
                              <img width="200" height="200" src="/{{$product->image}}" class="img-fluid" />
                           </div>
                           @foreach($product->images as $image)
                           <div class="owl-item-in product_view_item">
                              <img width="200" height="200" src="/{{$image->image}}" class="img-fluid" />
                           </div>
                           @endforeach
                        </div>
                     </div>

                     <div class="col-md-7 product_view_right " data-wow-duration=".8s">
                        <div class="product_details">
                           <div class="hd_style_1">
                              <h2 class="hd_text font-calps">{{strtoupper($product->name)}}</h2>
                              <h5 class="m-0 p-0"> @if(!empty($product->Category)) <a href="{{''}}" class="nav-link text-primary small m-0 p-0">{{$product->Category->name}}</a>@endif</h5>
                           </div>
                           <div class="prod_desc">
                              <p>{{$product->description}}</p>
                           </div>
                           <!-- <div class="colors spec d-flex align-items-center flex-wrap">
                              <div class="spec_left">
                                 <labe class="text-dark small">COLORS</label>
                              </div>
                              <div class="colors_cont spec_right font-calps h6" style="font: space 3px;">
                                 <label class="select_color_item">
                                    <input type="radio" name="select_color">
                                    <svg fill="#E4CABD" xmlns="http://www.w3.org/2000/svg" width="50" viewBox="20.2 87.2 456.6 342.7">
                                       <path d="M387.6 96.2c2.2-4.6 9.4.5 9.9-6.3l30.5-2.1c-1.8 6 .8 9.8 3.4 13.4 2.2 2.9 4.1 6.1 5.8 9.4 3.2.8 7.2 5.1 10.7-.8l1.5.3c1 6.4 2.5 12.8 3.1 19.2.8 8.3.6 16.7 1.4 25.1 1 10.3 2.3 20.6 3.9 30.8 1 5.8 2.5 11.5 4.4 17.1 4.3 14 6.7 28.6 6.9 43.2.2 10.3.9 20.7 2 31 1.4 13.4 4.5 26.6 4.9 40 .4 11.5.8 23.3-3.1 34.7-1.5 4.4-1.8 9.4-1.8 14.1 0 3.8-1.9 5-4.8 5.6-2.7.6-5.6.7-8.2 1.5-1.6.5-2.7 2.1-4.3 2.9-1.5.9-3.3 1.3-5 1.2-5-.6-9.9-1.9-15.5 1.2l5.8 1.5c-2.4 5.1-6.9 6.7-12.1 7.7-7.2 1.5-14.4 3.4-21.4 5.7-9 2.8-18.1 5.4-27 8.8-10.8 4.2-22.2 4.1-33.4 5.1-20.7 1.8-41.4 3.1-62 4.7-12.6 1-25.3 1.8-37.9 3.2-10.1 1.2-20.1 3.3-30.1 4.8-8.2 1.2-16.3 2.4-24.5 3.2-7.9.7-15.8 1-23.7 1.3-7.2.2-14.5-.1-21.7.4-11.4.9-22.8 2.3-34.2 3.6-6.1.7-12.2 2.2-17.5-2.6-1.1-.8-2.4-1.2-3.8-1-3.7.8-6.8.6-7.6-3.4l-8.8 4.9c-3.2-4.5-5.7-8.2-8.2-11.9-.8-.9-1.3-1.9-1.6-3-.4-4.4-2-7.3-7.7-6.7 1.3-3 2.4-5.3 3.5-8-2.8-2.1-6.6-3.6-8.2-6.5-3.3-6-7.6-6.8-13.7-5.5-2 .4-4.5-1.2-6.8-1.4-2.7-.3-5.5-.1-8.9-.1-1.6-14.8-1.1-30.5-.1-46.1.8-12.5 2.6-24.9 3.1-37.4.3-6.8-2-13.8-1.4-20.6 1.1-13.4 3.2-26.8 5.1-40.1 2.2-15.4 4.8-30.7 7-46.1.3-2.1-.7-4.3-1.2-6.5-.7-2.9-2-5.5 1-8.5 3.5-3.3 3.3-12.8.6-18.9 10.4-4.7 2.5-11.7.2-18.6l7 2.1.6-1.1-9-9.4c2.6-7.9 11.4-9.5 17-13.5 4.2 0 7.9.3 11.6-.1 16.1-1.7 31.1-7.7 46.6-11.7 6.8-1.7 13.7-2.5 20.6-3.7 5.1-.9 10.3-1.7 15.4-2.6 8-1.4 9.6-.7 12.1 5.4.3 0 .8 0 .9-.2 2.2-3 3.1-7.3 8.9-5.7 2.4.7 5.5-1.4 8.4-1.9s5.9-.6 8.5-.8c.7 1.8 1.4 3.5 2.1 5.2 1.8-1.1 4.1-1.8 5.4-3.3 3.2-3.8 10.9-4.2 17.1-2.4 4.2 1.2 9.2 5.3 13.9-.3 1.1-1.3 4.3-1.3 6.6-1.3 7.6 0 15.1.3 22.6.2 2.7 0 5.4-1.1 8-1.1 1.5 0 3 1.2 4.4 1.9 1.6-5.6 7.4-2.1 11.4-3.1 2.4-.6 5-.1 8.1-.1 1.2 1.8-.6 8.3 6.4 4.8l-3.4-3.9c6.1-1 11.5-2.4 17-2.8 15.8-1 31.7-1.5 47.5-2.2 4.5-.2 9.1-.9 13.6-.4 3.2.4 6.2 2.5 9.3 3.5 1.7.5 3.5.6 5.3.3 4.7-.5 4.7-.7 7.6 4.7zm-20 82.5-5.2 4.4 6.7 6.5 1.9-1.2c-1-3-2.1-6-3.4-9.7zm-194.9-77.3c.4.9 1 3 1.3 2.9 2.9-.4 5.8-1.2 8.7-1.9l-.4-2.1-9.6 1.1z" />
                                    </svg>
                                 </label>
                                 <label class="select_color_item">
                                    <input type="radio" name="select_color">
                                    <svg fill="#811c26" xmlns="http://www.w3.org/2000/svg" width="50" viewBox="20.2 87.2 456.6 342.7">
                                       <path d="M387.6 96.2c2.2-4.6 9.4.5 9.9-6.3l30.5-2.1c-1.8 6 .8 9.8 3.4 13.4 2.2 2.9 4.1 6.1 5.8 9.4 3.2.8 7.2 5.1 10.7-.8l1.5.3c1 6.4 2.5 12.8 3.1 19.2.8 8.3.6 16.7 1.4 25.1 1 10.3 2.3 20.6 3.9 30.8 1 5.8 2.5 11.5 4.4 17.1 4.3 14 6.7 28.6 6.9 43.2.2 10.3.9 20.7 2 31 1.4 13.4 4.5 26.6 4.9 40 .4 11.5.8 23.3-3.1 34.7-1.5 4.4-1.8 9.4-1.8 14.1 0 3.8-1.9 5-4.8 5.6-2.7.6-5.6.7-8.2 1.5-1.6.5-2.7 2.1-4.3 2.9-1.5.9-3.3 1.3-5 1.2-5-.6-9.9-1.9-15.5 1.2l5.8 1.5c-2.4 5.1-6.9 6.7-12.1 7.7-7.2 1.5-14.4 3.4-21.4 5.7-9 2.8-18.1 5.4-27 8.8-10.8 4.2-22.2 4.1-33.4 5.1-20.7 1.8-41.4 3.1-62 4.7-12.6 1-25.3 1.8-37.9 3.2-10.1 1.2-20.1 3.3-30.1 4.8-8.2 1.2-16.3 2.4-24.5 3.2-7.9.7-15.8 1-23.7 1.3-7.2.2-14.5-.1-21.7.4-11.4.9-22.8 2.3-34.2 3.6-6.1.7-12.2 2.2-17.5-2.6-1.1-.8-2.4-1.2-3.8-1-3.7.8-6.8.6-7.6-3.4l-8.8 4.9c-3.2-4.5-5.7-8.2-8.2-11.9-.8-.9-1.3-1.9-1.6-3-.4-4.4-2-7.3-7.7-6.7 1.3-3 2.4-5.3 3.5-8-2.8-2.1-6.6-3.6-8.2-6.5-3.3-6-7.6-6.8-13.7-5.5-2 .4-4.5-1.2-6.8-1.4-2.7-.3-5.5-.1-8.9-.1-1.6-14.8-1.1-30.5-.1-46.1.8-12.5 2.6-24.9 3.1-37.4.3-6.8-2-13.8-1.4-20.6 1.1-13.4 3.2-26.8 5.1-40.1 2.2-15.4 4.8-30.7 7-46.1.3-2.1-.7-4.3-1.2-6.5-.7-2.9-2-5.5 1-8.5 3.5-3.3 3.3-12.8.6-18.9 10.4-4.7 2.5-11.7.2-18.6l7 2.1.6-1.1-9-9.4c2.6-7.9 11.4-9.5 17-13.5 4.2 0 7.9.3 11.6-.1 16.1-1.7 31.1-7.7 46.6-11.7 6.8-1.7 13.7-2.5 20.6-3.7 5.1-.9 10.3-1.7 15.4-2.6 8-1.4 9.6-.7 12.1 5.4.3 0 .8 0 .9-.2 2.2-3 3.1-7.3 8.9-5.7 2.4.7 5.5-1.4 8.4-1.9s5.9-.6 8.5-.8c.7 1.8 1.4 3.5 2.1 5.2 1.8-1.1 4.1-1.8 5.4-3.3 3.2-3.8 10.9-4.2 17.1-2.4 4.2 1.2 9.2 5.3 13.9-.3 1.1-1.3 4.3-1.3 6.6-1.3 7.6 0 15.1.3 22.6.2 2.7 0 5.4-1.1 8-1.1 1.5 0 3 1.2 4.4 1.9 1.6-5.6 7.4-2.1 11.4-3.1 2.4-.6 5-.1 8.1-.1 1.2 1.8-.6 8.3 6.4 4.8l-3.4-3.9c6.1-1 11.5-2.4 17-2.8 15.8-1 31.7-1.5 47.5-2.2 4.5-.2 9.1-.9 13.6-.4 3.2.4 6.2 2.5 9.3 3.5 1.7.5 3.5.6 5.3.3 4.7-.5 4.7-.7 7.6 4.7zm-20 82.5-5.2 4.4 6.7 6.5 1.9-1.2c-1-3-2.1-6-3.4-9.7zm-194.9-77.3c.4.9 1 3 1.3 2.9 2.9-.4 5.8-1.2 8.7-1.9l-.4-2.1-9.6 1.1z" />
                                    </svg>
                                 </label>
                                 <label class="select_color_item">
                                    <input type="radio" name="select_color">
                                    <svg fill="#5240be" xmlns="http://www.w3.org/2000/svg" width="50" viewBox="20.2 87.2 456.6 342.7">
                                       <path d="M387.6 96.2c2.2-4.6 9.4.5 9.9-6.3l30.5-2.1c-1.8 6 .8 9.8 3.4 13.4 2.2 2.9 4.1 6.1 5.8 9.4 3.2.8 7.2 5.1 10.7-.8l1.5.3c1 6.4 2.5 12.8 3.1 19.2.8 8.3.6 16.7 1.4 25.1 1 10.3 2.3 20.6 3.9 30.8 1 5.8 2.5 11.5 4.4 17.1 4.3 14 6.7 28.6 6.9 43.2.2 10.3.9 20.7 2 31 1.4 13.4 4.5 26.6 4.9 40 .4 11.5.8 23.3-3.1 34.7-1.5 4.4-1.8 9.4-1.8 14.1 0 3.8-1.9 5-4.8 5.6-2.7.6-5.6.7-8.2 1.5-1.6.5-2.7 2.1-4.3 2.9-1.5.9-3.3 1.3-5 1.2-5-.6-9.9-1.9-15.5 1.2l5.8 1.5c-2.4 5.1-6.9 6.7-12.1 7.7-7.2 1.5-14.4 3.4-21.4 5.7-9 2.8-18.1 5.4-27 8.8-10.8 4.2-22.2 4.1-33.4 5.1-20.7 1.8-41.4 3.1-62 4.7-12.6 1-25.3 1.8-37.9 3.2-10.1 1.2-20.1 3.3-30.1 4.8-8.2 1.2-16.3 2.4-24.5 3.2-7.9.7-15.8 1-23.7 1.3-7.2.2-14.5-.1-21.7.4-11.4.9-22.8 2.3-34.2 3.6-6.1.7-12.2 2.2-17.5-2.6-1.1-.8-2.4-1.2-3.8-1-3.7.8-6.8.6-7.6-3.4l-8.8 4.9c-3.2-4.5-5.7-8.2-8.2-11.9-.8-.9-1.3-1.9-1.6-3-.4-4.4-2-7.3-7.7-6.7 1.3-3 2.4-5.3 3.5-8-2.8-2.1-6.6-3.6-8.2-6.5-3.3-6-7.6-6.8-13.7-5.5-2 .4-4.5-1.2-6.8-1.4-2.7-.3-5.5-.1-8.9-.1-1.6-14.8-1.1-30.5-.1-46.1.8-12.5 2.6-24.9 3.1-37.4.3-6.8-2-13.8-1.4-20.6 1.1-13.4 3.2-26.8 5.1-40.1 2.2-15.4 4.8-30.7 7-46.1.3-2.1-.7-4.3-1.2-6.5-.7-2.9-2-5.5 1-8.5 3.5-3.3 3.3-12.8.6-18.9 10.4-4.7 2.5-11.7.2-18.6l7 2.1.6-1.1-9-9.4c2.6-7.9 11.4-9.5 17-13.5 4.2 0 7.9.3 11.6-.1 16.1-1.7 31.1-7.7 46.6-11.7 6.8-1.7 13.7-2.5 20.6-3.7 5.1-.9 10.3-1.7 15.4-2.6 8-1.4 9.6-.7 12.1 5.4.3 0 .8 0 .9-.2 2.2-3 3.1-7.3 8.9-5.7 2.4.7 5.5-1.4 8.4-1.9s5.9-.6 8.5-.8c.7 1.8 1.4 3.5 2.1 5.2 1.8-1.1 4.1-1.8 5.4-3.3 3.2-3.8 10.9-4.2 17.1-2.4 4.2 1.2 9.2 5.3 13.9-.3 1.1-1.3 4.3-1.3 6.6-1.3 7.6 0 15.1.3 22.6.2 2.7 0 5.4-1.1 8-1.1 1.5 0 3 1.2 4.4 1.9 1.6-5.6 7.4-2.1 11.4-3.1 2.4-.6 5-.1 8.1-.1 1.2 1.8-.6 8.3 6.4 4.8l-3.4-3.9c6.1-1 11.5-2.4 17-2.8 15.8-1 31.7-1.5 47.5-2.2 4.5-.2 9.1-.9 13.6-.4 3.2.4 6.2 2.5 9.3 3.5 1.7.5 3.5.6 5.3.3 4.7-.5 4.7-.7 7.6 4.7zm-20 82.5-5.2 4.4 6.7 6.5 1.9-1.2c-1-3-2.1-6-3.4-9.7zm-194.9-77.3c.4.9 1 3 1.3 2.9 2.9-.4 5.8-1.2 8.7-1.9l-.4-2.1-9.6 1.1z" />
                                    </svg>
                                 </label>
                                 <label class="select_color_item">
                                    <input type="radio" name="select_color">
                                    <svg fill="#aed8a5" xmlns="http://www.w3.org/2000/svg" width="50" viewBox="20.2 87.2 456.6 342.7">
                                       <path d="M387.6 96.2c2.2-4.6 9.4.5 9.9-6.3l30.5-2.1c-1.8 6 .8 9.8 3.4 13.4 2.2 2.9 4.1 6.1 5.8 9.4 3.2.8 7.2 5.1 10.7-.8l1.5.3c1 6.4 2.5 12.8 3.1 19.2.8 8.3.6 16.7 1.4 25.1 1 10.3 2.3 20.6 3.9 30.8 1 5.8 2.5 11.5 4.4 17.1 4.3 14 6.7 28.6 6.9 43.2.2 10.3.9 20.7 2 31 1.4 13.4 4.5 26.6 4.9 40 .4 11.5.8 23.3-3.1 34.7-1.5 4.4-1.8 9.4-1.8 14.1 0 3.8-1.9 5-4.8 5.6-2.7.6-5.6.7-8.2 1.5-1.6.5-2.7 2.1-4.3 2.9-1.5.9-3.3 1.3-5 1.2-5-.6-9.9-1.9-15.5 1.2l5.8 1.5c-2.4 5.1-6.9 6.7-12.1 7.7-7.2 1.5-14.4 3.4-21.4 5.7-9 2.8-18.1 5.4-27 8.8-10.8 4.2-22.2 4.1-33.4 5.1-20.7 1.8-41.4 3.1-62 4.7-12.6 1-25.3 1.8-37.9 3.2-10.1 1.2-20.1 3.3-30.1 4.8-8.2 1.2-16.3 2.4-24.5 3.2-7.9.7-15.8 1-23.7 1.3-7.2.2-14.5-.1-21.7.4-11.4.9-22.8 2.3-34.2 3.6-6.1.7-12.2 2.2-17.5-2.6-1.1-.8-2.4-1.2-3.8-1-3.7.8-6.8.6-7.6-3.4l-8.8 4.9c-3.2-4.5-5.7-8.2-8.2-11.9-.8-.9-1.3-1.9-1.6-3-.4-4.4-2-7.3-7.7-6.7 1.3-3 2.4-5.3 3.5-8-2.8-2.1-6.6-3.6-8.2-6.5-3.3-6-7.6-6.8-13.7-5.5-2 .4-4.5-1.2-6.8-1.4-2.7-.3-5.5-.1-8.9-.1-1.6-14.8-1.1-30.5-.1-46.1.8-12.5 2.6-24.9 3.1-37.4.3-6.8-2-13.8-1.4-20.6 1.1-13.4 3.2-26.8 5.1-40.1 2.2-15.4 4.8-30.7 7-46.1.3-2.1-.7-4.3-1.2-6.5-.7-2.9-2-5.5 1-8.5 3.5-3.3 3.3-12.8.6-18.9 10.4-4.7 2.5-11.7.2-18.6l7 2.1.6-1.1-9-9.4c2.6-7.9 11.4-9.5 17-13.5 4.2 0 7.9.3 11.6-.1 16.1-1.7 31.1-7.7 46.6-11.7 6.8-1.7 13.7-2.5 20.6-3.7 5.1-.9 10.3-1.7 15.4-2.6 8-1.4 9.6-.7 12.1 5.4.3 0 .8 0 .9-.2 2.2-3 3.1-7.3 8.9-5.7 2.4.7 5.5-1.4 8.4-1.9s5.9-.6 8.5-.8c.7 1.8 1.4 3.5 2.1 5.2 1.8-1.1 4.1-1.8 5.4-3.3 3.2-3.8 10.9-4.2 17.1-2.4 4.2 1.2 9.2 5.3 13.9-.3 1.1-1.3 4.3-1.3 6.6-1.3 7.6 0 15.1.3 22.6.2 2.7 0 5.4-1.1 8-1.1 1.5 0 3 1.2 4.4 1.9 1.6-5.6 7.4-2.1 11.4-3.1 2.4-.6 5-.1 8.1-.1 1.2 1.8-.6 8.3 6.4 4.8l-3.4-3.9c6.1-1 11.5-2.4 17-2.8 15.8-1 31.7-1.5 47.5-2.2 4.5-.2 9.1-.9 13.6-.4 3.2.4 6.2 2.5 9.3 3.5 1.7.5 3.5.6 5.3.3 4.7-.5 4.7-.7 7.6 4.7zm-20 82.5-5.2 4.4 6.7 6.5 1.9-1.2c-1-3-2.1-6-3.4-9.7zm-194.9-77.3c.4.9 1 3 1.3 2.9 2.9-.4 5.8-1.2 8.7-1.9l-.4-2.1-9.6 1.1z" />
                                    </svg>
                                 </label>
                              </div>
                           </div> -->
                           @if(!empty($product->variants->count()))
                           @foreach($productArray["variants"] as $var)
                           <div class="sizes spec d-flex align-items-center flex-wrap variant">
                              <div class="spec_left">
                                 <label class="small">{{@$var['variant']['name']}}</label>
                                 <input type="hidden" class="variant_name" value="{{@$var['variant']['name']}}">
                              </div>
                              <div class="spec_right variant_value_holder" style="font: space 3px;">
                                 @if(!empty($var['variant']['product_variant_values']))
                                 @foreach($var['variant']['product_variant_values'] as $val)
                                 <label class="select_color_item mb-1 mt-1">
                                    <input type="radio" name="select_size_{{$var['variant']['name']}}" class="variant_value" value='{{isset($val["value"]["value"]) ? $val["value"]["value"] : ""}}'>
                                    <span  class="badge badge-light border border-primary text-primary p-2 shadow variant_value_label" >{{isset($val["value"]["value"]) ? strtoupper($val["value"]["value"]) : "" }}</span>
                                 </label>
                                 @endforeach
                                 @endif
                               
                              </div>
                           </div>
                           @endforeach
                           @endif
                           <div class="sp_price spec d-flex align-items-center flex-wrap">
                              <div class="spec_left">
                                 <label class="small">Price</label>
                              </div>
                              <div class="spec_right font-calps h6" style="font: space 3px;">
                                 <div class="small">
                                    <select class="form-control col-8 shadow border-primary text-primary quantity_variant">
                                       @foreach($product->quantities as $qty)
                                       <option value="{{$qty->quantity}}_{{$qty->price}}"><span class="price_sign"> ₹ </span> {{$qty->price}} / {{$qty->quantity}}pc</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="spec_act d-flex align-items-center flex-wrap">
                              <div class="input-group prod_quant">
                                 <button class="btn_quant minus">
                                    <img width="10" height="10" src="/images/remove.png" class="img-fluid" />
                                 </button>
                                 <input type="text" class="form-control readonly quantity" value="1" readonly style="z-index:0;">
                                 <button class="btn_quant plus">
                                    <img width="10" height="10" src="/images/add.png" class="img-fluid" />
                                 </button>
                              </div>
                              <a href="#" class="btn btn-primary font-calps m-1 add-to-cart" data-quantity="{{$product->id}}" data-product="{{$product->id}}" data-product_offer="{{json_encode($product->offer)}}"><img width="30" height="30" src="/images/cart-black.png"> Add to Cart</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <button class="btn-close btn" type="button" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
            </div>
         </div>
      </div>
   </div>

   <div class="ts_item rounded">
   @if($onOffer)
    <div class="discount_tag">{{@$offer->detail->value}}@if($offer->detail->type == 2)% @else <i class="fa fa-inr"></i> @endif OFF</div>
   @endif
      <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalCenter_{{$product->id}}">
         <img src="/{{$product->image}}" class="img-fluid prod-image">
      </a>
      <div class="ts_item_text">
         <div class="tsp_name product_title pt-0 m-0">
         <a href="{{route('shop-by-items',['id' => $product->id])}}"  <span class="h5 ">{{$product->name}}</span>         
           <div class="addcart-btn mb-2   pull-right">
            @if($product->quantities->count() == 0)
            <button class="add-to-cart btn btn-primary" data-quantity="{{$product->id}}" data-product="{{$product->id}}" id="addBtn_{{$product->id}}"> Add
             <a href="#" class=" ml-1 text-dark" ><i class="fa fa-plus-circle"></i></a>
            </button>   
            @else   
            <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#exampleModalCenter_{{$product->id}}" data-quantity="{{$product->id}}" data-product="{{$product->id}}" id="addBtn_{{$product->id}}"> Options
             <i class="fa fa-eye"></i>
            </button>
            @endif    
            </div> <br>
            <div class="text-secondary  font-calps" style="max-height: 1.7rem !important;overflow:hidden; ">{{$product->description}}  </div>
            <h6 class="m-0 p-1 pull-left text-primary " style="max-height: 1.7rem !important;overflow:hidden; ">@if($product->quantities->count() > 0)From @endif<i class="fa fa-inr small"></i> {{$onOffer ? $product->offer_price : $product->price}}
            @if($onOffer) <del class="text-danger"><small><i class="fa fa-inr small"></i> {{$product->price}} </small> </del> @endif
         </h5>
         </div>        
        
      </div>
   </div>

<script>

</script>
