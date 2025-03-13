<div class="col-md-4">
@if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
                                    <form wire:submit.prevent="add_Cutoff">
                                    
                                    <div class="mb-3">
                                                        <label for="date_start" class="form-label">Date Start</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('date_start')border border-danger rounded-2 @enderror">
                                            <input type="date" wire:model="date_start"  id="date_start" class="form-control" >
                                        </div>

                                            @error('date_start') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="mb-3">
                                                        <label for="date_end" class="form-label">Date End</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('date_end')border border-danger rounded-2 @enderror">
                                            <input type="date" wire:model="date_end"  id="date_end" class="form-control" >
                                        </div>

                                            @error('date_end') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="mb-3">
                                                        <label for="conversion_rate" class="form-label">Corversion Rate</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('conversion_rate')border border-danger rounded-2 @enderror">
                                            <input type="number" step="any" wire:model.live="conversion_rate"  id="conversion_rate" class="form-control"  placeholder="Enter the conversion rate">
                                        </div>

                                            @error('conversion_rate') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                        <script>
document.addEventListener("DOMContentLoaded", function() {
    let dateStart = document.getElementById("date_start");
    let dateEnd = document.getElementById("date_end");

    dateStart.addEventListener("change", function() {
        let startDate = new Date(dateStart.value);
        
        if (!isNaN(startDate.getTime())) { 
            let nextDay = new Date(startDate);
            nextDay.setDate(startDate.getDate() + 1);

            let formattedMinDate = nextDay.toISOString().split("T")[0];
            dateEnd.min = formattedMinDate;

       
            if (dateEnd.value && dateEnd.value <= dateStart.value) {
                dateEnd.value = "";
            }
        }
    });
});
</script>
                                        
                                        <div class="mb-3">
                                        <div>
                                          <button type="submit" class="btn btn-primary w-md">Save</button>
                                        </div>
                                        </div>

                                    </form>
                                </div>