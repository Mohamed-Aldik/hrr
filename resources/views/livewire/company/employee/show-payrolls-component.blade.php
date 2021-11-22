              <form wire:submit.prevent="addEmployee" class="needs-validation" novalidate>
                  <div class="table-responsive">
                      @if (Session::has('message'))
                          <div class="alert alert-success" role="alert">
                              {{ Session::get('message') }}
                          </div>
                      @endif
                      <table class="table">
                          <thead class="thead-dark">
                              <tr>
                                  <th scope="col">J.N</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Basic</th>
                                  
                                  @foreach ($employeeAllowances as $employeeAllowance )
                                  @foreach ($allowances as $allowance )
                                    @if($allowance->id == $employeeAllowance->allowance_id)
                                  <th scope="col">{{ $allowance->name }}</th>
                                      @endif
                                  @endforeach
                                  @endforeach
                                
                                  <th scope="col">OverTime</th>
                                  <th scope="col">GOSI</th>
                                  <th scope="col">Absence</th>
                                  <th scope="col">Violations</th>
                                  <th scope="col">Advanced</th>
                                  <th scope="col">Net Salary</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($employees as $employee)
                                  <tr>
                                      <td>{{ $employee->job_number }}</td>
                                      <td>{{ $employee->name }}</td>
                                      <td>{{ $employee->contracts->basic_salary }}</td>
                                       {{-- @foreach ($allowances as $allowance )
                                      <td>

                                      @if($employee->id == $allowance->employee_id )
                                          {{ $allowance->value }}
                                          @else
                                           0
                                          @endif

                                      </td>
                                      
                                  @endforeach --}}
                                      
                                      <td> OverTime </td>
                                      <td> GOSI </td>
                                      <td> Absence </td>
                                      <td> Violations </td>
                                      <td> Advanced</td>
                                      <td> Advanced</td>



                                  </tr>
                              @endforeach

                          </tbody>
                      </table>

                  </div>

              </form>
