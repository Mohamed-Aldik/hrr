              <form wire:submit.prevent="addEmployee" class="needs-validation" novalidate>

                  <div class="col-12">
                      <div class="card">
                          <div class="card-body">
                              @if (Session::has('message'))
                                  <div class="alert alert-success" role="alert">
                                      {{ Session::get('message') }}
                                  </div>
                              @endif
                              <h4> Job Title</h4>

                              <div class="form-row">
                                  @foreach ($jobs_title as $job_title)


                                      <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" name="job_titles" value="{{ $job_title->id }}"
                                              id="{{ $job_title->id }}2" wire:model.lazy="job_title"
                                              class="custom-control-input">
                                          <label class="custom-control-label"
                                              for="{{ $job_title->id }}2">{{ $job_title->name }}</label>
                                      </div>
                                  @endforeach
                                  @error('job_title')<span class="text-danger">{{ $message }}</span>@enderror

                              </div>
                              <hr>
                              <h4> Reporting To </h4>
                              <div class="form-row">
                                  @foreach ($employees as $employee)
                                      <div class="card-body">
                                          <img src="{{ asset('dashboard/assets/images/users/5.jpg') }}" class="rounded-circle"
                                              width="75" />
                                          <h4 class="card-title mt-2">{{ $employee->name }}</h4>
                                      </div>
                                  @endforeach

                              </div>
                              <hr>
                              <h4> Work Shift </h4>
                              <div class="form-row">
                                  <div class="custom-control custom-radio custom-control-inline">
                                      <input type="text" disabled value=" " id="section" class="custom-control-input">
                                      <label class="custom-control-label" for="section">test</label>
                                  </div>

                              </div>
                              <br>
                              <button class="btn btn-primary" type="submit">Cuntinue</button>
                          </div>
                      </div>
                  </div>
              </form>
