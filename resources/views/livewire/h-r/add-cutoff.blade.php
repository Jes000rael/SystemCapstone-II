<div class="col-md-4">
                                    <form wire:submit.prevent="add_shift">
                                    
                                    <div class="mb-3">
                                                        <label for="date_start" class="form-label">Date Start</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('date_start')border border-danger rounded-2 @enderror">
                                            <input type="date" wire:model.live="date_start"  id="date_start" class="form-control"  placeholder="Enter the date_start">
                                        </div>

                                            @error('date_start') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="mb-3">
                                                        <label for="date_end" class="form-label">Date End</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('date_end')border border-danger rounded-2 @enderror">
                                            <input type="date" wire:model.live="date_end"  id="date_end" class="form-control" placeholder="Enter the date_end">
                                        </div>

                                            @error('date_end') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="mb-3">
                                                        <label for="conversion_rate" class="form-label">Corversion Rate</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('conversion_rate')border border-danger rounded-2 @enderror">
                                            <input type="number" step="any" wire:model.live="conversion_rate"  id="conversion_rate" class="form-control"  placeholder="Enter the conversion_rate">
                                        </div>

                                            @error('conversion_rate') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                        <div>
                                          <button type="submit" class="btn btn-primary w-md">Save</button>
                                        </div>
                                        </div>

                                    </form>
                                </div>