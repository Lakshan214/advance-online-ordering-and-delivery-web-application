<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.links')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.saidebar')
      <!-- partial -->
     
      @include('admin.navbar')
          <footer class="footer" style="width: 100%;">
          
            <div style="margin-top: 50px" class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edite products</h4>
                    
                    <form action="{{route('Products.update',$product->id)}}" class="forms-sample" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="form-group" >
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control"name="pname" style="background-color: #2A3038"  value="{{$product->Name}}"  >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">imges:</label>
                        <input type="file" name="image"style="background-color: #2A3038"  class="form-control"  >
                      </div>
                      <img style="width: 50px; height: 50px;" style="background-color: #2A3038" src="/product/{{$product->image}}"><br>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Product Catagory:</label>
                        <input type="text" class="form-control"style="background-color: #2A3038"  name="Pcatagory" value="{{$product->Catagory}}"  >
                      </div>
                     
                      
                      
                      <div class="form-group">
                        <label for="exampleInputCity1">Quantity:</label>
                        <input type="number" value="{{$product->quantity}}"name="PQuntty" style="background-color: #2A3038"  class="form-control" >
                      </div>

                      <div class="form-group">
                        <label for="exampleInputCity1">Price:</label>
                        <input type="number"  value="{{$product->Price}}" name="Pprice" style="background-color: #2A3038"  class="form-control" >
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">description:</label>
                        <textarea class="form-control" name="Pdescripton" style="background-color: #2A3038"  rows="4">{{$product->Descrtiptton}}</textarea>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2" style="background-color: green">Edite Product</button>
                      <button class="btn btn-dark" style="background-color: red">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>

          </footer>
         
        </div>
     
      </div>
 
 
   
    @include('admin.js')
  </body>
</html>