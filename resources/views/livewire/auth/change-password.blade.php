<div>
 

<div wire:ignore.self class="modal fade changepass" id="changepassModal" tabindex="-1" role="dialog" aria-labelledby="Viewchangepass" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="Viewchangepass">Change Password</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form wire:submit.prevent="changepass">
                            <div class="mb-3">
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Current Password</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('password')border border-danger rounded-2 @enderror">
                                                        <input wire:model="password" type="Password" class="form-control" id="password" placeholder="Enter Current Password">
                                                    </div>

                                                          @error('password') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="mb-3">
                                                        <label for="newpassword" class="form-label">New password</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('newpassword')border border-danger rounded-2 @enderror">
                                                        <input wire:model="newpassword" type="password" class="form-control" id="newpassword" placeholder="Enter New password">
                                                    </div>

                                                          @error('newpassword') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="mb-3">
                                                        <label for="confirmpassword" class="form-label">Confirm Password</label>
                                                        <div class=" @error('errors')border border-danger rounded-2 @enderror @error('confirmpassword')border border-danger rounded-2 @enderror">
                                                        <input wire:model="confirmpassword" type="Password" class="form-control" id="confirmpassword" placeholder="Enter Confirm Password">
                                                    </div>

                                                          @error('confirmpassword') <span class="text-danger error fw-bold" style="font-size: 12px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>

                                                <div class="modal-footer mb-2">
                            <button type="submit" class="btn btn-primary ">Change Password</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                                 
                                

                            </form>


                                
                            </div>
                          
                        </div>
                    </div>
                </div>
</div>
