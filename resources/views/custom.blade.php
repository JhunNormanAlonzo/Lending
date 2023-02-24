@extends('layouts.master')


@section('page_title')
    Custom Module
@endsection

@section('header')
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
                <div class="card-body">
                    <x-form method="delete">
                        <div class="row">
                            <div class="col-12">
                                <x-label for="" value="Username"></x-label>
                                <x-input name="username"></x-input>
                            </div>

                            <div class="col-12">
                                <x-button type="submit" class="btn-primary">Submit</x-button>
                            </div>
                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')

@endsection

