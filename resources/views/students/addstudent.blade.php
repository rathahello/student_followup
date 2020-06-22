<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Add student</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-3"></div>
            
            <div class="col-6">
                <div class="card">
                    <div class="card-header text-center">Add students</div>
                    <div class="card-body">
                        <form action="{{route('students.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                               
                                <input type="text" name="firstname" class="form-control" placeholder="fistname">
                            </div>
                            <div class="form-group">
                               
                                <input type="text" name="lastname" class="form-control" placeholder="lastname">
                            </div>
                            <div class="form-group">
                                <input type="text" name="class" class="form-control" placeholder="Class">
                            </div>
                            
                            <div class="form-group">
                                <input type="file" name="picture" class="form-control" placeholder="Picture">
                            </div>

                                <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea class="form-control" rows="3" name="description"></textarea>
                                    </div>
                            
                                    <button type="reset" class="btn btn-warning"><a href="{{route('home')}}" class="text-white">Back</a></button>
                                <button type="submit" class="btn btn-success float-right">Add Student</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</body>
</html>