<div class="card">
    <div class="card-header">
        <h4 class="card-title">List of Users</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Area</th>
                        <th>Chapter</th>
                        <th>Date Submitted</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($yourProfiles as $profile)
                    <tr>
                        <td>
                            <h2 class="table-avatar">
                                <a href="/profile/{{ $profile->id }}"><img class="avatar img-fluid avatar-sm mr-2 avatar-img rounded-circle" src="{{ $profile->avatar }}" alt="User Image"> {{ $profile->name }}</a>
                            </h2>
                        </td>
                        <td>{{ $profile->email }}</td>
                        <td>{{ Carbon\Carbon::parse($profile['created_at'])->toFormattedDateString() }}</td>
                        <td class="text-left">
                            <a href="/profile/{{ $profile->id }}" class="btn btn-sm btn-white text-info mr-2"><i class="far fa-eye mr-1"></i> View Profile</a> 
                            <a href="#" class="btn btn-sm btn-white text-success mr-2"><i class="far fa-edit mr-1"></i> Edit</a> 
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>