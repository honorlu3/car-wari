@extends('layouts.app')

@section('title','Car Wari | Tours y Transporte Turístico en Ayacucho')

@section('description',
'Reserva tours, transporte turístico, traslados al aeropuerto y taxis privados en Ayacucho con Car Wari.')

@section('keywords',
'tours Ayacucho, turismo Ayacucho, Millpu, Quinua, transporte turístico')


@section('content')

@include('layouts.partials.hero')

@include('layouts.partials.destinations')

@include('layouts.partials.stats_section')

@include('layouts.partials.testimonials_section')

@include('layouts.partials.cta_section')

@endsection





