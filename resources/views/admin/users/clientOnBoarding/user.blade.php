<div class="card">
    <div class="text-center project-main">
        <a href="{{ route('users.show',$user->id) }}">
            <img src="{{ asset('mawaisnow\slim\img\avatar_11.png') }}" class="img-radius img-fluid rounded-circle" alt="User-Profile-Image">
        </a>

        <h5 class="mt-4">{{ $user->name }}</h5>
        @if ($user->businessName != null)
        <span>{{ $user->businessName }}</span>

        @endif

    </div>


    <div class="card-block task-details table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <td><i class="fas fa-id-badge m-r-5"></i> ID:</td>
                    <td class="text-right"><span class="float-right"> {{ $user->id }} </span></td>
                </tr>
                <tr>
                    <td><i class="fas fa-envelope m-r-5"></i> Email:</td>
                    <td class="text-right"><span class="float-right"> {{ $user->email }} </span></td>
                </tr>
                <tr>
                    <td><i class="fas fa-phone m-r-5"></i> Phone:</td>
                    <td class="text-right"><span class="float-right"> {{ $user->phone }} </span></td>
                </tr>

                <tr>
                    <td><i class="fas fa-thermometer-half m-r-5"></i> Status:</td>
                    <td class="text-right">
                        @if ($user->status == 0) Pending
                        @endif
                        @if ($user->status == 1) Active
                        @endif
                        @if ($user->status == 2) Block
                        @endif
                    </td>
                </tr>










                <tr>
                    <td><i class="far fa-calendar-alt m-r-5"></i> Updated:</td>
                    <td class="text-right">{{ $user->updated_at->format('d F, Y') }}</td>
                </tr>
                <tr>
                    <td><i class="far fa-credit-card m-r-5"></i> Created:</td>
                    <td class="text-right">{{ $user->created_at->format('d F, Y') }}</td>
                </tr>

                <tr>
                    <td><i class="fa-pencil-alt fas m-r-5"></i> Edit:</td>
                    <td class="text-right">
                      <a href="{{ route('users.edit',$user->id) }}" class="btn btn-outline-success btn-sm ">Yes</a>
                    </td>
                </tr>

                <tr>
                  <td><i class="far fa-trash-alt m-r-5"></i> Delete:</td>

                  <td  class="text-right">
                    <a href="javascript:void(0)" data-obj='{
                      "userId": "{{$user->id}}",
                      "url": "{{ route('users.destroy', $user->id) }}",
                      "method": "delete"
                    }' data-html="Once you delete this user, all of it's related Data will be deleted, including subscription." class=" btn-sm btn btn-outline-danger label f-12 deleteConfirm">Yes</a>
                  </td>
                </tr>

            </tbody>
        </table>

    </div>
</div>
