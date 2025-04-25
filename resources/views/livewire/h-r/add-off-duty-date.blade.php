<div class="col-md-4">
                                    <form wire:submit.prevent="add_OffDate">
                                        <div class="mb-3">
                                            <label for="category_id" class="form-label">Category</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('category_id')border border-danger rounded-2 @enderror">
                                                        <select wire:model.live="category_id" id="category_id" class="form-select">
                                                            <option selected>Choose...</option>
                                                            @foreach ($OffdutyC as $offCat)
                                                                  <option value="{{ $offCat->category_id}}">{{ $offCat->description ?? 'N/A'}}</option>
                                                              @endforeach
                                                        </select>
                                                        </div>
                                                    @error('category_id') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="date" class="form-label">Date</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('date')border border-danger rounded-2 @enderror">
                                            <input wire:model.live="date"  id="date" class="form-control" type="date">
                                        </div>

                                            @error('date') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('description')border border-danger rounded-2 @enderror">
                                            <input wire:model.live="description"  id="description" class="form-control" placeholder="Enter the description">
                                        </div>

                                            @error('description') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="mb-3">
    <label for="percentage" class="form-label">Percentage</label>
    <div class="@error('errors') border border-danger rounded-2 @enderror @error('percentage') border border-danger rounded-2 @enderror">
        <input
            type="number"
            min="0"
            wire:model.live="percentage"
            id="percentage"
            class="form-control"
            placeholder="Enter the percentage"
        >
    </div>
    @error('percentage')
        <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span>
    @enderror
</div>
                                    
                                        
                                        <div class="mb-3">
                                        <div>
                                          <button type="submit" class="btn btn-primary w-md">Save</button>
                                        </div>
                                        </div>

                                    </form>
                                </div>