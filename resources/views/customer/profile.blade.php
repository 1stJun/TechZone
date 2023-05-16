@extends('customer.layout.master2')

@section('title', 'Profile')

@section('main')
    <!-- Content -->
    <div class="app__container">
        <div class="grid wide">
            <div class="row app__content">
                <div class="col l-8 l-o-2 m-8 m-o-2 c-10 c-o-1">
                    <form action="{{ url('customer/profile/' . $customer->customerID) }}" method="POST">
                        @csrf
                        <div class="profile">
                            <h1>My Profile</h1>
                            @if (Session::has('success'))
                                <span style="color: red;">{{ Session::get('success') }}</span>
                            @endif
                            <div class="profile-info">
                                <div class="profile-image">
                                    <img src="img/user_avatar.png" alt="Customer Avatar">
                                </div>
                                <table width="100%" class="profile-details">
                                    <tr>
                                        <td class="title"><strong>Name</strong></td>
                                        <td>
                                            <div class="profile__group">
                                                <input type="text" name="customerName" class="profile__input"
                                                    value="{{ $customer->customerName }}">
                                            </div>
                                            @if ($errors->has('customerName'))
                                                <span style="color: red; font-size: 0.9em;">
                                                    {{ $errors->first('customerName') }}
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="title"><strong>Email</strong></td>
                                        <td>
                                            <div class="profile__group">
                                                <input type="text" name="customerEmail" class="profile__input"
                                                    value="{{ $customer->customerEmail }}">
                                                @if ($errors->has('customerEmail'))
                                                    <span style="color: red; font-size: 0.9em;">
                                                        {{ $errors->first('customerEmail') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="title"><strong>Phone</strong></td>
                                        <td>
                                            <div class="profile__group">
                                                <input type="text" name="customerPhone" class="profile__input"
                                                    value="{{ $customer->customerPhone }}">
                                                @if ($errors->has('customerPhone'))
                                                    <span style="color: red; font-size: 0.9em;">
                                                        {{ $errors->first('customerPhone') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="title"><strong>Old password</strong></td>
                                        <td>
                                            <div class="profile__group">
                                                <input type="password" name="oldPassword" class="profile__input"
                                                    placeholder="Enter your old password">
                                                @if (Session::has('fail'))
                                                    <span style="color: red; font-size: 0.9em;">
                                                        {{ Session::get('fail') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="title"><strong>New password</strong></td>
                                        <td>
                                            <div class="profile__group">
                                                <input type="password" name="newPassword" class="profile__input"
                                                    placeholder="Enter your new password">
                                                @if ($errors->has('newPassword'))
                                                    <span style="color: red; font-size: 0.9em;">
                                                        {{ $errors->first('newPassword') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="title"><strong>Confirm password</strong></td>
                                        <td>
                                            <div class="profile__group">
                                                <input type="password" name="confirmPassword" class="profile__input"
                                                    placeholder="Confirm your new password">
                                                @if ($errors->has('confirmPassword'))
                                                    <span style="color: red; font-size: 0.9em;">
                                                        {{ $errors->first('confirmPassword') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="profile-actions">
                                <button class="btn btn-save">
                                    Save Changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
