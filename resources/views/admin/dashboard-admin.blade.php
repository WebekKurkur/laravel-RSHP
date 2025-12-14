@extends('layouts.lte.main')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <h3><div class="card-header">{{ __('Dashboard Admin') }} - {{ session('user_name') }}</div></h3>

                <div class="card-body">
                    @if (session('success') || session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') ?? session('status') }}
                        </div>
                    @endif

                    <p>{{ __('Selamat datang di dashboard admin.') }} {{ session('user_role_name') }}</p>

                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box text-bg-primary">
                                <div class="inner">
                                    <h3>{{ $usersCount ?? 0 }}</h3>
                                    <p>Users</p>
                                </div>
                                <div class="small-box-icon">
                                    <i class="bi bi-people-fill" aria-hidden="true"></i>
                                </div>
                                <div class="small-box-footer">Total registered users</div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box text-bg-success">
                                <div class="inner">
                                    <h3>{{ $pemilikCount ?? 0 }}</h3>
                                    <p>Pemilik</p>
                                </div>
                                <div class="small-box-icon">
                                    <i class="bi bi-person-badge-fill" aria-hidden="true"></i>
                                </div>
                                <div class="small-box-footer">Total pemilik</div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box text-bg-info">
                                <div class="inner">
                                    <h3>{{ $petCount ?? 0 }}</h3>
                                    <p>Pet</p>
                                </div>
                                <div class="small-box-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path d="M20.464 7.637c.916-1.14.53-2.88-.827-3.59-1.357-.71-2.77.03-3.686 1.17-.915 1.14-.53 2.88.827 3.59 1.357.71 2.77-.03 3.686-1.17zM8.977 3.822c.62-1.66-.25-3.582-1.929-4.27C5.398-1.07 3.56-.117 2.94 1.544c-.62 1.661.25 3.582 1.929 4.27 1.677.689 3.516-.264 4.108-2.0zM12.01 7.05c.995-1.122.987-2.83-.02-3.95-1.01-1.12-2.68-1.15-3.676-.028-.995 1.122-.987 2.83.02 3.95 1.01 1.12 2.68 1.15 3.676.028zM15.2 9.8c-1.94 0-4.02 1.09-5.2 2.35-1.18-1.26-3.26-2.35-5.2-2.35C1.95 9.8 0 12.16 0 14.86 0 17.57 1.95 20 4.8 20c1.58 0 3.01-.84 4-2.16.99 1.32 2.42 2.16 4 2.16 2.85 0 4.8-2.43 4.8-5.14 0-2.7-1.95-5.06-4.2-5.06z"/>
                                    </svg>
                                </div>
                                <div class="small-box-footer">Total hewan</div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box text-bg-warning">
                                <div class="inner">
                                    <h3>{{ $rasCount ?? 0 }}</h3>
                                    <p>Ras Hewan</p>
                                </div>
                                <div class="small-box-icon">
                                    <i class="bi bi-basket" aria-hidden="true"></i>
                                </div>
                                <div class="small-box-footer">Jenis / ras tersedia</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection