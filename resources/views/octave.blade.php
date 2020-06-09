@extends('layout')

@section('content')

<div class="row">
  <div class="col-md-12">
  <br />
  <h3>{{ __('web.octave_console') }}</h3>
  <br />
    <div class="row">
        <div class="col-md-6">
        <h4>{{ __('web.input') }}</h4>
        <textarea id="command" name="command" rows="15" cols="70">

        </textarea>

        <a class="btn btn-primary" href="#" role="button" onclick="callConsole()">{{ __('web.execute') }}</a>
        </div>

        <div class="col-md-6">

        <h4>{{ __('web.response') }}</h4>

        <textarea id="response" name="response" rows="15" cols="70">

        </textarea>
        </div>
    </div>

    </button>
  </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('md/js/script.js') }}"></script>
@endsection