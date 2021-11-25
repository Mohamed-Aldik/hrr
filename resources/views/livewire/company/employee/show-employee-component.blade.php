
                  <div class="col-12">
                      <div class="card">
                          <div class="card-body">
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
                                          <th scope="col">Management</th>
                                          <th scope="col">Section</th>
                                          <th scope="col">J.Title</th>
                                          <th scope="col">Joining Date</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($employees as $employee)
                                          <tr>
                                              <td>{{ $employee->job_number }}</td>
                                              <td>{{ $employee->name }}</td>
                                              <td>@if($employee->jobTitle) {{ $employee->jobTitle->department->management->name }}@endif</td>
                                              <td>@if($employee->jobTitle){{ $employee->jobTitle->department->name }}@endif</td>
                                              <td>@if($employee->jobTitle){{ $employee->jobTitle->name }}@endif</td>
                                              <td>@if($employee->contracts){{ Carbon\Carbon::parse( $employee->contracts->joining_date)->toDateString()}}@endif</td>
                                          </tr>
                                      @endforeach

                                  </tbody>
                              </table>


                          </div>
                      </div>
                  </div>
