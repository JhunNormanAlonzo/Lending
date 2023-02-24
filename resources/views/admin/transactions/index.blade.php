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
        <div class="col-12">
            <x-session></x-session>
            <div class="card">
                <div class="card-header">
                    Loan Lists
                    <a class="btn btn-primary btn-sm float-end" href="{{route('transactions.create')}}"><i class="bi bi-plus"></i> Create</a>
                </div>
                <div class="card-body">
                    <div class="row mt-3 mb-3">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-6">
                                    <label for="" class="text-muted">From</label> :
                                    <input type="text" class="form-control-sm form-control" id="min" name="min">
                                </div>
                                <div class="col-6">
                                    <label for="" class="text-muted">To</label> :
                                    <input type="text" class="form-control-sm form-control" id="max" name="max">
                                </div>
                            </div>
                        </div>
                    </div>

                    <x-table >
                            <thead>
                            <x-th>Photo</x-th>
                            <x-th>CompleteName</x-th>
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
                            <x-th>Group</x-th>
                            <x-th>LoanOfficer</x-th>
                            <x-th>LoanAmount</x-th>
                            <x-th>LoanToReceive</x-th>
                            <x-th>Date</x-th>
                            <x-th>Edit</x-th>
                            <x-th>Delete</x-th>
                            </thead>
                            <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <x-td>
                                        <a href="" type="button" data-bs-toggle="modal" data-bs-target="#show{{$transaction->id}}">
                                            <img height="50" width="50" src="{{asset('storage/transactions/'.$transaction->photo)}}" alt="">
                                        </a>


                                        <div class="modal fade" id="show{{$transaction->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5>{{$transaction->members->firstname."'s photo"}}</h5>
                                                        <button class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <img width="100%" src="{{asset('storage/transactions/'.$transaction->photo)}}" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </x-td>
                                    <x-td>{{$transaction->members->firstname." ".$transaction->members->middlename." ".$transaction->members->lastname}}</x-td>
                                    <x-td>{{$transaction->members->address}}</x-td>
                                    <x-td>{{$transaction->members->contact_number}}</x-td>
                                    <x-td>{{$transaction->members->co_maker_name}}</x-td>
                                    <x-td>{{$transaction->members->co_maker_contact_number}}</x-td>
                                    <x-td>{{$transaction->members->co_maker_address}}</x-td>
                                    <x-td>{{$transaction->members->co_maker_rel_to_mem}}</x-td>
                                    <x-td>{{$transaction->members->guarantor_name}}</x-td>
                                    <x-td>{{$transaction->members->guarantor_contact_number}}</x-td>
                                    <x-td>{{$transaction->members->guarantor_address}}</x-td>
                                    <x-td>{{$transaction->members->guarantor_rel_to_mem}}</x-td>
                                    <x-td>{{$transaction->members->groups->group_name}}</x-td>
                                    <x-td>{{$transaction->loan_officers->firstname." ".$transaction->loan_officers->middlename." ".$transaction->loan_officers->lastname}}</x-td>
                                    <x-td>{{$transaction->loan_amount}}</x-td>
                                    <x-td>{{$transaction->loan_amt_to_rcv}}</x-td>
                                    <x-td>{{$transaction->created_at->format('Y-m-d')}}</x-td>
                                    <x-td>
                                        <a href="{{route('transactions.edit', [$transaction->id])}}">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </x-td>
                                    <x-td>
                                        <a href="" type="button" data-bs-toggle="modal" data-bs-target="#delete{{$transaction->id}}">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <form action="{{route('transactions.destroy', [$transaction->id])}}" method="POST">

                                            @csrf
                                            @method('DELETE')
                                            <div class="modal fade" id="delete{{$transaction->id}}">
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
        var minDate, maxDate;

        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date( data[16] );

                if (
                    ( min === null && max === null ) ||
                    ( min === null && date <= max ) ||
                    ( min <= date  && max === null ) ||
                    ( min <= date  && date <= max )
                ) {
                    return true;
                }
                return false;
            }
        );

        $(document).ready(function() {
            // Create date inputs
            minDate = new DateTime($('#min'), {
                format: 'MMMM Do YYYY'
            });
            maxDate = new DateTime($('#max'), {
                format: 'MMMM Do YYYY'
            });






            var table = $("#table").DataTable({
                dom: "Blfrtip",
                buttons: [
                    {
                        extend: 'pdf',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        title: 'Loan Transaction',
                        text: '<i class="bi bi-filetype-pdf"></i>',
                        className: 'btn btn-success mb-3',
                        download: 'download',
                        exportOptions: {
                            columns: [ 1, 2, 3, 4, 8, 12, 13, 14, 15, 16 ]
                        },

                        customize: function (doc) {
                            doc.pageMargins = [10,10,10,10];
                            doc.defaultStyle.fontSize = 7;
                            doc.styles.tableHeader.fontSize = 7;
                            doc.styles.title.fontSize = 9;
                            doc.content[0].text = doc.content[0].text.trim();
                            // Create a footer
                            doc['footer']=(function(page, pages) {
                                return {
                                    columns: [
                                        'Printed on {{\Carbon\Carbon::now()->tz('Asia/Manila')->isoFormat('LLLL')}}',
                                        {
                                            // This is the right column
                                            alignment: 'right',
                                            text: ['page ', { text: page.toString() },  ' of ', { text: pages.toString() }]
                                        }
                                    ],
                                    margin: [10, 0]
                                }
                            });
                            // Styling the table: create style object
                            var objLayout = {};
                            // Horizontal line thickness
                            objLayout['hLineWidth'] = function(i) { return .5; };
                            // Vertical line thickness
                            objLayout['vLineWidth'] = function(i) { return .5; };
                            // Horizontal line color
                            objLayout['hLineColor'] = function(i) { return '#aaa'; };
                            // Vertical line color
                            objLayout['vLineColor'] = function(i) { return '#aaa'; };
                            // Left padding of the cell
                            objLayout['paddingLeft'] = function(i) { return 4; };
                            // Right padding of the cell
                            objLayout['paddingRight'] = function(i) { return 4; };
                            // Inject the object in the document
                            doc.content[1].layout = objLayout;

                            doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                        }
                    }
                ],
                scrollX: true,
                fixedColumns: true
            });


            // Refilter the table
            $('#min, #max').on('change', function () {
                table.draw();
            });
        });
    </script>

@endsection




