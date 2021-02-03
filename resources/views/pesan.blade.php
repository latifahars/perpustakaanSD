<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <title>Flash Message</title>
</head>
<body>
    <div id="app">
        <div class="container">
          <div class="row">
           <div class="col-md-6">
            <a href="{{ url('get-pesan') }}" class="btn btn-danger btn-sm">
                Klik Disini
            </a>
            @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                  <h4 style="margin-bottom: 0px">{{ $message }}</h4>
              </div>
            @endif
          </div>
         </div>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>