@extends('base')
@section('scripts') 
@parent
<script type="text/javascript">
  $(function(e) {
    $("#header_div").fadeTo(6000,1,function(){

    });

    $("#block1").fadeTo(500,1,function(){
      $("#block2").fadeTo(500,1,function(){
        $("#block3").fadeTo(500,1,function(){
          $("#block4").fadeTo(500,1,function(){
            $("#block5").fadeTo(500,1,function(){
              $("#block6").fadeTo(500,1,function(){
               // $("#allblock").animate({"margin-top":"50%"},4000);
             });
            }); 
          });
        });
      }); 
    });

  });
</script>
@endsection
@section('content')
<div class="masthead opacity-none " id="header_div">
  <div class="intro-info">
    <div class="container home-media">
      <div class="row" id="allblock">
        <!-- <div id="block1" class=" opacity-none col-md-2">
          <h1 class="big-text">B
          </h1>
        </div>
        <div id="block2" class="opacity-none col-md-2">
          <h1 class="big-text">U
          </h1>
        </div>
        <div id="block3" class="col-md-2 opacity-none">
          <h1 class="big-text">K
          </h1>
        </div>
        <div id="block4" class="col-md-2 opacity-none">
          <h1 class="big-text">R
          </h1>
        </div>
        <div id="block5" class="col-md-2 opacity-none">
          <h1 class="big-text">E
          </h1>
        </div>
        <div id="block6" class="col-md-2 opacity-none">
          <h1 class="big-text">Y
          </h1>
        </div> -->
        <h1 class="big-text flex">
          <div id="block1" class="opacity-none">B
          </div>
          <div id="block2" class="opacity-none">U
          </div>
          <div id="block3" class="opacity-none">K
          </div>
          <div id="block4" class="opacity-none">R
          </div>
          <div id="block5" class="opacity-none">E
          </div>
          <div id="block6" class="opacity-none">Y
          </div>
        </h1>        
      </div>
    </div>
  </div>
</div>


@endsection