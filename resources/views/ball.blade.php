@extends('layout')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/css/bootstrap-slider.min.css">

@endsection


@section('content')

<div class="row">
  <div class="col-md-12">
  <br />
  <h3>{{ __('web.ball') }}</h3>
  <br />
    <div class="row">

        <div class="col-4">
            <form>
                <div class="form-group">
                    <label for="r">{{ __('web.ball_position') }}</label>
                    <input class="form-control"  type="number" name="r" id="r" require placeholder="Zadajte novú polohu guličky">               
                </div> 
              

                <div class="form-check">              
                    <input class="form-check-input" type="checkbox" name="animation" id="animationCheck">    
                    <label class="form-check-label" id="neviem" for="animation">{{ __('web.animation_render') }}</label>         
                </div>          

                <div class="form-check">                
                    <input class="form-check-input" id="graphCheck" type="checkbox" name="graph" id="graph">     
                    <label class="form-check-label" for="checkbox">{{ __('web.display_graph') }}</label>          
                </div>          

                <a type="submit" onclick="getDataForBall()" class="btn btn-primary float-left">{{ __('web.execute') }}</a>
            </form>     
        </div>      
    </div>  
  </div>

  <div class="row">
  <div class="col-12">
            <div id="g" style="width:1200px;height:500;">
            </div>
        </div>       
  </div>
</div>



@endsection

@section('scripts')
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

@endsection