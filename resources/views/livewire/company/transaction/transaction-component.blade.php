    <div class="table-responsive">
        @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add
        </button>
        <br>
        <br>

        <table class="table">
            <thead class="thead-dark">

                <tr>
                    <th scope="col">Transaction</th>
                    <th scope="col">J.N</th>
                    <th scope="col">Employee</th>
                    <th scope="col">Time</th>
                    <th scope="col">Date</th>
                    <th scope="col">SR</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($transes as $transe)

                    <tr>
                        <td> {{ $transe->transactions }} </td>
                        <td> {{ $transe->employee->job_number }} </td>
                        <td> {{ $transe->employee->name }} </td>
                        <td> {{ $transe->hours }} </td>
                        <td> {{ Carbon\Carbon::parse($transe->date)->format('Y/m/d') }} </td>
                        <td> {{ $transe->price }} </td>
                        <td>
                            <a href="#" onclick="confirm('Are you sure, You want to delete this transactions ?') || event.stopImmediatePropagation()"
                                wire:click.prevent="deleteTransactions({{ $transe->id }})" style="margin-left:10px">
                                 <i class="m-r-10 mdi mdi-window-close"></i>
                            </a>

                        </td>
                    </tr>
                @endforeach


            </tbody>

        </table>

        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Tranaction </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message') }}
                            </div>
                        @endif

                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" value='over_time' name="customRadioInline1"
                                class="custom-control-input" wire:model.lazy="trans">
                            <label class="custom-control-label" for="customRadioInline1">OverTime </label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" value='deduction' name="customRadioInline1"
                                class="custom-control-input" wire:model.lazy="trans">
                            <label class="custom-control-label" for="customRadioInline2">Deduction</label>
                        </div>
                        <br>
                        <br>

                        <div class="form-row">
                            <div class="col">
                            <label for="validationDefault01">Job Number</label>
                                <input type="number" class="form-control" placeholder="J.N" wire:model.lazy="number">
                            </div>
                            <div class="col">
                            <label for="validationDefault01">Name</label>
                                <input type="text" class="form-control" placeholder="Name" wire:model.lazy="name">
                            </div>
                        </div>

                        <br>

                        <div class="form-row">
                            <div class="col">
                            <label for="validationDefault01">Date</label>
                                <input type="date" class="form-control" wire:model.lazy="date">
                            </div>
                            <br>

                            <div class="col">
                            <label for="validationDefault01">{{ $change }}</label>
                                <input type="number" class="form-control" placeholder="Hours" wire:model.lazy="hours">

                            </div>
                        </div>







                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                            wire:click="add">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
