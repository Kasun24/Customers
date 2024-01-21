<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if($updateMode)
        @include('livewire.update')
    @else
        @include('livewire.create')
    @endif

    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>NIC</th>
                <th>Telephone</th>
                <th>Gender</th>
                <th>Like</th>
                <th>Remarks</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->nic }}</td>
                    <td>{{ $customer->tel }}</td>
                    <td>{{ $customer->gender }}</td>
                    <td>{{ $customer->like }}</td>
                    <td>{{ $customer->remarks }}</td>
                    <td>
                        <button wire:click="edit({{ $customer->id }})" class="btn btn-primary btn-sm">Edit</button>
                        <button wire:click="delete({{ $customer->id }})" class="btn btn-danger btn-sm">Delete</button>  
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
