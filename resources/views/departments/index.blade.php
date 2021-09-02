
<!DOCTYPE html>
<html>

<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }
        
        .m-b-1em {
            margin-bottom: 1em;
        }
        
        .m-l-1em {
            margin-left: 1em;
        }
        
        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">
 

        <div class="page-header">
            <h1>{{ trans('website.Departments') }}</h1> 

            {{ session()->get('Message') }}

        </div>

          <a href="{{ url('/Lang/ar') }}">ع</a> || <a href="{{ url('/Lang/en') }}">EN</a> 

        <!-- PHP code to read records will be here -->


        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>#</th>
                <th>{{ trans('website.id') }}</th>
                <th>{{ trans('website.title') }}</th>
                <th>{{ trans('website.ShowUsers') }}</th>
                <th>{{ trans('website.Updated_at') }}</th>
            </tr>

       

         @foreach ($data as $key => $value )

           <tr>

             <td>{{ ++$key }}</td>
             <td>{{ $value->id }}</td>
             <td>{{ $value->title }}</td>
            <td><a href='' data-toggle="modal" data-target="#modal_single_show{{ $key }}"  class='btn btn-primary m-r-1em'>{{ trans('website.show') }}</a>
           </td>
             <td>{{ $value->updated_at }}</td>

           </tr> 





        
           <div class="modal" id="modal_single_show{{ $key }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Students ..</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
                   </button>
                    </div>
        
                    <div class="modal-body">

                        @foreach ($value->students as $student )
                            {{ '* '.$student->name }} <br>
                        @endforeach
                    
                        </div>
                    <div class="modal-footer">
               

                            <div class="not-empty-record">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                            </div>
                
                    </div>
                </div>
            </div>
        </div>


           @endforeach

       
            <!-- end table -->
        </table>
    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>







  
  
