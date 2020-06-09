@extends('layout')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/css/bootstrap-slider.min.css">

@endsection


@section('content')


<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Gulička na tyči</h1>

        

            <div class="form-group">
                <label for="url"></label>
                <input type="text" class="form-control" readonly value="https://wt58.fei.stuba.sk:4458/final/index.php/api/octave/ball?apikey=<hodnota>&r=<hodnota>&startPosition=<hodnota>&startSpeed=<hodnota>">        
            </div> 

            <h3>Parametre</h3>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Argument</th>
                        <th scope="col">Popis</th>                
                    </tr>
                    </thead>
                    <tbody>           
                    <tr>
                        <th>apikey</th>
                        <td>Api kľúč pre pístup</td>
                    </tr>
                    <tr>
                        <th>r</th>
                        <td>Nová poloha</td>
                    </tr>
                    <tr>
                        <th>startPosition</th>
                        <td>Inicializačná poloha</td>
                    </tr>
                    <tr>
                        <th>startSpeed</th>
                        <td>Počiatočná rýchlosť</td>
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