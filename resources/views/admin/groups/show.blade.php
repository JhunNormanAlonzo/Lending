@extends('layouts.master')


@section('page_title')
    Group Module
@endsection

@section('header')
    @livewireStyles
    <x-navbar></x-navbar>
    <x-sidebar></x-sidebar>
@endsection


@section('main')
    <div class="row">
        <div class="col-12">
            <x-session></x-session>

            <div class="card">
                <div class="card-header">
                    Transactions
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 my-2">
                            <h5>
                                Group Name : {{$group->group_name}}
                            </h5>
                            <h5>
                                Loan Officer : {{$group->loan_officers->FullName}}
                            </h5>
                        </div>
                    </div>
                    <div class="table-responsive mt-3">
                        <x-form action="{{route('groups.payment')}}" method="POST" >

                            <x-table >
                                <thead>
                                <x-th>#</x-th>
                                <x-th>CompleteName</x-th>
                                <x-th>Weekly</x-th>
                                <x-th>Savings</x-th>
                                <x-th>Balance</x-th>
                                <x-th>Address</x-th>
                                <x-th>ContactNumber</x-th>
                                <x-th>CoMakerName</x-th>
                                <x-th>CoMakerNumber</x-th>
                                <x-th>CoMakerAddress</x-th>
                                <x-th>CoMakerRelation</x-th>
                                <x-th>GuarantorName</x-th>
                                <x-th>GuarantorNumber</x-th>
                                <x-th>GuarantorAddress</x-th>
                                <x-th>GuarantorRelation</x-th>
                                </thead>
                                <tbody>
                                @foreach($members as $member)
                                    <tr>

                                        <x-td>
                                            <input type="checkbox" name="check[]" data-weekly="{{$member->weekly_amortzn}}" data-savings="{{100}}" value="{{$member->member_id}}">
                                        </x-td>
                                        <x-td>{{$member->FullName}}</x-td>
                                        <x-td>{{$member->weekly_amortzn}}</x-td>
                                        <x-td>{{ 100 }}</x-td>
                                        <x-td>
                                            {{App\Models\PaidBill::where('member_id', $member->member_id)->where('tag', 'weekly')->where('transaction_id', $member->transaction_id)->get()->sum('amount') + $member->loan_amt_to_rcv}}
                                        </x-td>
                                        <x-td>{{$member->address}}</x-td>
                                        <x-td>{{$member->contact_number}}</x-td>
                                        <x-td>{{$member->co_maker_name}}</x-td>
                                        <x-td>{{$member->co_maker_contact_number}}</x-td>
                                        <x-td>{{$member->co_maker_address}}</x-td>
                                        <x-td>{{$member->co_maker_rel_to_mem}}</x-td>
                                        <x-td>{{$member->guarantor_name}}</x-td>
                                        <x-td>{{$member->guarantor_contact_number}}</x-td>
                                        <x-td>{{$member->guarantor_address}}</x-td>
                                        <x-td>{{$member->guarantor_rel_to_mem}}</x-td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </x-table>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <h5>Weekly <span id="weekly" class="text-danger"></span></h5>
                                </div>
                                <div class="col-6">
                                    <h5>Savings <span id="saving" class="text-danger"></span></h5>
                                </div>
                            </div>

                            <x-button type="submit" class="btn-primary mt-3">Save</x-button>
                        </x-form>

                    </div>

                </div>
            </div>
        </div>
    </div>
    @livewireScripts
@endsection


@section('script')
    <script>
        $("#weekly").html(0);
        $("#saving").html(0);
        $("input[name='check[]']").change(function ()
        {

            var weekly = 0;
            var saving = 0;


            var weekly = 0;
            $('input:checkbox:checked').each(function(){ // iterate through each checked element.
                weekly += isNaN(parseInt($(this).data('weekly'))) ? 0 : parseInt($(this).data('weekly'));
            });

            var saving = 0;
            $('input:checkbox:checked').each(function(){ // iterate through each checked element.
                saving += isNaN(parseInt($(this).data('savings'))) ? 0 : parseInt($(this).data('savings'));
            });


            $("#weekly").html(weekly);
            $("#saving").html(saving);
        });

        $(document).ready(function (){
            $("#table").DataTable({
                scrollX: true,
                fixedColumns: true
            });
        });
    </script>
@endsection

