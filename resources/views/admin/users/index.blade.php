@extends('layouts.admin')
@section('content-wrapper')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Users</h4>
                <p class="card-description">
                     <code>Click name to rdit</code>
                </p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    User
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Role
                                </th>
                                <th>
                                    Created
                                </th>
                                <th>
                                    Updated
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($users) > 0) @foreach ($users as $user)
                            <tr>
                                <!-- <td>{{$user->id}}</td> -->
                                 <td class="py-1">
                                    <img src="{!! URL::asset($user->photo ? $user->photo->file : 'https://via.placeholder.com/400x400') !!}" alt="image" />
                                </td>
                                <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role->name}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>{{$user->updated_at}}</td>
                            </tr>
                            @endforeach @else
                            <p>No data</p>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
