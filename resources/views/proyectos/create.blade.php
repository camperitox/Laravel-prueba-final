@extends('layouts.app')

@section('contents')
<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Mis proyectos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>
<div class="container-sm">
    <h1>Crear Nuevo Proyecto</h1>

    <form action="{{ route('proyectos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre_proyecto" class="form-label">Nombre del Proyecto</label>
            <input type="text" class="form-control" id="nombre_proyecto" name="NombreProyecto" required>
        </div>
        <div class="mb-3">
            <label for="fuente_fondos" class="form-label">Fuente de Fondos</label>
            <input type="text" class="form-control" id="fuente_fondos" name="fuenteFondos" required>
        </div>
        <div class="mb-3">
            <label for="monto_planificado" class="form-label">Monto Planificado</label>
            <input type="number" class="form-control" id="monto_planificado" name="MontoPlanificado" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="monto_patrocinado" class="form-label">Monto Patrocinado</label>
            <input type="number" class="form-control" id="monto_patrocinado" name="MontoPatrocinado" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="monto_fondos_propios" class="form-label">Monto Fondos Propios</label>
            <input type="number" class="form-control" id="monto_fondos_propios" name="MontoFondosPropios" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Proyecto</button>
    </form>
</div>
@endsection
