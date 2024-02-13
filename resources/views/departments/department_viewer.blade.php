<!doctype html>
<html lang="en">

@section('title', 'HRIS - ' . $department->department_name)
@include('layouts.components.head')

<body>
    <h1>{{ $department->department_name }}</h1>
</body>