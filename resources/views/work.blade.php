@extends('layout')

@section('content')

<div class="container">
    <h2>Checklist splnených úloh</h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th></th>
                <th>Meno a Priezvisko</th>
                <th>Úloha</th>
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
                <td>Štatistika</td>
            </tr>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox checkboxKontakt">
                        <input type="checkbox" checked class="custom-control-input">
                        <label class="custom-control-label"></label>
                    </div>
                </td>
                <td>Jakub Trstenský</td>
                <td>Mail</td>
            </tr>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox checkboxKontakt">
                        <input type="checkbox" checked class="custom-control-input">
                        <label class="custom-control-label"></label>
                    </div>
                </td>
                <td>Jakub Trstenský</td>
                <td>Kyvadlo</td>
            </tr>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox checkboxKontakt">
                        <input type="checkbox" checked class="custom-control-input">
                        <label class="custom-control-label"></label>
                    </div>
                </td>
                <td>Martin Trojan</td>
                <td>Základná architektúra</td>
            </tr>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox checkboxKontakt">
                        <input type="checkbox" checked class="custom-control-input">
                        <label class="custom-control-label"></label>
                    </div>
                </td>
                <td>Martin Trojan</td>
                <td>Zabezpečenie API</td>
            </tr>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox checkboxKontakt">
                        <input type="checkbox" checked class="custom-control-input">
                        <label class="custom-control-label"></label>
                    </div>
                </td>
                <td>Martin Trojan</td>
                <td>Gulička na tyči</td>
            </tr>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox checkboxKontakt">
                        <input type="checkbox" checked class="custom-control-input">
                        <label class="custom-control-label"></label>
                    </div>
                </td>
                <td>Patrik Smolár</td>
                <td>Grafické spracovanie</td>
            </tr>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox checkboxKontakt">
                        <input type="checkbox" checked class="custom-control-input">
                        <label class="custom-control-label"></label>
                    </div>
                </td>
                <td>Patrik Smolár</td>
                <td>Jazyky</td>
            </tr>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox checkboxKontakt">
                        <input type="checkbox" checked class="custom-control-input">
                        <label class="custom-control-label"></label>
                    </div>
                </td>
                <td>Patrik Smolár</td>
                <td>Náklon lietadla</td>
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
                <td>Tlmič</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
