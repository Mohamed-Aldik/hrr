              <form wire:submit.prevent="addContract" class="needs-validation" novalidate>

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
                                  @error('joining_date')<span class="text-danger">{{ $message }}</span>@enderror

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
                                              value="@if ($joining_date){{ Carbon\Carbon::parse($joining_date)->addYear()->subDays(1)->toDateString() }}@endif " wire:model.lazy="end_date">
                                          <label class="custom-control-label" for="customRadioInli">1 Year</label>
                                      </div>
                                  </div>
                                  <div class="col-md-2 mb-2">
                                      <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" id="customR" name="custom" class="custom-control-input"
                                              wire:click="hideDiv" value="@if ($joining_date){{ Carbon\Carbon::parse($joining_date)->addYear(2)->subDays(1)->toDateString() }}@endif "
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
                                  @error('end_date')<span class="text-danger">{{ $message }}</span>@enderror

                                  </div>
                              </div>


                              <br>


                              <div class="form-row">
                                  <div class="col-md-5 mb-3">
                                      <label for="customRange1" class="form-label">Probation period
                                          {{ $probation_period }} Days</label>
                                      <input type="range" max="90" class="form-range" id="customRange1"
                                          wire:model.lazy="probation_period">
                                  @error('probation_period')<span class="text-danger">{{ $message }}</span>@enderror

                                  </div>
                                  <div class="col-md-2 mb-3">

                                  </div>
                                  <div class="col-md-5 mb-3">
                                      <label for="customRange1" class="form-label">Annual Balance
                                          {{ $annual_balance }} Days</label>
                                      <input type="range" min="21" class="form-range" id="customRange1"
                                          wire:model.lazy="annual_balance">
                                  @error('annual_balance')<span class="text-danger">{{ $message }}</span>@enderror

                                  </div>
                              </div>


                              <hr>








                              <div class="form-row">


                                  <div class="col-md-2 mb-3">
                                      <label for="vaon3">Basic</label>
                                      <input type="number" class="form-control" id="vaon3" wire:model="basic"
                                          required>
                                  @error('basic')<span class="text-danger">{{ $message }}</span>@enderror

                                  </div>
                                  <div class="col-md-3 mb-3">
                                      <label for="vaon3">Housing</label>
                                      {{ $housing }}
                                      <div class="form-check">
                                          <input class="form-check-input" type="radio" name="exampleRadios"
                                              id="exampadios1" value="{{ 0.25 * $basic }}" wire:model="housing">
                                          <label class="form-check-label" for="exampadios1">
                                              25%
                                          </label>
                                      </div>
                                      <div class="form-check">
                                          <input class="form-check-input" type="radio" name="exampleRadios"
                                              id="mpleRadios2" value="{{ $hous }}" wire:model="housing">
                                          <label class="form-check-label">
                                              <input wire:model="hous" type="number">
                                          </label>
                                      </div>
                                  @error('housing')<span class="text-danger">{{ $message }}</span>@enderror

                                  </div>


                                  <div class="col-md-2 mb-3">
                                      <label for="dation3">Allowances</label>
                                      <br>
                                      <button type="button" class="btn btn-primary" data-toggle="modal"
                                          data-target="#exampleModal">
                                          Add
                                      </button>
                                      <br>
                                      <?php $tot = 0; ?>

                                      @foreach ($employee->allowances as $allowance)
                                       @if($allowance->pivot->allowance_id != 1)
                                          <div class="form-check">

                                              <label class="form-check-label">
                                                  {{ $allowance->name }} : {{ $allowance->pivot->value }}
                                              </label>
                                          </div>
                                         
                                          <?php $tot += $allowance->pivot->value; ?>
                                            @endif
                                      @endforeach

                                  </div>
                                  <div class="col-md-4 mb-3">

                                      <div class="form-row">
                                          <label class="form-check-label">
                                              Total Package: {{ $tota= $tot + $basic + $housing  }}
                                          </label>

                                      </div>

                                      <div class="form-row">
                                          GOSI Salary:  {{ $gosi_salar=$housing + $basic }}

                                      </div>


                                      <div class="form-row">
                                          Gosi Dedc: @if($employee->nationality->id == 1 ) {{ $gosi_ded= ( $gosi_salar * 0.1 ) >= 4500 ? 4500 : $gosi_salar * 0.1  }} @else {{ $gosi_ded = 0 }} @endif

                                      </div>


                                      <div class="form-row">
                                          Net Salary:  {{$net_salary = $tota - $gosi_ded}}

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
