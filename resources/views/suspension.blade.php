@extends('layout')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/css/bootstrap-slider.min.css">

@endsection


@section('content')

<div class="row">
  <div class="col-md-12">
  <br />
  <h3>{{ __('web.suspension') }}</h3>
  <br />
    <div class="row">

        <div class="col-4">
            <form>
                <div class="form-group">
                    <label for="r">{{ __('web.obstacle') }}</label>
                    <input class="form-control"  type="number" name="r" id="r" placeholder="{{ __('web.height_obstacle') }}">
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="graph" id="graph">
                    <label class="form-check-label" for="checkbox">{{ __('web.show_graph') }}</label>
                </div>

                <a type="submit" onclick="getDataForSuspension()" class="btn btn-primary float-left">Submit</a>
            </form>
        </div>
    </div>
  </div>

  <div class="row">
  <div class="col-12">
            <div id="gr" style="width:1200px;height:500;">
            </div>
        </div>
  </div>
</div>


@endsection

@section('scripts')
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script type="text/javascript" src="{{ asset('md/js/suspension.js') }}"></script>

@endsection
