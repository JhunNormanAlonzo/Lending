@extends('layouts.master')


@section('page_title')
    Group Module
@endsection

@section('header')
    <x-navbar></x-navbar>
    <x-sidebar></x-sidebar>
@endsection


@section('main')
    <div class="row">
        <div class="col-lg-8 ">
            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{ Session('message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Create Group
                </div>
                <div class="card-body">
                    <x-form action="{{route('groups.store')}}" method="POST">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <x-label for="" value="Group Name"></x-label>
                                <x-input name="group_name"></x-input>
                            </div>

                            <div class="col-12 mb-3">

                                <x-label for="" value="Leader"></x-label>
                                <x-input name="leader" />

                            </div>

                            <div class="col-12 mb-3">

                                <x-label for="" value="Meeting"></x-label>
                                <x-select  name="meeting">
                                    <option value="" selected disabled>Choose..</option>
                                    <option value="monday">Monday</option>
                                    <option value="tuesday">Tuesday</option>
                                    <option value="wednesday">Wednesday</option>
                                    <option value="thursday">Thursday</option>
                                    <option value="friday">Friday</option>
                                </x-select>

                            </div>

                            <div class="col-12 mb-3">

                                <x-label for="" value="Address"></x-label>
                                <x-input  name="address" />
                            </div>

                            <div class="col-12 mb-3">

                                <x-label for="" value="Contact Number"></x-label>
                                <x-input type="number" name="contact_number" />

                            </div>

                            <div class="col-12 mb-3">
                                <x-label for="" value="Loan Officer"></x-label>

                                <x-select  name="loan_officer_id">
                                    <option value="">Choose...</option>
                                    @foreach($loan_officers as $loan_officer)
                                        <option value="{{$loan_officer->id}}">{{ucwords($loan_officer->firstname." ".$loan_officer->middlename." ".$loan_officer->lastname)}}</option>
                                    @endforeach
                                </x-select>

                            </div>

                            <div class="col-12 mb-3">
                                <x-button class="btn-primary">Submit</x-button>
                                <a class="float-end" href="{{route('groups.index')}}">Back</a>
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

