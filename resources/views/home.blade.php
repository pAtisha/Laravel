<?php
/**
 * Created by PhpStorm.
 * User: Antonio
 * Date: 7/17/2017
 * Time: 5:41 PM
 */?>
@extends('master') @section('title', 'Home')
@section('content')
    <div class="container">
        <div class="row banner">
            <div class="col-md-12">
                <h1 class="text-center margin-top-100 editContent"> {!! trans('main.subtitle') !!} </h1>
                <h3 class="text-center margin-top-100 editContent">Building Practical Applications</h3>
                <div class="text-center"> <img src="http://learninglaravel.net/img/LearningLaravel5_cover0.png" width="302" height="391" alt=""> </div>
            </div>
        </div>
    </div>
@endsection

