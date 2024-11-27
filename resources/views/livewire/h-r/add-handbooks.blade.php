<div class="col-md-4">
                                    <form wire:submit.prevent="add_handbooks">
                                    
                                    <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('description')border border-danger rounded-2 @enderror">
                                            <textarea wire:model.live="description" rows="5"  id="description" class="form-control" placeholder="Enter the description"></textarea>
                                        </div>

                                            @error('description') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                    
                                        <div class="mb-3">
                                            <label for="link" class="form-label">Link</label>
                                            <div class=" @error('errors')border border-danger rounded-2 @enderror @error('link')border border-danger rounded-2 @enderror">
                                            <input wire:model.live="link"  id="link" class="form-control" placeholder="https://example.com"> 
                                        </div>

                                            @error('link') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="mb-3">
                                        <div>
                                          <button type="submit" class="btn btn-primary w-md">Save</button>
                                        </div>
                                        </div>

                                    </form>
                                </div>