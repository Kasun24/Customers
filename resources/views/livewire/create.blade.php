<form>
    <div class="form-group mb-3">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter Name" wire:model="name">
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group mb-3">
        <label for="nic">NIC:</label>
        <input type="text" class="form-control" id="nic" placeholder="Enter NIC" wire:model="nic">
        @error('nic') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group mb-3">
        <label for="tel">Telephone:</label>
        <input type="text" class="form-control" id="tel" placeholder="Enter Telephone" wire:model="tel">
        @error('tel') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group mb-3">
        <label for="gender">Gender:</label>
        <select class="form-control" id="gender" wire:model="gender">
            <option value="0">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group mb-3">
        <label for="like">I like to share my information:</label>
        <div>
            <label class="form-check-label">
                <input type="radio" wire:model="like" value="Yes" class="form-check-input"> Yes
            </label>
            <label class="form-check-label ml-3">
                <input type="radio" wire:model="like" value="No" class="form-check-input"> No
            </label>
        </div>
        @error('like') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group mb-3">
        <label for="remarks">Remarks:</label>
        <textarea class="form-control" id="remarks" placeholder="Enter Remarks" wire:model="remarks"></textarea>
        @error('remarks') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>
