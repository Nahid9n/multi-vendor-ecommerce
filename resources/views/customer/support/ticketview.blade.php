<div class="card">
    <div class="card-header">
        <h5>Support Ticket</h5>
    </div>
    <div class="card-body">
        <form method="post" action="{{route('customer.store.ticket')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <input type="hidden" name="sender_id" value="{{auth()->user()->id}}">
                <div class="form-group col-md-12">
                    <label>Subject <span class="text-danger">*</span></label>
                    <input class="form-control" name="subject" type="text" required>
                </div>
                <div class="form-group col-md-12">
                    <label>Provide a detailed description</label>
                    <textarea class="form-control" name="description" id="" cols="30" rows="5"></textarea>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-fill-out submit">Save</button>
                </div>
            </div>
        </form>
        <div class="row my-2">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Ticket Id</th>
                            <th>Subject</th>
                            <th>Sending Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(Request::route()->getName() == 'customer.view.ticket')
                            @forelse($tickets as $ticket)
                                <tr>
                                    <td>#{{$ticket->ticket_id}}</td>
                                    <td>{{$ticket->subject}}</td>
                                    <td>{{date_format($ticket->created_at,'d M, Y h:m a')}}</td>
                                    <td>{{$ticket->status = 0 ? 'pending':''}}</td>
                                    <td>
                                        <a class="btn-small d-block" href="{{ route('', $ticket->id) }}">View</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Ticket Found</td>
                                </tr>
                            @endforelse
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
