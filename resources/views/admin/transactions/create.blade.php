@extends('layouts.master')


@section('page_title')
    Loan Module
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
                    Create Loan
                </div>
                <div class="card-body">
                    <x-form action="{{route('transactions.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-lg-4 col-12 mb-3">
                                <x-label for="">Loan Amount</x-label>
                                <x-input type="number" name="loan_amount" />
                            </div>

                            <div class="col-lg-4 col-12 mb-3">
                                <x-label for="">Member</x-label>
                                <x-select name="member_id">
                                    <option value="" selected disabled>Choose..</option>
                                    @foreach($members as $member)
                                        <option value="{{$member->id}}">{{$member->FullName}}</option>
                                    @endforeach
                                </x-select>
                            </div>

                            <div class="col-lg-4 col-12 mb-3">
                                <x-label for="">Loan Type</x-label>
                                <x-select name="loan_type_id">
                                    <option value="" selected disabled>Choose..</option>
                                    @foreach($loan_types as $loan_type)
                                        <option value="{{$loan_type->id}}">{{$loan_type->loan_name}}</option>
                                    @endforeach
                                </x-select>
                            </div>

                            <div class="col-lg-4 col-12 mb-3">
                                <x-label for="">Photo</x-label>
                                <x-input type="file" onchange="showPreview(event)"  name="photo" accept="image/*" capture="camera" />
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <img class="w-100" id="file-ip-1-preview">
                                </div>
                            </div>


                            <div class="col-12">
                                <x-button class="btn-primary">Submit</x-button>
                                <a class="float-end" href="{{route('transactions.index')}}">Back</a>
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



        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);


                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";

            }
        }
    </script>

@endsection

