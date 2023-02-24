@extends('layouts.master')


@section('page_title')
    Loan Officer Module
@endsection

@section('header')
    <x-navbar></x-navbar>
    <x-sidebar></x-sidebar>
@endsection


@section('main')
    <div class="row">
        <div class="col-lg-12">
            <x-session></x-session>
            <div class="card">
                <div class="card-header">
                    Update Loan Officer
                </div>
                <div class="card-body">
                    <x-form action="{{route('loan_officers.update', [$loan_officer->id])}}" method="PATCH">
                        <div class="row">
                            <div class="col-4 mb-3">

                                <x-label for="">First Name</x-label>
                                <x-input value="{{$loan_officer->firstname}}" name="firstname" />

                            </div>

                            <div class="col-4 mb-3">

                                <x-label for="">Middle Name</x-label>
                                <x-input value="{{$loan_officer->middlename}}" name="middlename" />
                            </div>

                            <div class="col-4 mb-3">

                                <x-label for="">Last Name</x-label>
                                <x-input value="{{$loan_officer->lastname}}" name="lastname" />

                            </div>


                            <div class="col-12 mb-3">

                                <x-label for="">Address</x-label>
                                <x-textarea name="address"  rows="3">{{$loan_officer->address}}</x-textarea>

                            </div>

                            <div class="col-3 mb-3">

                                <x-label for="">Contact Number</x-label>
                                <x-input value="{{$loan_officer->contact_number}}"   name="contact_number" />

                            </div>

                            <div class="col-3 mb-3">
                                <x-label for="">Gender</x-label>
                                <x-select name="gender">
                                    <option value="" selected disabled>Choose..</option>
                                    <option @if($loan_officer->gender == "male") selected @endif value="male">Male</option>
                                    <option @if($loan_officer->gender == "female") selected @endif value="female">Female</option>
                                </x-select>
                            </div>

                            <div class="col-3 mb-3">
                                <x-label for="">Position</x-label>
                                <x-select  name="position_id">
                                    <option value="" selected disabled>Choose..</option>
                                    @foreach($positions as $position)
                                        <option @if($loan_officer->position_id == $position->id) selected @endif value="{{$position->id}}">{{ucwords($position->name)}}</option>
                                    @endforeach
                                </x-select>

                            </div>

                            <div class="col-3 mb-3">
                                <x-label for="">Date Hired</x-label>
                                <x-input type="date" value="{{\Carbon\Carbon::parse($loan_officer->date_hired)->format('Y-m-d')}}"  name="date_hired" />
                            </div>


                            <div class="col-12 mb-3">
                                <x-button  class="btn-primary">Update</x-button>
                                <a class="float-end" href="{{route('loan_officers.index')}}">Back</a>
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

