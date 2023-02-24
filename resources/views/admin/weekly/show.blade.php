@extends('layouts.master')


@section('page_title')
    Manual Weekly Amortization
@endsection

@section('header')
    <x-navbar></x-navbar>
    <x-sidebar></x-sidebar>
@endsection


@section('main')
    <div class="row">
        <div class="col-lg-8 ">
           <x-session></x-session>
            <div class="card">
                <div class="card-header">
                    <x-label value="{{$member->FullName}}"></x-label>
                </div>
                <div class="card-body">
                    <x-form action="{{route('weekly.store')}}" method="POST">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <x-label for="" value="Group Name"></x-label>
                                : {{$member->groups->group_name}}
                            </div>

                            <div class="col-12 mb-3">
                                <x-label for="" value="Loan Officer"></x-label>
                                : {{$member->groups->loan_officers->FullName}}
                            </div>
                            <input type="text" name="member_id" hidden value="{{$member->id}}">
                            <div class="col-12 mb-3">
                                <x-label for="" value="Weekly Amortization Amount"></x-label>
                                <x-input type="number" name="amount" />
                            </div>

                            <div class="col-12 mb-3">
                                <x-button class="btn-primary">Submit</x-button>
                                <a class="float-end" href="{{route('weekly.index')}}">Back</a>
                            </div>

                        </div>
                    </x-form>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function (){
            $("#table").DataTable();
        });
    </script>
@endsection

