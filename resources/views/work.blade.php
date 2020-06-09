@extends('layout')

@section('content')

<div class="container">
    <h2>{{ __('web.checklist') }}</h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th></th>
                <th>{{ __('web.name') }}</th>
                <th>{{ __('web.task') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox checkboxKontakt">
                        <input type="checkbox" checked class="custom-control-input">
                        <label class="custom-control-label"></label>
                    </div>
                </td>
                <td>Jakub Trstenský</td>
                <td>{{ __('web.statistika') }}</td>
            </tr>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox checkboxKontakt">
                        <input type="checkbox" checked class="custom-control-input">
                        <label class="custom-control-label"></label>
                    </div>
                </td>
                <td>Jakub Trstenský</td>
                <td>{{ __('web.email') }}</td>
            </tr>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox checkboxKontakt">
                        <input type="checkbox" checked class="custom-control-input">
                        <label class="custom-control-label"></label>
                    </div>
                </td>
                <td>Jakub Trstenský</td>
                <td>{{ __('web.inverzne_kyvadlo') }}</td>
            </tr>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox checkboxKontakt">
                        <input type="checkbox" checked class="custom-control-input">
                        <label class="custom-control-label"></label>
                    </div>
                </td>
                <td>Martin Trojan</td>
                <td>{{ __('web.architecture') }}</td>
            </tr>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox checkboxKontakt">
                        <input type="checkbox" checked class="custom-control-input">
                        <label class="custom-control-label"></label>
                    </div>
                </td>
                <td>Martin Trojan</td>
                <td>{{ __('web.secureAPI') }}</td>
            </tr>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox checkboxKontakt">
                        <input type="checkbox" checked class="custom-control-input">
                        <label class="custom-control-label"></label>
                    </div>
                </td>
                <td>Martin Trojan</td>
                <td>{{ __('web.ball') }}</td>
            </tr>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox checkboxKontakt">
                        <input type="checkbox" checked class="custom-control-input">
                        <label class="custom-control-label"></label>
                    </div>
                </td>
                <td>Patrik Smolár</td>
                <td>{{ __('web.graphics') }}</td>
            </tr>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox checkboxKontakt">
                        <input type="checkbox" checked class="custom-control-input">
                        <label class="custom-control-label"></label>
                    </div>
                </td>
                <td>Patrik Smolár</td>
                <td>{{ __('web.languages') }}</td>
            </tr>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox checkboxKontakt">
                        <input type="checkbox" checked class="custom-control-input">
                        <label class="custom-control-label"></label>
                    </div>
                </td>
                <td>Patrik Smolár</td>
                <td>{{ __('web.plane_title') }}</td>
            </tr>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox checkboxKontakt">
                        <input type="checkbox" checked class="custom-control-input">
                        <label class="custom-control-label"></label>
                    </div>
                </td>
                <td>Maroš Kovaľák</td>
                <td>Log</td>
            </tr>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox checkboxKontakt">
                        <input type="checkbox" checked class="custom-control-input">
                        <label class="custom-control-label"></label>
                    </div>
                </td>
                <td>Maroš Kovaľák</td>
                <td>Export</td>
            </tr>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox checkboxKontakt">
                        <input type="checkbox" checked class="custom-control-input">
                        <label class="custom-control-label"></label>
                    </div>
                </td>
                <td>Maroš Kovaľák</td>
                <td>{{ __('web.suspension') }}</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
