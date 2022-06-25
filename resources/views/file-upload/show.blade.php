@extends('layouts.master')

@section('content')
    <h1 class="title has-text-white"></h1>
    <div class="columns is-centered">
        <?php
        foreach (glob("/storage/app/public/files/*.pdf") as $filename) {
            echo "$filename size " . filesize($filename) . "\n";
        }
        ?>
    </div>

@endsection
