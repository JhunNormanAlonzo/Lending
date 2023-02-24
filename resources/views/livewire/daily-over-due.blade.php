<div>
    <div class="table-responsive my-3">

        <div class="row">
            <div class="col-3">
                <x-input name="" type="date" wire:model="date_created" />
            </div>
            <div class="col-3">
                <select wire:model="day" class="form-control form-select">
                    <option @if(strtolower(\Carbon\Carbon::now()->format('l')) == 'monday')) selected @endif value="monday"> {{ucfirst('monday')}}</option>
                    <option @if(strtolower(\Carbon\Carbon::now()->format('l')) == 'tuesday')) selected @endif value="tuesday"> {{ucfirst('tuesday')}}</option>
                    <option @if(strtolower(\Carbon\Carbon::now()->format('l')) == 'wednesday')) selected @endif value="wednesday"> {{ucfirst('wednesday')}}</option>
                    <option @if(strtolower(\Carbon\Carbon::now()->format('l')) == 'thursday')) selected @endif value="thursday"> {{ucfirst('thursday')}}</option>
                    <option @if(strtolower(\Carbon\Carbon::now()->format('l')) == 'friday')) selected @endif value="friday"> {{ucfirst('friday')}}</option>
                </select>
            </div>
            <div class="col-3">
                <x-input name="" wire:model="search" placeholder="Search Firstname" />
            </div>

        </div>






        <x-table id="none">
            <thead>
            <x-th>LoanOfficer</x-th>
            <x-th>GroupName</x-th>
            <x-th>Meeting</x-th>
            <x-th>Leader</x-th>
            <x-th>Member</x-th>
            <x-th>Address</x-th>
            <x-th>Contact</x-th>
            </thead>
            <tbody>
                @foreach($members as $member)
                <tr>
                    <x-td>{{$member->groups->loan_officers->FullName}}</x-td>
                    <x-td>{{$member->groups->group_name}}</x-td>
                    <x-td>{{$member->groups->meeting}}</x-td>
                    <x-td>{{$member->groups->leader}}</x-td>
                    <x-td>{{$member->FullName}}</x-td>
                    <x-td>{{$member->address}}</x-td>
                    <x-td>{{$member->created_at}}</x-td>
                </tr>
                @endforeach
            </tbody>
        </x-table>

    </div>
</div>
