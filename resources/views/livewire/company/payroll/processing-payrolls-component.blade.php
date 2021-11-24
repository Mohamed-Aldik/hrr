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
                    <th scope="col">Other</th>
                    <th scope="col">Advanced</th>
                    <th scope="col">Net Salary</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contracts as $contract)
                    <tr>

                        <td>{{ $contract->employee->job_number }}</td>
                        <td>{{ $contract->employee->name }}</td>
                        <td>{{ $contract->basic_salary }}</td>

                        <td>
                            <ul>
                                @forelse ($contract->employee->allowances as $allowance)
                                    <li> {{ $allowance->name }}:{{ $allowance->pivot->value }} </li>
                                @empty
                                    <li> nothing </li>
                                @endforelse
                            </ul>
                        </td>
                        <td> {{ $contract->employee->transactions->where('transactions', 'over_time')->sum('hours') }}</td>
                        <td> {{ $contract->gosi_dedc }} </td>
                        <td> 0 </td>
                        <td> 0 </td>
                        <td> 0 </td>
                        <td>
                            {{($contract->total_salary / 30) * (Carbon\Carbon::parse($contract->joining_date)->diffInDays(now()) + 1 ) + $contract->employee->transactions->where('transactions', 'over_time')->sum('price') - $contract->employee->transactions->where('created_at','<=','20'.$yer.'-'.$mnth.'-31')->where('created_at','>=','20'.$yer.'-'.$mnth.'-01')->where('transactions', 'deduction')->sum('price') - $contract->gosi_dedc}}
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>

    </div>
