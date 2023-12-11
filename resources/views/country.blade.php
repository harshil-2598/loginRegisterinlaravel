<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
</head>
<body>
    <div class="container">
        <form action="{{ route('savecountry') }}" class="form-group" method="post">
            @csrf
        <div class="row">
        @if(session('success'))
        <div class="error">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
            
        @endif
            <div class="col-md-6">
                <label>Country</label>
                <input type="text" class="form-control" name="country_name" id="country_name">
            </div>
            @if($errors->has('country_name'))
                <div class="error text-danger">{{ $errors->first('country_name') }}</div>
            @endif
        </div>
        <br>
        <div class="row">
        <div class="col-md-6">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
        </form>
    </div>
</body>
</html>
<script>
    
        setTimeout(function(){
            $('.error').html('');
        },3000);
    
</script>