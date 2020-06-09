@extends('layout')

@section('content')

<div class="row">
  <div class="col-md-12">
  <br />
  <h3>{{ __('web.statistika') }}</h3>
  <br />
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">{{ __('web.nazov') }}</th>
        <th scope="col">{{ __('web.pocet_navstev') }}</th>
      </tr>
    </thead>
    <tbody>
    @foreach($stat as $row)
      <tr>
        <th scope="row">1</th>
        <td>{{ __('web.modelA') }}</td>
        <td>{{$row['model_A']}}</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>{{ __('web.modelB') }}</td>
        <td>{{$row['model_B']}}</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>{{ __('web.modelC') }}</td>
        <td>{{$row['model_C']}}</td>
      </tr>
      <tr>
        <th scope="row">4</th>
        <td>{{ __('web.modelD') }}</td>
        <td>{{$row['model_D']}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
  </div>
</div>

@if(count($errors) >0)
  <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <ul>
      @foreach($errors->all() as $error)
        <li>
          {{ $error }}
        </li>
      @endforeach
    </ul>
  </div>
@endif

@if($message = Session::get('success'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{ $message }}</strong>
  </div>
@endif
<form method="POST" action="{{ url('sendemail') }}">
{{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">{{ __('web.email')}}</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ __('web.vloz_email') }}">
  </div>
  <button type="submit" class="btn btn-primary">{{ __('web.poslat')}}</button>
</form>

@endsection
