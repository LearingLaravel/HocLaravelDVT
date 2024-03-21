<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
     .form-group label.error {
        color: rgb(255, 115, 0);
    }
  </style>
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
              <h4>Add Car</h4>
            </div>
            <div class="card-body">
              <form action="{{ url('cars/create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="model" class="{{ $errors->has('model') ? 'error' : '' }}">Model:</label>
                  <input type="text" name="model" id="model" class="form-control" value="{{old('model')}}">
                  @error('model')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="description" class="{{ $errors->has('description') ? 'error' : '' }}">Description:</label>
                  <textarea rows="5" name="description" id="description" class="form-control">{{old('description')}}</textarea>
                  @error('description')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="produced_on" class="{{ $errors->has('produced_on') ? 'error' : '' }}">Produced On:</label>
                  <input type="date" name="produced_on" id="produced_on" class="form-control" value="{{old('produced_on')}}">
                  @error('produced_on')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="image" class="{{ $errors->has('image') ? 'error' : '' }}">Link Image</label>
                  <input type="text" name="image" id="image" class="form-control" value="{{old('image')}}">
                  @error('image')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                
                <div class="form-group">
                  <label for="brand" class="{{ $errors->has('brand') ? 'error' : '' }}" >Upload brand</label>
                  <input type="file" value="" name="brand"   onchange="loadFile(this)" id="brand" class="form-control">
                  <img id="brand-preview" width='200px' height='200px' style=" display:none" >
                  @error('brand')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

           
                  <div class="form-group">
                    <label for="mf_id">Hãng xe</label>
                    <select name="mf_id" class="form-control">
                        <option value="">Chọn hãng xe</option>
                        @foreach($mf_names as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
             
               
              <script>
                var loadFile = function(output) {
                  var output = document.getElementById('brand-preview');
                  output.src = URL.createObjectURL(event.target.files[0]);
                  output.style.display = 'block';
                  output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                  }
                };
              </script>

                <div class="mb-3">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
