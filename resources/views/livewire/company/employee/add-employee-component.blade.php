              <form wire:submit.prevent="addEmployee" class="needs-validation" novalidate>
                  <div class="col-12">
                      <div class="card">
                          <div class="card-body">
                              @if (Session::has('message'))
                                  <div class="alert alert-success" role="alert">
                                      {{ Session::get('message') }}
                                  </div>
                              @endif
                              <div class="form-row">
                                  <div class="col-md-3 mb-3">
                                      <label for="job_number">Job Number</label>
                                      <input type="number" class="form-control" id="job_number"
                                          placeholder="Job Number" required wire:model.lazy="job_number">
                                      @error('job_number')<span
                                          class="text-danger">{{ $message }}</span>@enderror

                                  </div>
                                  <div class="col-md-4 mb-3">
                                      <label for="name">Employee's English Name</label>
                                      <input type="text" class="form-control" id="name" placeholder="Enter Full Name"
                                          required wire:model.lazy="name">
                                      @error('name')<span class="text-danger">{{ $message }}</span>@enderror

                                  </div>
                                  <div class="col-md-3 mb-3">
                                      <label for="id_number">ID</label>
                                      <input type="number" class="form-control" id="id_number" placeholder="Enter"
                                          required wire:model.lazy="id_number">
                                      @error('id_number')<span
                                          class="text-danger">{{ $message }}</span>@enderror


                                  </div>
                                  <div class="col-md-2 mb-3">
                                      <label for="birthday">Date of Birth</label>
                                      <input type="date" class="form-control" id="birthday" required
                                          wire:model.lazy="birthday">
                                      @error('birthday')<span class="text-danger">{{ $message }}</span>@enderror

                                  </div>
                              </div>
                              <div class="form-row">
                                  @foreach ($nationalities as $nationality)

                                      <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" value="{{ $nationality->id }}" name="nationality" id="{{ $nationality->id }}"
                                              wire:model.lazy="nationalite" class="custom-control-input">
                                          <label class="custom-control-label"
                                              for="{{ $nationality->id }}" > {{ $nationality->country }}</label>
                                      </div>
                                  @endforeach
                                  @error('nationalite')<span class="text-danger">{{ $message }}</span>@enderror

                              </div>
                              <br>
                              <div class="form-row">
                                  <div class="col-md-3 mb-3">
                                      <label for="validationTooltip02">Gender</label>
                                      <br>

                                      <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" id="Male" name="Gender" value="male" class="custom-control-input" wire:model.lazy="gender">
                                          <label class="custom-control-label" for="Male">Male</label>
                                      </div>
                                      <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" id="Female" name="Gender"  value="female" class="custom-control-input" wire:model.lazy="gender">
                                          <label class="custom-control-label" for="Female">Female</label>
                                      </div>
                                      @error('gender')<span class="text-danger">{{ $message }}</span>@enderror

                                  </div>
                                  <div class="col-md-4 mb-3">
                                      <label for="email">E-mail</label>
                                      <input type="email" class="form-control" id="email" placeholder="Enter E-mail"
                                          required wire:model.lazy="email">
                                      @error('email')<span class="text-danger">{{ $message }}</span>@enderror

                                  </div>
                                  <div class="col-md-3 mb-3">
                                      <label for="phone">Phone</label>
                                      <input type="text" class="form-control" id="phone" placeholder="Phone" wire:model.lazy="phone" required>
                                      @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                                  </div>

                              </div>


                              <button class="btn btn-primary" type="submit">Cuntinue</button>
                          </div>
                      </div>
                  </div>
              </form>
