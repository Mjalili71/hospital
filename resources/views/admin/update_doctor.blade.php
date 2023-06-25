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


             <form  action="{{url('editdoctor',$data->id)}}" method="POST" enctype="multipart/form-data" >
              @csrf
              <div style="padding: 15px;">
                <label > Docter name</label>
                <input type="text" name="name" style="color:black;" value="{{$data->name}}">
              </div>


              <div style="padding: 15px;">
                <label >Phone</label>
                <input type="number" name="number" style="color:black;"  value="{{$data->phone}}">
              </div>

              <div style="padding: 15px;">
                <label > Specility</label>
                <input type="text" name="sepecialty" style="color:black;"  value="{{$data->sepecialty}}">
              </div>

              <div style="padding: 15px;">
                <label > Room</label>
                <input type="text" name="room" style="color:black;" value="{{$data->room}}">
              </div>

              <div style="padding: 15px;">
                <label >Old image</label>
               <img   height="150"  width="150"   src="doctorimage/{{$data->image}}">
              </div>
              

              <div style="padding: 15px;">
                <label >Change image</label>
               <input type="file" name="file">
               <div style="padding: 15px;">
                <input type="submit" class="btn btn-primary">
              </div>
              </div>
             </form>
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
