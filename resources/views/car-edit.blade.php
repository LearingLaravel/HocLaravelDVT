<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif

          <div class="card">
            <div class="card-header">
              <h4>Edit Car</h4>
            </div>
            <div class="card-body">
              <form action="{{ url('cars/'.$car->id.'/edit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="model">Model</label>
                  <input type="text" name="model" id="model" class="form-control" value="{{$car->model}}">
                  @error('model')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="description">Description:</label>
                  <textarea rows="5" name="description" id="description" class="form-control">{{$car->description}}</textarea>
                  @error('description')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="brand">Upload Image</label>
                  {{-- <input type="file" name="brand" id="brand" class="form-control" value='{{$car->brand}}' onchange="previewImage(event)" >    --}}
                  <input type="file" name="brand" id="brand" class="form-control" value='{{$car->brand}}' onchange="previewImage(event)">
                  <img src="{{ asset($car->brand)}}" width="200px" height="200px" id="preview" class="" alt="">
                  @error('brand')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                
                <script>
                function previewImage(event) {
                  var input = event.target;
                  var reader = new FileReader();
                
                  reader.onload = function() {
                    var imgElement = document.getElementById("preview");
                    imgElement.src = reader.result;
                  };
                
                  reader.readAsDataURL(input.files[0]);
                }
                </script>


                <div class="form-group">
                  <label for="produced_on">Produced On:</label>
                  <input type="date" name="produced_on" id="produced_on" class="form-control" value="{{$car->produced_on}}">
                  @error('produced_on')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="image">Image:</label>
                  <input type="text" name="image" id="image" class="form-control" value="{{$car->image}}">
                  @error('image')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="mb-3">
                  <button type="submit" class="btn btn-primary">Edit</button>
                  <a href="{{url('/')}}" class="btn btn-primary float-end">Back</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
