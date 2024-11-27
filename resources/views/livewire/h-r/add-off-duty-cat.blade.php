


<div wire:ignore.self class="modal fade addOffDutyC" tabindex="-1" role="dialog" aria-labelledby="addOffDutyClLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addOffDutyClLabel">Delete Employee?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>  
            <div class="modal-body">
            <form wire:submit.prevent="add_OffCat">
                                    
                                    <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('description')border border-danger rounded-2 @enderror">
                                            <input wire:model.live="description"  id="description" class="form-control"   placeholder="Enter the description">
                                        </div>

                                            @error('description') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                        
                                       

                                 
         
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary fw-bold" data-bs-dismiss="modal">Save</button>
                <button type="button" class="btn text-white fw-bold btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>

