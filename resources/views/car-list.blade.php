

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
  <div class="container">
    <div class="container">
        <h2 class="text-center mt-4">List of Cars</h2>
        <a href="{{url('cars/create')}}" class="btn btn-primary">Add Car</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Produced On</th>
                    <th>ID_Mf</th>
                    <th>Name_MF</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        
                        <td>{{ $car->id }}</td>
                        <td><img src="{{ $car->image }}" alt="Car Image" class="img-thumbnail" style=""></td>
                        <td>{{ $car->description }}</td>
                        <td>
                            <img src="{{ asset($car->brand) }}" alt="Brand Image" class="img-thumbnail" style="">
                        </td>
                        
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->produced_on }}</td>
                        <td>{{ $car->mf_id }}</td>
                        <td>{{ $car->mf_name }}</td>
                     
                        <td>
                            <div class="btn-group" role="group" aria-label="Car Actions">
                            <a href="car/{{$car->id}}" class="btn btn-primary"> Detail</a>
                            {{-- <a href="{{route ('cars.show', $car->id)}}" class="btn btn-primary">View Detail</a> --}}
                            {{-- <a href="{{ action([App\Http\Controllers\CarController::class, 'show'], ['car' => $car->id]) }}" 
                                class="btn btn-success">Detail</a> --}}
                            <a href="{{url('cars/'.$car->id.'/edit')}}" class="btn btn-warning">Edit</a>
                            <a href="{{url('cars/'.$car->id.'/delete')}}" onclick="return confirm ('Are you sure?')" class="btn btn-danger">Delete</a>
                            </div>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>