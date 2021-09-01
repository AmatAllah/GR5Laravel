
<!DOCTYPE html>
<html lang="en">
<head>
<title>Register</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


  {{ session()->get('Message') }}


<div class="container">
<h2>Register</h2>
<form  method="post"  action="{{ url('/Student') }}"  enctype ="multipart/form-data">

@csrf
<div class="form-group">
<label for="exampleInputEmail1">Name</label>
<input type="text"  name="name"   value="{{ old('name') }}" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
</div>


<div class="form-group">
<label for="exampleInputEmail1">Email address</label>
<input type="email" name="email"  value="{{ old('email') }}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
</div>

<div class="form-group">
<label for="exampleInputPassword1">New Password</label>
<input type="password"  name="password"  value="{{ old('password') }}"  class="form-control" id="exampleInputPassword1" placeholder="Password">
</div>




<div class="form-group">
    <label for="exampleInputPassword1">Department</label>
 <select name="dep_id" class="form-control">
     @foreach ($data as  $value )
         <option value="{{ $value->id }}" >{{ $value->title }}</option>
     @endforeach
 </select>   

</div>


<div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file"  name="image"    >
    </div>

 



{{-- <div class="form-group">
    <label for="exampleInputPassword1">DOF</label>
    <input type="date"  name="dof" id="dof"  value="2000-10-12"  class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
     --}}


<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

{{-- <script>

  $('#dof').click(function(){

        $(this).prop('type','date');
  });

</script> --}}

</body>
</html>
