
<div class="col-md-4">
                                    <form  wire:submit.prevent="add_job" method="POST">
                                     
                                                    <div class="mb-3">
                                                        <label for="company_id" class="form-label">Company</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('company_id')border border-danger rounded-2 @enderror">
                                                        <select wire:model.live="company_id" id="company_id" class="form-select">
                                                            <option selected>Choose...</option>
                                                            @foreach ($company as $companies)
                                                                  <option value="{{ $companies->company_id}}">{{ $companies->description ?? 'N/A'}}</option>
                                                              @endforeach
                                                        </select>
                                                        </div>
                                                    @error('company_id') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror


                                                    </div>
                                             
                                    
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('description')border border-danger rounded-2 @enderror">
                                            <textarea wire:model.live="description"  id="description" class="form-control" rows="1"  placeholder="Enter the description"></textarea>
                                        </div>

                                            @error('description') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                        <div>
                                          <button type="submit" class="btn btn-primary w-md">Add</button>
                                        </div>
                                        </div>

                                    </form>
                                </div>

