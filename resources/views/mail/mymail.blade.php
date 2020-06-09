<div>
    {{ __('web.pozdrav')}} <b>{{ $data['name'] }}!</b>
    <br>
    @foreach( $data['stat'] as $row)
    <b>Model A</b> : {{ $row['model_A'] }}<br>
    <b>Model B</b> : {{ $row['model_B'] }}<br>
    <b>Model C</b> : {{ $row['model_C'] }}<br>
    <b>Model D</b> : {{ $row['model_D'] }}<br>

    @endforeach
    <br>
    <b><i>{{ __('web.vdaka')}}</i></b>
</div>