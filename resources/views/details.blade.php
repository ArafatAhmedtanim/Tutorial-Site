
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 col-sm-3" id="menu_col">
            <div class="card" style="box-shadow:2px 2px 5px 2px #888888;">
                <div class="card-header" style="background-color: #cccccc">Menu</div>

                <div class="card-body">
                    @foreach ($details as $detail)
                        <li class="list-group-item" id="{{$detail->id}}" onclick="change('{{$detail->id}}','{{ucfirst(trans(str_replace('_', ' ', $detail->file_name)))}}')">
                            <button type="button" class="btn  btn-sm" style="background-color: white"> {{ucfirst(trans(str_replace('_', ' ', $detail->file_name)))}}
                            </button>
                        </li>
                    @endforeach
                </div>
            </div>
        </div>

         <div class="col-md-9 col-sm-9" id="details_col">
            <div class="card"  style="box-shadow:2px 2px 5px 2px #888888;">
                <div class="card-header" id="topic_name" style="background-color: #cccccc" onclick="fullScreen()">Select Topic:
                </div> 

                <div class="card-body" id="topic_detail">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function change(id, n){
        $.ajax({
 
                    type:"GET",
                    url:"/test/"+id,
                    success: function(data) {
                        $("#topic_detail").hide().html(data).fadeIn();
                        $("#topic_name").hide().html(n).slideUp(2000).slideDown(2000);
                    },
                    error: function(e)
                    {
                        console.log(e)
                    }
        })
    
    }

    function fullScreen() {
        var x = document.getElementById("menu_col");
        
        if (x.style.display === "none") {
            x.style.display = "block";
            $("#menu_col").addClass('col-md-3');
            $("#details_col").removeClass('col-md-12');
            $("#details_col").addClass('col-md-9');
        } else {
            x.style.display = "none";
            $("#details_col").addClass('col-md-12');

        }
    }
</script>
@endsection