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
        <div class="col-12">
            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{ Session('message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Group Lists
                    <a class="btn btn-primary btn-sm float-end" href="{{route('loan_officers.create')}}"><i class="bi bi-plus"></i> Create</a>
                </div>
                <div class="card-body">
                    <x-table>
                        <thead>
                        <x-th>firstname</x-th>
                        <x-th>middlename</x-th>
                        <x-th>lastname</x-th>
                        <x-th>address</x-th>
                        <x-th>gender</x-th>
                        <x-th>contact_number</x-th>
                        <x-th>position</x-th>
                        <x-th>date_hired</x-th>
                        <x-th>Edit</x-th>
                        <x-th>Delete</x-th>
                        </thead>
                        <tbody>
                        @foreach($loan_officers as $loan_officer)
                        <tr>
                            <x-td>{{$loan_officer->firstname}}</x-td>
                            <x-td>{{$loan_officer->middlename}}</x-td>
                            <x-td>{{$loan_officer->lastname}}</x-td>
                            <x-td>{{$loan_officer->address}}</x-td>
                            <x-td>{{$loan_officer->gender}}</x-td>
                            <x-td>{{$loan_officer->contact_number}}</x-td>
                            <x-td>{{$loan_officer->positions->name}}</x-td>
                            <x-td>{{$loan_officer->date_hired}}</x-td>

                            <x-td>
                                <a href="{{route('loan_officers.edit', [$loan_officer->id])}}">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </x-td>
                            <x-td>
                                <a href="" type="button" data-bs-toggle="modal" data-bs-target="#delete{{$loan_officer->id}}">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <form action="{{route('loan_officers.destroy', [$loan_officer->id])}}" method="POST">

                                    @csrf
                                    @method('DELETE')
                                    <div class="modal fade" id="delete{{$loan_officer->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    Confirm Delete
                                                    <i class="bi bi-question text-danger fa-1x"></i>
                                                </div>
                                                <div class="modal-body">
                                                    <span>Are you sure you want to delete this <b class="text-warning">{{$loan_officer->name}}</b></span>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-secondary">Cancel</button>
                                                    <button  type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </x-td>
                        </tr>
                        @endforeach

                        </tbody>

                    </x-table>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function (){
            $("#table").DataTable({
                scrollX: true,
                fixedColumns : true,
            });
        });
    </script>
@endsection

