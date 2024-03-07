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
      <h3 class="text-center mt-4">Car Details</h3>
      <div class="card mt-4">
          <div class="row g-0">
              <div class="col-md-4">
                  <img src="{{ $car->image }}" alt="Car Image" class="img-fluid rounded-start">
              </div>
              <div class="col-md-8">
                  <div class="card-body">
                      <ul class="list-group list-group-flush">
                          <li class="list-group-item"><strong>ID</strong> {{ $car->id }}</li>
                          <li class="list-group-item"><strong>Description</strong> {{ $car->description }}</li>
                          <li class="list-group-item"><strong>Model</strong> {{ $car->model }}</li>
                          <li class="list-group-item"><strong>Produced On</strong> {{ $car->produced_on }}</li>
                          <button type="button" style="width:200px"  class="btn btn-info mt-2 " onclick="history.back()">Back to List Car</button>
                      </ul>
                  </div>
                 
              </div>
          </div>
      </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>