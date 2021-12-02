
<?php if (Session::has('success')): ?>
    <div class="alert alert-success">{!!request()->session()->pull('success', 'default')!!}</div>
<?php endif; ?>

<?php if (Session::has('error')): ?>
    <div class="alert alert-danger">{!!request()->session()->pull('error', 'default')!!}</div>
<?php endif; ?>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif