@extends('layouts.master')


@section('page_title')
    Members Module
@endsection

@section('header')
    @livewireStyles
    <x-navbar></x-navbar>
    <x-sidebar></x-sidebar>
@endsection


@section('main')
    <div class="row">
        <div class="col-12">
            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{ Session('message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Member Lists
                    <a class="btn btn-primary btn-sm float-end" href="{{route('members.create')}}"><i class="bi bi-plus"></i> Create</a>
                </div>
                <div class="card-body">
                    <livewire:counter></livewire:counter>
                </div>
            </div>
        </div>
    </div>

    @livewireScripts
@endsection


@section('script')
    <script>
        $(document).ready(function (){
            $("#table").DataTable({
                scrollX: true,
                fixedColumns: true
            });
        });
    </script>
@endsection

