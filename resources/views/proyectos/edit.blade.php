@extends('layouts.app')

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

<div class="container mt-4">
    <h1>Editar Proyecto</h1>

    <form action="{{ route('proyectos.update', $proyecto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="NombreProyecto" class="form-label">Nombre del Proyecto</label>
            <input type="text" class="form-control" id="NombreProyecto" name="NombreProyecto" value="{{ $proyecto->NombreProyecto }}">
        </div>

        <div class="mb-3">
            <label for="fuenteFondos" class="form-label">Fuente de Fondos</label>
            <input type="text" class="form-control" id="fuenteFondos" name="fuenteFondos" value="{{ $proyecto->fuenteFondos }}">
        </div>

        <div class="mb-3">
            <label for="MontoPlanificado" class="form-label">Monto Planificado</label>
            <input type="text" class="form-control" id="MontoPlanificado" name="MontoPlanificado" value="{{ $proyecto->MontoPlanificado }}">
        </div>

        <div class="mb-3">
            <label for="MontoPatrocinado" class="form-label">Monto Patrocinado</label>
            <input type="text" class="form-control" id="MontoPatrocinado" name="MontoPatrocinado" value="{{ $proyecto->MontoPatrocinado }}">
        </div>

        <div class="mb-3">
            <label for="MontoFondosPropios" class="form-label">Monto Fondos Propios</label>
            <input type="text" class="form-control" id="MontoFondosPropios" name="MontoFondosPropios" value="{{ $proyecto->MontoFondosPropios }}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
