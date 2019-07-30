@extends('back-end.master')
@section('content')
    <section class="wt-haslayout wt-dbsectionspace">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-9 float-right" id="invoice_list">
                <div class="wt-dashboardbox wt-dashboardinvocies la-payout-holder">
                    <div class="wt-dashboardboxtitle wt-titlewithsearch wt-titlewithbtn">
                        <h2>{{ trans('lang.payouts') }}</h2>
                        @if ($selected_year)
                            <a href="{{url('admin/payouts/download/'.$selected_year)}}" class="wt-btn"> {{ trans('lang.download') }}</a>
                        @endif
                        {!! Form::open(['url' => url('admin/payouts'), 'method' => 'get', 'class' => 'wt-formtheme wt-formsearch', 'id'=>'payout_year_filter']) !!}
                            <span class="wt-select">
                                <select name="year" @change.prevent='getPayouts'>
                                    <option value="" disabled selected>{{ trans('lang.select_year') }}</option>
                                    @foreach ($years as $key => $year)
                                        @php $selected = $selected_year == $year ? 'selected' : '' @endphp
                                        <option value="{{$year}}" {{$selected}}> {{$year}} </option>
                                    @endforeach
                                </select>
                            </span>
                        {!! Form::close() !!}
                    </div>
                    <div class="wt-dashboardboxcontent wt-categoriescontentholder wt-categoriesholder">
                        @include('back-end.admin.payouts-table')
                        @if ($payouts->count() === 0)
                            @include('errors.no-record')
                        @endif
                        @if ( method_exists($payouts,'links') )
                            {{ $payouts->links('pagination.custom') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
