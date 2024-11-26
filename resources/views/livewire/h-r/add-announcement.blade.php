<div class="col-md-4">
                                                    <form wire:submit.prevent="add_announcement">
                                                       
                                                    <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('description')border border-danger rounded-2 @enderror">
                                            <input wire:model.live="description"  id="description" class="form-control" placeholder="Enter the description">
                                        </div>

                                            @error('description') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="date" class="form-label">Date</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('date')border border-danger rounded-2 @enderror">
                                          
                                            @php
   
    $timezone = config('app.timezone') ?? 'UTC';

    
    $minDate = \Carbon\Carbon::now($timezone)->toDateString(); 
@endphp

<input class="form-control" 
       type="date" 
       id="date" 
       name="date" 
       min="{{ $minDate }}" 
       wire:model.live="date">

<script>

    const timezone = @json($timezone); 

 
    function getServerTime() {
        const serverTime = new Date().toLocaleString("en-US", { timeZone: timezone });
        const serverDate = new Date(serverTime); 
        return serverDate.toISOString().split('T')[0]; 
    }

    document.getElementById('date').setAttribute('min', getServerTime());
</script>

                                        </div>

                                            @error('date') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                                        
                                                        <div class="mb-3">
                                                        <div>
                                                          <button type="submit" class="btn btn-primary w-md">Save</button>
                                                        </div>
                                                        </div>
    
                                                    </form>
                                                </div>