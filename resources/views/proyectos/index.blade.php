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
    <h1>Lista de Proyectos</h1>

    <a href="{{ route('proyectos.create') }}" class="btn btn-primary">Crear Nuevo Proyecto</a>
    <a href="{{ route('informeCompleto') }}" class="btn btn-success">Generar Informe PDF</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Proyecto</th>
                <th>Fuente de Fondos</th>
                <th>Monto Planificado</th>
                <th>Monto Patrocinado</th>
                <th>Monto Fondos Propios</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proyectos as $proyecto)
            <tr>
                <td>{{ $proyecto->id }}</td>
                <td>{{ $proyecto->NombreProyecto }}</td>
                <td>{{ $proyecto->fuenteFondos }}</td>
                <td>${{ $proyecto->MontoPlanificado }}</td>
                <td>${{ $proyecto->MontoPatrocinado }}</td>
                <td>${{ $proyecto->MontoFondosPropios }}</td>
                <td>
                    <a href="{{ route('proyectos.show', $proyecto->id) }}" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalProyecto{{ $proyecto->id }}">Ver</a>
                    <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@foreach($proyectos as $proyecto)
<!-- Modal para mostrar los detalles del proyecto -->
<div class="modal fade" id="modalProyecto{{ $proyecto->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalles del Proyecto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Aquí mostramos los detalles del proyecto -->
                <h5>{{ $proyecto->NombreProyecto }}</h5>
                <p>Fuente de Fondos: {{ $proyecto->fuenteFondos }}</p>
                <p>Monto Planificado: {{ $proyecto->MontoPlanificado }}</p>
                <p>Monto Patrocinado: {{ $proyecto->MontoPatrocinado }}</p>
                <p>Monto Fondos Propios: {{ $proyecto->MontoFondosPropios }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <a href="{{ route('informeSingular', $proyecto->id) }}" class="btn btn-success">Generar Informe PDF</a>
            </div>
        </div>
    </div>
</div>
@endforeach
