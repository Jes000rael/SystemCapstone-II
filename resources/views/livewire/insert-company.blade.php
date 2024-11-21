
<div class="col-md-4">
                                    <form wire:submit.prevent="add_company" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('description')border border-danger rounded-2 @enderror">
                                        <textarea class="form-control" rows="1" id="formrow-companydescription" placeholder="Enter Company Description" wire:model.live="description"  id="description"></textarea>
                                       
                                      </div>

                                            @error('description') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                                        <label for="company_id" class="form-label">Company</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('company_id')border border-danger rounded-2 @enderror">
                                                        <select wire:model.live="company_id" id="company_id" class="form-select">
                                                        <option selected>Select Timezone</option>
                    <option value="UTC-12">UTC-12</option>
                    <option value="UTC-11">UTC-11</option>
                    <option value="UTC-10">UTC-10</option>
                    <option value="UTC-9">UTC-9</option>
                    <option value="UTC-8">UTC-8</option>
                    <option value="UTC-7">UTC-7</option>
                    <option value="UTC-6">UTC-6</option>
                    <option value="UTC-5">UTC-5</option>
                    <option value="UTC-4">UTC-4</option>
                    <option value="UTC-3">UTC-3</option>
                    <option value="UTC-2">UTC-2</option>
                    <option value="UTC-1">UTC-1</option>
                    <option value="UTC+0">UTC+0</option>
                    <option value="UTC+1">UTC+1</option>
                    <option value="UTC+2">UTC+2</option>
                    <option value="UTC+3">UTC+3</option>
                    <option value="UTC+4">UTC+4</option>
                    <option value="UTC+5">UTC+5</option>
                    <option value="UTC+6">UTC+6</option>
                    <option value="UTC+7">UTC+7</option>
                    <option value="UTC+8">UTC+8</option>
                    <option value="UTC+9">UTC+9</option>
                    <option value="UTC+10">UTC+10</option>
                    <option value="UTC+11">UTC+11</option>
                    <option value="UTC+12">UTC+12</option>
                                                        </select>
                                                        </div>
                                                    @error('') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror


                                                    </div>
                                    <div class="mb-3">
                                    <div>

                                      <button type="submit" class="btn btn-primary w-md mt-3">Save</button>
                                    </div>
                                    </div>

                            </form>
</div>

