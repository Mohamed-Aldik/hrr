
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
                                              <td>{{ $employee->jobTitle->department->management->name }}</td>
                                              <td>{{ $employee->jobTitle->department->name }}</td>
                                              <td>{{ $employee->jobTitle->name }}</td>
                                              @if($employee->contracts)
                                              <td>{{ Carbon\Carbon::parse( $employee->contracts->joining_date)->toDateString()}}</td>
                                               @endif
                                          </tr>
                                      @endforeach

                                  </tbody>
                              </table>


                          </div>
                      </div>
                  </div>
