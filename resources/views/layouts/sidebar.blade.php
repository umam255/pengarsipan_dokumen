@extends('layouts.template')


<div class="position-sticky pt-3">
    <ul class="nav flex-column">
        @if (Auth::check())
            @if (Auth::user()->status == 1)
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">
                        <span data-feather="home"></span>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('user.index') }}">
                        <span data-feather="users"></span>
                        Management users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">
                        <span data-feather="folder"></span>
                        Management Dokumen
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">
                        <span data-feather="folder"></span>
                        Management Dokumen
                    </a>
                </li>
            @else
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Saved reports</span>
                    <a class="link-secondary" href="#" aria-label="Add a new report">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Current month
                        </a>
                    </li>
                </ul>
            @endif
        @endif
</div>
