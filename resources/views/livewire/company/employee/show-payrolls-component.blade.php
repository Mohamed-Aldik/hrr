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
                    <th scope="col">Allownce</th>
                    <th scope="col">OverTime</th>
                    <th scope="col">GOSI</th>
                    <th scope="col">Absence</th>
                    <th scope="col">Violations</th>
                    <th scope="col">Advanced</th>
                    <th scope="col">Net Salary</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $employees as $employee)
                
                <tr>
                    
                    <td>{{ $employee->job_number }}</td>
                        <td>{{ $employee->name }}</td>
                                              @if($employee->contracts)

                        <td>{{ $employee->contracts->basic_salary }}</td>
@endif
                    <td>
                        <ul>
                            @forelse ($employee->allowances as $allowance)
                                <li> {{ $allowance->name }}:{{ $allowance->pivot->value }} </li>
                            @empty
                                <li> nothing </li>
                            @endforelse
                        </ul>
                    </td>
                    <td> {{ $employee->transactions->where('transactions','over_time')->sum('hours') }} </td>
                                              @if($employee->contracts)
                       
                        <td> {{ $employee->contracts->gosi_dedc }} </td>
                        @endif
                        <td> 0 </td>
                        <td> 0 </td>
                        <td> 0</td>
                                              @if($employee->contracts)

                        <td> {{ $employee->contracts->net_salary }}</td>

@endif

                </tr>
                @endforeach

            </tbody>

        </table>

    </div>

