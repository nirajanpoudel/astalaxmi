@extends('layouts.fiscal')
@section('content')
            <div class="panel panel-success">
                <div class="panel-heading">
                    Fiscal Years
                </div>

                <div class="panel-body">
                    <a href="{{url('fiscal-year')}}">create New</a>
                    <table class="table table-responsive">
                        <tr>
                            <td>SN</td>
                            <td>Year</td>
                            <td>&nbsp;</td>
                        </tr>
                        @foreach($settings as $i=>$setting)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$setting->fiscal_year_start}}</td>
                                <td>
                                    <a href="{{url($setting->id.'/dashboard')}}">Go</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
@endsection