
<div class="col-md-4">
                                    <form wire:submit.prevent="add_company" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Company</label>
                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('description')border border-danger rounded-2 @enderror">
                                        <textarea class="form-control" rows="1" id="formrow-companydescription" placeholder="Enter Company Description" wire:model.live="description"  id="description"></textarea>
                                       
                                      </div>

                                            @error('description') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                                        <label for="timezone" class="form-label">Timezone</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('timezone')border border-danger rounded-2 @enderror">
                                                        <select wire:model.live="timezone" id="timezone" class="form-select">
                                                        <option selected>Select Timezone</option>
                                                        @foreach ($timezones as $region => $zones)
                                                            <optgroup label="{{ $region }}">
                                                                @foreach ($zones as $zone)
                                                                    <option value="{{ $zone }}">{{ $zone }}</option>
                                                                @endforeach
                                                            </optgroup>
                                                        @endforeach
                                                        </select>
                                                        </div>
                                                    @error('timezone') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror


                                                    </div>
                                    <div class="mb-3">
                                    <div>

                                      <button type="submit" class="btn btn-primary w-md mt-3">Save</button>
                                    </div>
                                    </div>

                            </form>
</div>

