@extends('layouts.master')


@section('page_title')
    Savings Module
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
                    Member Lists
                    <a class="btn btn-primary btn-sm float-end" href="{{route('members.create')}}"><i class="bi bi-plus"></i> Create</a>
                </div>
                <div class="card-body">
                    <x-table >
                        <thead>
                        <x-th>GroupName</x-th>
                        <x-th>LastName</x-th>
                        <x-th>FirstName</x-th>
                        <x-th>MiddleName</x-th>
                        <x-th>Action</x-th>
                        </thead>
                        <tbody>
                            @foreach($members as $member)
                                <tr>
                                    <x-td>{{$member->groups->group_name}}</x-td>
                                    <x-td>{{$member->lastname}}</x-td>
                                    <x-td>{{$member->firstname}}</x-td>
                                    <x-td>{{$member->middlename}}</x-td>
                                    <x-td>
                                        <a href="{{route('savings.show', [$member->id])}}">
                                            <i class="bi bi-save"></i> Savings
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
                fixedColumns: true
            });
        });
    </script>
@endsection

