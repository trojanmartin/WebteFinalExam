@extends('layout')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/css/bootstrap-slider.min.css">

@endsection


@section('content')


<div class="row">
  <div class="col-md-12">
  <br />
  <h3>DSSADSA</h3>
  <br />
    <div class="row">

        <div class="col-4">
            <form>
                <div class="form-group">
                    <label for="r">Nový uhol lietadla</label>
                    <input class="form-control"  type="number" name="r" id="r" placeholder="Zadajte nový uhol lietadla">               
                </div> 

                <div class="form-check">                
                    <input class="form-check-input" id="graphCheck" type="checkbox" name="graph">     
                    <label class="form-check-label" for="checkbox">NEVIEM</label>          
                </div>  
      
                <a type="submit" onclick="getDataForPlane()" class="btn btn-primary float-left">Submit</a>
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


<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script type="text/javascript" src="{{ asset('md/js/plane.js') }}"></script>
@endsection

@section('scripts')
@endsection