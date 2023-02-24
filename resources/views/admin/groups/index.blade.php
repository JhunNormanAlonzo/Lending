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
            <x-session></x-session>
            <div class="card">
                <div class="card-header">
                    Group Lists
                    <a class="btn btn-primary btn-sm float-end" href="{{route('groups.create')}}"><i class="bi bi-plus"></i> Create</a>
                </div>
                <div class="card-body">
                    <x-table>
                        <thead>
                            <x-th>LoanOfficer</x-th>
                            <x-th>GroupName</x-th>
                            <x-th>Meeting</x-th>
                            <x-th>Leader</x-th>
                            <x-th>Address</x-th>
                            <x-th>Contact</x-th>
                            <x-th>Edit</x-th>
                            <x-th>Delete</x-th>
                            <x-th>Transaction</x-th>
                        </thead>
                        <tbody>
                        @foreach($groups as $group)
                            <tr>
                                <x-td>{{$group->loan_officers->FullName}}</x-td>
                                <x-td>{{$group->group_name}}</x-td>
                                <x-td>{{$group->meeting}}</x-td>
                                <x-td>{{$group->leader}}</x-td>
                                <x-td>{{$group->address}}</x-td>
                                <x-td>{{$group->contact_number}}</x-td>
                                <x-td>
                                    <a href="{{route('groups.edit', [$group->id])}}">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </x-td>
                                <x-td>
                                    <a href="" type="button" data-bs-toggle="modal" data-bs-target="#delete{{$group->id}}">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <x-form action="{{route('groups.destroy', [$group->id])}}" method="DELETE">

                                        <div class="modal fade" id="delete{{$group->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        Confirm Delete
                                                        <i class="bi bi-question text-danger fa-1x"></i>
                                                    </div>
                                                    <div class="modal-body">
                                                        <span>Are you sure you want to delete this <b class="text-warning">{{$group->group_name}}</b></span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <x-button type="button" data-bs-dismiss="modal" class="btn-secondary">Cancel</x-button>
                                                        <x-button class="btn-danger">Delete</x-button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </x-form>
                                </x-td>
                                <x-td>
                                    <a href="{{route('groups.show', [$group->id])}}" >
                                        transaction
                                    </a>
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
                fixedColumns: true
            });
        });
    </script>
@endsection

