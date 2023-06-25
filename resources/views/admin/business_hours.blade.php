<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">
    <style type="text/css">
    
    
    label{

      display: inline;
  width: 200px;
    }
    </style>
    <!-- Required meta tags -->
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
         
             
            
            <div class="container" align="center"
            style="padding:100px">
            @if (session()->has('message'))
            <div  class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {{session()->get('message')}}

            </div>
            @endif


             
            <div class="d-flex flex-column container "  >

                <div class="d-flex justify-content-center"  >
                   


                    <div class="p-2 ">
                        <h1   align="center"style="color: white;padding:10px;">
                            Business Hours
                            {{$data->name}}
                        </h1>
                        <form action="{{url('/business-hours/update',$data->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @foreach ($businessHours as $businessHour)
                                <div class="d-flex" >
                                    <div class="p-2 " style="padding: 15px; width:80px; color:white" >
                                        
                                            {{ $businessHour->day }}
                                        
                                    </div>
                                    <input type="hidden" name="data[{{ $businessHour->day }}][day]"
                                        value="{{ $businessHour->day }}">
                                    <div class="p-2" style="padding: 15px; color:black" > <input type="text" class="timepicker"
                                            value="{{ $businessHour->from }}" name="data[{{ $businessHour->day }}][from]"
                                            placeholder="From"></div>
                                    <div class="p-2"style="padding: 15px; color:black"><input type="text" class="timepicker"
                                            value="{{ $businessHour->to }}" name="data[{{ $businessHour->day }}][to]"
                                            placeholder="To"></div>
                                    <div class="p-2" style="padding: 15px; color:black"><input type="number" name="data[{{ $businessHour->day }}][step]"
                                            value="{{ $businessHour->step }}" placeholder="Step"></div>
                                    <div class="p-2" style="color: white">
    
                                        <p>
                                            <label>
                                                <input value="true" name="data[{{ $businessHour->day }}][off]"
                                                    class="filled-in" type="checkbox" />
                                                {{-- <input value="true" name="data[{{ $businessHour->day }}][off]"
                                                    class="filled-in" type="checkbox" @checked($businessHour->off)/> --}}
                                                <span>OFF</span>
                                            </label>
                                        </p>
    
    
                                    </div>
    
                                </div>
                            @endforeach
    
                            <div class="d-flex justify-content-center" >
                                    <div class="d-flex justify-content-center" style="color: white">
                                <div class="p-2" >
                                    <div class="d-flex justify-content-center" style="padding:20px; ">
                                        <button class="waves-effect waves-light  btn btn-light" type="submit">
                                            save
                                        </button>
                                    </div>
                                </div>
                                <div class="p-2"></div>
                                <div class="p-2"></div>
                              </div>
                            
    
                        </form>
                    </div>




                </div>
            </div>
          </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
