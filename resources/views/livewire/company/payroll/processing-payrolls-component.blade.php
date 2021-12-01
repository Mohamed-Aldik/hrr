    <div class="table-responsive">
    <button type="button" class="btn btn-primary"><a class="text-white" href="{{ route('version.payrolls') }}">Version</a></button>
<br>
<br>
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
            @if ('20'.$yer.'-'.$mnth.'-'. Carbon\Carbon::now()->format('d') > now()   )
                
            @else
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
                        <td> {{ $contract->employee->transactions->where('transactions', 'over_time')->where('created_at','<=','20'.$yer.'-'.$mnth.'-31')->where('created_at','>=','20'.$yer.'-'.$mnth.'-01')->sum('hours') }}</td>
                        <td> {{ $contract->gosi_dedc }} </td>
                        <td> {{ $contract->employee->transactions->where('deduction', 'absence')->where('created_at','<=','20'.$yer.'-'.$mnth.'-31')->where('created_at','>=','20'.$yer.'-'.$mnth.'-01')->sum('price')  }}</td>
                        <td> {{ $contract->employee->transactions->where('deduction', 'other')->where('created_at','<=','20'.$yer.'-'.$mnth.'-31')->where('created_at','>=','20'.$yer.'-'.$mnth.'-01')->sum('price')  }}</td>
                        <td> 0 </td>
                        <td>
                        @if($contract->joining_date >=  '20'.$yer.'-'.$mnth.'-01' &&  $contract->joining_date <= '20'.$yer.'-'.$mnth.'-31' )
                        @if( $mnth == now()->format('m') && $yer == now()->format('y'))
                            {{($contract->total_salary / 30) * ( now()->format('d') - Carbon\Carbon::parse($contract->joining_date)->format('d') + 1 ) + $contract->employee->transactions->where('transactions', 'over_time')->sum('price') - $contract->employee->transactions->where('created_at','<=','20'.$yer.'-'.$mnth.'-31')->where('created_at','>=','20'.$yer.'-'.$mnth.'-01')->where('transactions', 'deduction')->sum('price') }}
                            @else
                            {{($contract->total_salary / 30) * ( 31 - Carbon\Carbon::parse($contract->joining_date)->format('d') ) + $contract->employee->transactions->where('transactions', 'over_time')->sum('price') - $contract->employee->transactions->where('created_at','<=','20'.$yer.'-'.$mnth.'-31')->where('created_at','>=','20'.$yer.'-'.$mnth.'-01')->where('transactions', 'deduction')->sum('price') }}
                            @endif
                        @else
                        @if($mnth == now()->format('m') && $yer == now()->format('y'))
                            {{($contract->total_salary / 30) * now()->format('d') + $contract->employee->transactions->where('transactions', 'over_time')->sum('price') - $contract->employee->transactions->where('created_at','<=','20'.$yer.'-'.$mnth.'-31')->where('created_at','>=','20'.$yer.'-'.$mnth.'-01')->where('transactions', 'deduction')->sum('price') }}

                        @else
                            {{$contract->total_salary   + $contract->employee->transactions->where('transactions', 'over_time')->sum('price') - $contract->employee->transactions->where('created_at','<=','20'.$yer.'-'.$mnth.'-31')->where('created_at','>=','20'.$yer.'-'.$mnth.'-01')->where('transactions', 'deduction')->sum('price') }}

                        @endif
                        @endif
                        </td>
              {{-- - $contract->gosi_dedc --}}
              </tr>
                @endforeach
@endif
            </tbody>

        </table>

    </div>
