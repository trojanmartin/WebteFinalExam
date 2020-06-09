@extends('layout')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/css/bootstrap-slider.min.css">

@endsection


@section('content')


<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>{{ __('web.ball') }}</h2>
            <div class="form-group">
                <label for="url"></label>
                <input type="text" class="form-control" readonly value="https://wt58.fei.stuba.sk:4458/final/index.php/api/octave/ball?apikey=<hodnota>&r=<hodnota>&startPosition=<hodnota>&startSpeed=<hodnota>">
            </div>

            <h3>{{ __('web.parameters') }}</h3>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">{{ __('web.arguments') }}</th>
                        <th scope="col">{{ __('web.description') }}</th>
                    </tr>
                    </thead>
<<<<<<< HEAD
                    <tbody>           
                    <tr>
=======
                    <tbody>
                    <tr>apikeydesc
>>>>>>> 241eadfb01f69158b42589a6890c86e967f49482
                        <th>apikey</th>
                        <td>{{ __('web.apikeydesc') }}</td>
                    </tr>
                    <tr>
                        <th>r</th>
                        <td>{{ __('web.newposition') }}</td>
                    </tr>
                    <tr>
                        <th>startPosition</th>
                        <td>{{ __('web.startposition') }}</td>
                    </tr>
                    <tr>
                        <th>startSpeed</th>
                        <td>{{ __('web.startspeed') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <h2>{{ __('web.suspension') }}</h2>
            <div class="form-group">
                <label for="url"></label>
                <input type="text" class="form-control" readonly value="https://wt58.fei.stuba.sk:4458/final/index.php/api/octave/suspension?apikey=<hodnota>&r=<hodnota>">
            </div>

            <h3>{{ __('web.parameters') }}</h3>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">{{ __('web.arguments') }}</th>
                        <th scope="col">{{ __('web.description') }}</th>
                    </tr>
                    </thead>
                    <tbody>           
                    <tr>
                        <th>apikey</th>
                        <td>{{ __('web.apikeydesc') }}</td>
                    </tr>
                    <tr>
                        <th>r</th>
                        <td>{{ __('web.height') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h2>{{ __('web.plane_title') }}</h2>
            <div class="form-group">
                <label for="url"></label>
                <input type="text" class="form-control" readonly value="https://wt58.fei.stuba.sk:4458/final/index.php/api/octave/plane?apikey=<hodnota>&r=<hodnota>">        
            </div> 

            <h3>{{ __('web.parameters') }}</h3>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">{{ __('web.arguments') }}</th>
                        <th scope="col">{{ __('web.description') }}</th>                
                    </tr>
                    </thead>
                    <tbody>           
                    <tr>
                        <th>apikey</th>
                        <td>{{ __('web.apikeydesc') }}</td>
                    </tr>
                    <tr>
                        <th>r</th>
                        <td>{{ __('web.newposition') }}</td>
                    </tr>         
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h2>{{ __('web.inverzne_kyvadlo') }}</h2>
            <div class="form-group">
                <label for="url"></label>
                <input type="text" class="form-control" readonly value="https://wt58.fei.stuba.sk:4458/final/index.php/api/octave/inverted_pendulum?apikey=<hodnota>&r=<hodnota>">        
            </div> 

            <h3>{{ __('web.parameters') }}</h3>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">{{ __('web.arguments') }}</th>
                        <th scope="col">{{ __('web.description') }}</th>                
                    </tr>
                    </thead>
                    <tbody>           
                    <tr>
                        <th>apikey</th>
                        <td>{{ __('web.apikeydesc') }}</td>
                    </tr>
                    <tr>
                        <th>r</th>
                        <td>{{ __('web.newposition') }}</td>
                    </tr>         
                </tbody>
            </table>
        </div>
    </div>

</div>


@endsection

@section('scripts')
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script type="text/javascript" src="{{ asset('md/js/script.js') }}"></script>
@endsection
