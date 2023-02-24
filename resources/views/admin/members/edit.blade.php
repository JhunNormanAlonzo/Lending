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
        <div class="col-lg-12">
            <x-session></x-session>
            <div class="card">
                <div class="card-header">
                    Update Member
                </div>
                <div class="card-body">
                    <x-form action="{{route('members.update', [$member->id])}}" method="PATCH">

                        <div class="row">

                            <div class="col-4 mb-3">
                                <x-label for="">Firstname</x-label>
                                <x-input type="text" value="{{$member->firstname}}" name="firstname" />
                            </div>


                            <div class="col-4 mb-3">
                                <x-label for="">Middlename</x-label>
                                <x-input value="{{$member->middlename}}" name="middlename" />
                            </div>

                            <div class="col-4 mb-3">
                                <x-label for="">Lastname</x-label>
                                <x-input value="{{$member->lastname}}"  name="lastname" />
                            </div>


                            <div class="col-8 mb-3">
                                <x-label for="">Address</x-label>
                                <x-textarea name="address" rows="3">{{$member->address}}</x-textarea>
                            </div>


                            <div class="col-4 mb-3">
                                <x-label for="">Age</x-label>
                                <x-input type="number" value="{{$member->age}}" name="age" />
                            </div>


                            <div class="col-4 mb-3">
                                <x-label for="">Birthday</x-label>
                                <x-input type="date" value="{{\Carbon\Carbon::parse($member->birthday)->format('Y-m-d')}}" name="birthday" />
                            </div>


                            <div class="col-4 mb-3">
                                <x-label for="">Gender</x-label>
                                <x-select name="gender">
                                    <option value="" selected disabled>Choose..</option>
                                    <option @if($member->gender == "male") selected @endif value="male">Male</option>
                                    <option @if($member->gender == "female") selected @endif value="female">Female</option>
                                </x-select>

                            </div>


                            <div class="col-4 mb-3">
                                <x-label for="">Civil Status</x-label>
                                <x-select name="civil_status">
                                    <option value="" selected disabled>Choose..</option>
                                    <option @if($member->civil_status == "single") selected @endif value="single">Single</option>
                                    <option @if($member->civil_status == "married") selected @endif value="married">Married</option>
                                    <option @if($member->civil_status == "widowed") selected @endif value="widowed">Widowed</option>
                                </x-select>

                            </div>


                            <div class="col-4 mb-3">
                                <x-label for="">Contact Number</x-label>
                                <x-input type="number" value="{{$member->contact_number}}" name="contact_number">


                            </div>

                            <div class="col-4 mb-3">
                                <x-label for="">Group Name</x-label>

                                <x-select name="group_id">
                                    <option value="">Choose...</option>
                                    @foreach($groups as $group)
                                        <option @if($member->groups->id == $group->id) selected @endif value="{{$group->id}}">{{$group->group_name}}</option>
                                    @endforeach
                                </x-select>

                            </div>

                            <div class="col-4 mb-3">
                                <x-label for="">Loan Officer</x-label>

                                <x-select  name="loan_officer_id">
                                    <option value="">Choose...</option>
                                    @foreach($loan_officers as $loan_officer)
                                        <option @if($member->loan_officers->id == $loan_officer->id) selected @endif value="{{$loan_officer->id}}">{{ucwords($loan_officer->firstname." ".$loan_officer->middlename." ".$loan_officer->lastname)}}</option>
                                    @endforeach
                                </x-select>

                            </div>

                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            Co Maker Details
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <x-label for="">Co Maker Name</x-label>
                                                <x-input  value="{{$member->co_maker_name}}" name="co_maker_name" />
                                            </div>


                                            <div class="col-12 mb-3">
                                                <x-label for="">Co Maker Address</x-label>
                                                <x-input type="text" value="{{$member->co_maker_address}}" name="co_maker_address" />
                                            </div>


                                            <div class="col-12 mb-3">
                                                <x-label for="">Co Maker Contact Number</x-label>
                                                <x-input type="number" value="{{$member->co_maker_contact_number}}" name="co_maker_contact_number" />
                                            </div>


                                            <div class="col-12 mb-3">
                                                <x-label for="">Relationship to co maker</x-label>

                                                <x-select name="co_maker_rel_to_mem">
                                                    <option value="">Choose...</option>
                                                    <option @if($member->co_maker_rel_to_mem == "husband") selected @endif value="husband">Husband</option>
                                                    <option @if($member->co_maker_rel_to_mem == "sister") selected @endif value="sister">Sister</option>
                                                    <option @if($member->co_maker_rel_to_mem == "brother") selected @endif value="brother">Brother</option>
                                                    <option @if($member->co_maker_rel_to_mem == "mother") selected @endif value="mother">Mother</option>
                                                    <option @if($member->co_maker_rel_to_mem == "father") selected @endif value="father">Father</option>
                                                    <option @if($member->co_maker_rel_to_mem == "son") selected @endif value="son">Son</option>
                                                    <option @if($member->co_maker_rel_to_mem == "daughter") selected @endif value="daughter">Daughter</option>
                                                    <option @if($member->co_maker_rel_to_mem == "nephew") selected @endif value="nephew">Nephew</option>
                                                    <option @if($member->co_maker_rel_to_mem == "niece") selected @endif value="niece">Niece</option>
                                                    <option @if($member->co_maker_rel_to_mem == "friend") selected @endif value="friend">Friend</option>
                                                    <option @if($member->co_maker_rel_to_mem == "neighbor") selected @endif value="neighbor">Neighbor</option>
                                                </x-select>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">

                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            Guarantor Details
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-12 mb-3">
                                                <x-label for="">Guarantor Name</x-label>
                                                <x-input value="{{$member->guarantor_name}}"  name="guarantor_name" />
                                            </div>


                                            <div class="col-12 mb-3">
                                                <x-label for="">Guarantor Address</x-label>
                                                <x-input value="{{$member->guarantor_address}}" name="guarantor_address" />
                                            </div>


                                            <div class="col-12 mb-3">
                                                <x-label for="">Guarantor Contact Number</x-label>
                                                <x-input type="number" value="{{$member->guarantor_contact_number}}" name="guarantor_contact_number" />
                                            </div>


                                            <div class="col-12 mb-3">
                                                <x-label for="">Relationship to guarantor</x-label>
                                                <x-select name="guarantor_rel_to_mem">
                                                    <option value="">Choose...</option>
                                                    <option @if($member->guarantor_rel_to_mem == "husband") selected @endif value="husband">Husband</option>
                                                    <option @if($member->guarantor_rel_to_mem == "sister") selected @endif value="sister">Sister</option>
                                                    <option @if($member->guarantor_rel_to_mem == "brother") selected @endif value="brother">Brother</option>
                                                    <option @if($member->guarantor_rel_to_mem == "mother") selected @endif value="mother">Mother</option>
                                                    <option @if($member->guarantor_rel_to_mem == "father") selected @endif value="father">Father</option>
                                                    <option @if($member->guarantor_rel_to_mem == "son") selected @endif value="son">Son</option>
                                                    <option @if($member->guarantor_rel_to_mem == "daughter") selected @endif value="daughter">Daughter</option>
                                                    <option @if($member->guarantor_rel_to_mem == "nephew") selected @endif value="nephew">Nephew</option>
                                                    <option @if($member->guarantor_rel_to_mem == "niece") selected @endif value="niece">Niece</option>
                                                    <option @if($member->guarantor_rel_to_mem == "friend") selected @endif value="friend">Friend</option>
                                                    <option @if($member->guarantor_rel_to_mem == "neighbor") selected @endif value="neighbor">Neighbor</option>
                                                </x-select>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12">
                                <x-button class="btn-primary">Submit</x-button>
                                <a class="float-end" href="{{route('members.index')}}">Back</a>
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

