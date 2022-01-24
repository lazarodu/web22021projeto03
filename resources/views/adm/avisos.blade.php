@extends('adm.layout')

@section('content')
@livewireStyles

{{$slot}}

@livewireScripts
@endsection
