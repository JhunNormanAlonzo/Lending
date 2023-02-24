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
            <x-session></x-session>
            <div class="card">
                <div class="card-header">
                    Update Group
                </div>
                <div class="card-body">
                    <x-form action="{{route('groups.update', [$group->id])}}" method="PATCH">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <x-label value="Group Name" for=""></x-label>
                                <x-input value="{{$group->group_name}}"  name="group_name" />

                            </div>

                            <div class="col-12 mb-3">

                                <x-label value="Leader" for=""></x-label>
                                <x-input value="{{$group->leader}}" name="leader" />

                            </div>

                            <div class="col-12 mb-3">

                                <x-label for="" value="Meeting"></x-label>
                                <x-select name="meeting">
                                    <option value="" selected disabled>Choose..</option>
                                    <option @if($group->meeting == 'monday') selected @endif value="monday">Monday</option>
                                    <option @if($group->meeting == 'tuesday') selected @endif value="tuesday">Tuesday</option>
                                    <option @if($group->meeting == 'wednesday') selected @endif value="wednesday">Wednesday</option>
                                    <option @if($group->meeting == 'thursday') selected @endif value="thursday">Thursday</option>
                                    <option @if($group->meeting == 'friday') selected @endif value="friday">Friday</option>
                                </x-select>

                            </div>

                            <div class="col-12 mb-3">

                                <x-label for="" value="Address"></x-label>
                                <x-input  value="{{$group->address}}" name="address" />

                            </div>

                            <div class="col-12 mb-3">

                                <x-label for="" value="Contact Number"></x-label>
                                <x-input value="{{$group->contact_number}}" name="contact_number" />

                            </div>

                            <div class="col-12 mb-3">
                                <x-label for="">Loan Officer</x-label>
                                <x-select  name="loan_officer_id">
                                    <option value="">Choose...</option>
                                    @foreach($loan_officers as $loan_officer)
                                        <option @if($loan_officer->id == $group->loan_officer_id) selected @endif value="{{$loan_officer->id}}">{{ucwords($loan_officer->firstname." ".$loan_officer->middlename." ".$loan_officer->lastname)}}</option>
                                    @endforeach
                                </x-select>

                            </div>

                            <div class="col-12 mb-3">
                                <x-button class="btn-primary">Update</x-button>
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

@endsection

