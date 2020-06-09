@extends('layout')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/css/bootstrap-slider.min.css">

@endsection


@section('content')

<div class="row">
  <div class="col-md-12">
  <br />
  <h3>{{ __('web.inverzne_kyvadlo') }}</h3>
  <br />
    <div class="row">

        <div class="col-4">
            <form>
                <div class="form-group">
                    <label for="r">Nová poloha Kyvadla</label>
                    <input class="form-control"  type="number" name="r" id="r" placeholder="Zadajte novú polohu kyvadla">               
                </div> 

                <!--<div class= "form-group">
                    <input id="horizontal_sl" data-slider-id='horizontal_sl' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="2" data-slider-value="1" />
                    <input type="number" min="-90" max="90" id="horizontal_sl_value" style="height:100%;" form="a" name="time">
                </div>-->         

                <div class="form-check">                
                    <input class="form-check-input" type="checkbox" name="graph" id="checkBoxForGraph">     
                    <label class="form-check-label" for="checkbox">Zobrazenie grafu</label>          
                </div>          

                <a type="submit" onclick="getDataForInvertedPendulum()" class="btn btn-primary float-left">Submit</a>
            </form>     
        </div>      
    </div>  
  </div>

  <div class="row">
  <div class="col-12">
            <div id="graph" style="width:1200px;height:500;">
            </div>
        </div>       
  </div>
</div>


<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/bootstrap-slider.min.js "></script>

@endsection