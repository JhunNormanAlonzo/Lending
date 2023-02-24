@extends('layouts.master')


@section('page_title')
    Daily Over Due Report
@endsection

@section('header')
    <x-navbar></x-navbar>
    <x-sidebar></x-sidebar>
@endsection


@section('main')
    <div class="row">
        <div class="col-12">
            <x-session></x-session>
            <div class="card">
                <div class="card-header">
                    Group of Not Paid
                </div>
                <div class="card-body">
                    <livewire:daily-over-due></livewire:daily-over-due>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function (){
            $("#table").DataTable({
                fixedColumns: true
            });
        });
    </script>
@endsection

