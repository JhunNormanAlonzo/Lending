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
                    Create Member
                </div>
                <div class="card-body">
                    <x-form action="{{route('members.store')}}" method="POST">
                        <div class="row">
                            <div class="col-4 mb-3">
                                <x-label for="">Firstname</x-label>
                                <x-input type="text" name="firstname" />

                            </div>


                            <div class="col-4 mb-3">
                                <x-label for="">Middlename</x-label>
                                <x-input name="middlename" />

                            </div>


                            <div class="col-4 mb-3">
                                <x-label for="">Lastname</x-label>
                                <x-input  name="lastname" />

                            </div>


                            <div class="col-8 mb-3">
                                <x-label for="">Address</x-label>
                                <x-textarea name="address" rows="5"></x-textarea>
                            </div>


                            <div class="col-4">
                                <div class="row">
                                    <div class="col-12  mb-3">
                                        <x-label for="">Birthday</x-label>
                                        <x-input type="date" name="birthday" />
                                    </div>


                                    <div class="col-12 mb-3">
                                        <x-label for="">Gender</x-label>
                                        <x-select name="gender">
                                            <option value="" selected disabled>Choose..</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </x-select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-4 mb-3">
                                <x-label for="">Civil Status</x-label>
                                <x-select name="civil_status">
                                    <option value="" selected disabled>Choose..</option>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="widowed">Widowed</option>
                                </x-select>
                            </div>


                            <div class="col-4 mb-3">
                                <x-label for="">Contact Number</x-label>
                                <x-input name="contact_number" />

                            </div>

                            <div class="col-4 mb-3">
                                <x-label for="">Group Name</x-label>

                                <x-select name="group_id">
                                    <option value="">Choose...</option>
                                    @foreach($groups as $group)
                                        <option value="{{$group->id}}">{{$group->group_name}}</option>
                                    @endforeach
                                </x-select>
                            </div>


                            <div class="col-12">
                                <div class="row">
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
                                                        <x-input name="co_maker_name" />
                                                    </div>

                                                    <div class="col-12 mb-3">
                                                        <x-label for="">Co Maker Address</x-label>
                                                        <x-input  name="co_maker_address" />
                                                    </div>

                                                    <div class="col-12 mb-3">
                                                        <x-label for="">Co Maker Contact Number</x-label>
                                                        <x-input  name="co_maker_contact_number" />
                                                    </div>

                                                    <div class="col-12 mb-3">
                                                        <x-label for="">Relationship to co maker</x-label>

                                                        <x-select name="co_maker_rel_to_mem">
                                                            <option value="">Choose...</option>
                                                            <option value="husband">Husband</option>
                                                            <option value="sister">Sister</option>
                                                            <option value="brother">Brother</option>
                                                            <option value="mother">Mother</option>
                                                            <option value="father">Father</option>
                                                            <option value="son">Son</option>
                                                            <option value="daughter">Daughter</option>
                                                            <option value="nephew">Nephew</option>
                                                            <option value="niece">Niece</option>
                                                            <option value="friend">Friend</option>
                                                            <option value="neighbor">Neighbor</option>
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
                                                        <x-input name="guarantor_name" />
                                                    </div>


                                                    <div class="col-12 mb-3">
                                                        <x-label for="">Guarantor Address</x-label>
                                                        <x-input name="guarantor_address" />
                                                    </div>


                                                    <div class="col-12 mb-3">
                                                        <x-label for="">Guarantor Contact Number</x-label>
                                                        <x-input  name="guarantor_contact_number" />
                                                    </div>


                                                    <div class="col-12 mb-3">
                                                        <x-label for="">Relationship to guarantor</x-label>
                                                        <x-select  name="guarantor_rel_to_mem">
                                                            <option value="">Choose...</option>
                                                            <option value="husband">Husband</option>
                                                            <option value="sister">Sister</option>
                                                            <option value="brother">Brother</option>
                                                            <option value="mother">Mother</option>
                                                            <option value="father">Father</option>
                                                            <option value="son">Son</option>
                                                            <option value="daughter">Daughter</option>
                                                            <option value="nephew">Nephew</option>
                                                            <option value="niece">Niece</option>
                                                            <option value="friend">Friend</option>
                                                            <option value="neighbor">Neighbor</option>
                                                        </x-select>
                                                    </div>

                                                </div>
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

