@extends('layouts.admin')

@section('title', 'Dashboard - Admin Panel')

@section('content')
<section class="dashboard">
    <h1 class="title">dashboard</h1>
    <div class="box-container">
        <div class="box">
            <h3>Rp{{ number_format($total_pendings, 0, ',', '.') }}/-</h3>
            <p>total pendings</p>
        </div>
        <div class="box">
            <h3>Rp{{ number_format($total_completed, 0, ',', '.') }}/-</h3>
            <p>completed payments</p>
        </div>
        <div class="box">
            <h3>{{ $number_of_orders }}</h3>
            <p>order placed</p>
        </div>
        <div class="box">
            <h3>{{ $number_of_products }}</h3>
            <p>products added</p>
        </div>
        <div class="box">
            <h3>{{ $number_of_users }}</h3>
            <p>normal users</p>
        </div>
        <div class="box">
            <h3>{{ $number_of_admins }}</h3>
            <p>admin users</p>
        </div>
        <div class="box">
            <h3>{{ $number_of_messages }}</h3>
            <p>new messages</p>
        </div>
    </div>
</section>
@endsection