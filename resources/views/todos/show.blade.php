<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
    <title>Todo Item</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center my-5">{{ $todo->name }}</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header">Details</div>
                    <div class="card-body">
                        {{ $todo->description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>