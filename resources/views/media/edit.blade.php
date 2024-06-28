<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>This is media upload lesson</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
      <div class="container mt-5">
        <h1>Update Media!</h1>
        
        <div class="row">
            <div class="col-lg-4">
                <form action="{{ route('update',$singleUp->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                      @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                      @endif

                      <input type="file" onchange="document.querySelector('#output').src=window.URL.createObjectURL(this.files[0])" name="image" id="image" class="form-control" >
                      
                     @error('image')
                      <div class="alert alert-danger">{{ $message }}</div>
                     @enderror

                      <button class="btn btn-primary mt-2">Update Now</button>
                      
                    
                </form>
            </div>
            <div class="col-lg-6">
              <div class="row">
              
                <div class="col-lg-8">
                  
                  <img class="img-fluid img-thumbnail" id="output" src="{{ asset('images/'.$singleUp->file_name) }}" alt="">
                  <a href="{{ route('home') }}" class="btn btn-success btn-sm mt-2">Home</a>
                </div>
             
              </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>