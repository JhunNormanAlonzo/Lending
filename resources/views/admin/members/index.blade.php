@extends('layouts.master')


@section('page_title')
    Members Module
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
                        <x-th>FirstName</x-th>
                        <x-th>MiddleName</x-th>
                        <x-th>LastName</x-th>
                        <x-th>Address</x-th>
                        <x-th>Age</x-th>
                        <x-th>Birthday</x-th>
                        <x-th>Gender</x-th>
                        <x-th>CivilStatus</x-th>
                        <x-th>ContactNumber</x-th>
                        <x-th>CoMakerName</x-th>
                        <x-th>CoMakerNumber</x-th>
                        <x-th>CoMakerAddress</x-th>
                        <x-th>CoMakerRelation</x-th>
                        <x-th>GuarantorName</x-th>
                        <x-th>GuarantorNumber</x-th>
                        <x-th>GuarantorAddress</x-th>
                        <x-th>GuarantorRelation</x-th>
                        <x-th>Group</x-th>
                        <x-th>LoanOfficer</x-th>
                        <x-th>Edit</x-th>
                        <x-th>Delete</x-th>
                        </thead>
                        <tbody>
                        @foreach($members as $member)
                            <tr>
                                <x-td>{{$member->firstname}}</x-td>
                                <x-td>{{$member->middlename}}</x-td>
                                <x-td>{{$member->lastname}}</x-td>
                                <x-td>{{$member->address}}</x-td>
                                <x-td>{{$member->age}}</x-td>
                                <x-td>{{$member->birthday}}</x-td>
                                <x-td>{{$member->gender}}</x-td>
                                <x-td>{{$member->civil_status}}</x-td>
                                <x-td>{{$member->contact_number}}</x-td>
                                <x-td>{{$member->co_maker_name}}</x-td>
                                <x-td>{{$member->co_maker_contact_number}}</x-td>
                                <x-td>{{$member->co_maker_address}}</x-td>
                                <x-td>{{$member->co_maker_rel_to_mem}}</x-td>
                                <x-td>{{$member->guarantor_name}}</x-td>
                                <x-td>{{$member->guarantor_contact_number}}</x-td>
                                <x-td>{{$member->guarantor_address}}</x-td>
                                <x-td>{{$member->guarantor_rel_to_mem}}</x-td>
                                <x-td>{{$member->groups->group_name}}</x-td>
                                <x-td>
                                    {{
                                        $member->groups->loan_officers->FullName
                                    }}
                                </x-td>

                                <x-td>
                                    <a href="{{route('members.edit', [$member->id])}}">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </x-td>
                                <x-td>
                                    <a href="" type="button" data-bs-toggle="modal" data-bs-target="#delete{{$member->id}}">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <form action="{{route('members.destroy', [$member->id])}}" method="POST">

                                        @csrf
                                        @method('DELETE')
                                        <div class="modal fade" id="delete{{$member->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        Confirm Delete
                                                        <i class="bi bi-question text-danger fa-1x"></i>
                                                    </div>
                                                    <div class="modal-body">
                                                        <span>Are you sure you want to delete this ?</span>
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
                fixedColumns: true
            });
        });
    </script>
@endsection

