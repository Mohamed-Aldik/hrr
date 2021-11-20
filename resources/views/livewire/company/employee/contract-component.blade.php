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
                                  <div class="col-md-2 mb-2">
                                      <label for="validation3">Joining Date</label>
                                      <input type="date" class="form-control" value="{{ now() }}"
                                          id="validation3" wire:model.lazy="joining_date" required>

                                  </div>

                                  <div class="col-md-2 mb-2">
                                      <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" id="cust" name="custom" class="custom-control-input"
                                              wire:click="hideDiv" value="Unlimited" wire:model.lazy="end_date">
                                          <label class="custom-control-label" for="cust"> Unlimited</label>
                                      </div>
                                  </div>
                                  <div class="col-md-2 mb-2">
                                      <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" id="customRadioInli" name="custom"
                                              class="custom-control-input" wire:click="hideDiv"
                                              value="@if ($joining_date){{ Carbon\Carbon::parse($joining_date)->addYear()->toDateString() }}@endif " wire:model.lazy="end_date">
                                          <label class="custom-control-label" for="customRadioInli">1 Year</label>
                                      </div>
                                  </div>
                                  <div class="col-md-2 mb-2">
                                      <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" id="customR" name="custom" class="custom-control-input"
                                              wire:click="hideDiv" value="@if ($joining_date){{ Carbon\Carbon::parse($joining_date)->addYear(2)->toDateString() }}@endif "
                                              wire:model.lazy="end_date">
                                          <label class="custom-control-label" for="customR">2 Year</label>
                                      </div>
                                  </div>
                                  <div class="col-md-2 mb-2">
                                      <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" id="customRa" name="custom" value="0"
                                              class="custom-control-input" wire:click="openDiv">
                                          <label class="custom-control-label" for="customRa">Custome</label>
                                      </div>
                                  </div>

                                  <div class="col-md-2 mb-2">
                                      <label for="validationTooltip05">End Date</label>
                                      <input type="text" value="{{ $end_date }}" disabled class="form-control"
                                          id="validationTooltip05">
                                      @if ($showDiv)
                                          <input type="date" wire:model.lazy="end_date" class="form-control"
                                              id="validationTooltip05">
                                      @endif
                                  </div>
                              </div>


                              <br>


                              <div class="form-row">
                                  <div class="col-md-5 mb-3">
                                      <label for="customRange1" class="form-label">Probation period
                                          {{ $probation_period }} Days</label>
                                      <input type="range" class="form-range" id="customRange1"
                                          wire:model.lazy="probation_period">
                                  </div>
                                  <div class="col-md-2 mb-3">

                                  </div>
                                  <div class="col-md-5 mb-3">
                                      <label for="customRange1" class="form-label">Annual Balance
                                          {{ $annual_balance }} Days</label>
                                      <input type="range" class="form-range" id="customRange1"
                                          wire:model.lazy="annual_balance">
                                  </div>
                              </div>


                              <hr>








                              <div class="form-row">


                                  <div class="col-md-2 mb-3">
                                      <label for="vaon3">Basic</label>
                                      <input type="number" class="form-control" id="vaon3" wire:model.lazy="basic"
                                          required>

                                  </div>
                                  <div class="col-md-3 mb-3">
                                      <label for="vaon3">Allowances</label>

                                      @foreach ($allowances as $allowance)
                                          <div class="form-check">
                                              <input class="form-check-input" type="checkbox" value=""
                                                  id="{{ $allowance->id }}q">
                                              <label class="form-check-label" for="{{ $allowance->id }}q">
                                                  {{ $allowance->name }}
                                              </label>
                                          </div>

                                      @endforeach

                                  </div>


                                  <div class="col-md-2 mb-3">
                                      <label for="dation3">Add Allowances</label>
                                      <button type="button" class="btn btn-primary" data-toggle="modal"
                                          data-target="#exampleModal">
                                          Add
                                      </button>

                                  </div>
                                  <div class="col-md-4 mb-3">

                                      <div class="form-row">
                                          1

                                      </div>

                                      <div class="form-row">
                                          2

                                      </div>


                                      <div class="form-row">
                                          3

                                      </div>


                                      <div class="form-row">
                                          4

                                      </div>



                                  </div>


                              </div>





                              <!-- Modal -->
                              <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                                              <button type="button" class="close" data-dismiss="modal"
                                                  aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">




                                              <label for="valition3">Name</label>
                                              <input wire:model.lazy="name_allow" type="text" class="form-control"
                                                  id="valition3" required>




                                              <label for="vn3">Value</label>
                                              <input wire:model.lazy="val_allow" type="number" class="form-control"
                                                  id="vn3" required>





                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary"
                                                  data-dismiss="modal">Close</button>
                                              <button type="button" class="btn btn-primary" wire:click="add">Add
                                                  </button>
                                          </div>
                                      </div>
                                  </div>
                              </div>



                              <br>

                              <button class="btn btn-primary" type="submit">Cuntinue</button>
                          </div>
                      </div>
                  </div>
              </form>
