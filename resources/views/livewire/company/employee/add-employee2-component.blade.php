              <form wire:submit.prevent="addEmployee" class="needs-validation" novalidate>
                  <div class="col-12">
                      <div class="card">
                          <div class="card-body">
                              @if (Session::has('message'))
                                  <div class="alert alert-success" role="alert">
                                      {{ Session::get('message') }}
                                  </div>
                              @endif
                              <h4> Managements </h4>

                              <div class="form-row">
                                  @foreach ($managements as $management)


                                      <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" name="management" value="{{ $management->id }}"
                                              id="{{ $management->id }}" wire:model.lazy="managementt"
                                              class="custom-control-input">
                                          <label class="custom-control-label"
                                              for="{{ $management->id }}">{{ $management->name }}</label>
                                      </div>
                                  @endforeach
                                  @error('managementt')<span class="text-danger">{{ $message }}</span>@enderror

                              </div>
                              <hr>
                              <h4> Section </h4>
                              <div class="form-row">
                                  @foreach ($departments as $department)


                                      <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" name="department" value="{{ $department->id }}"
                                              id="{{ $department->id }}1" wire:model.lazy="section"
                                              class="custom-control-input">
                                          <label class="custom-control-label"
                                              for="{{ $department->id }}1">{{ $department->name }}</label>
                                      </div>
                                  @endforeach
                                  @error('section')<span class="text-danger">{{ $message }}</span>@enderror

                              </div>
                              <br>
                              <button class="btn btn-primary" type="submit">Cuntinue</button>
                          </div>
                      </div>
                  </div>
              </form>
