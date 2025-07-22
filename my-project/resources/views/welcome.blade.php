<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>API de Restaurantes</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/api-info.css') }}" />
</head>
<body>
    <div class="container">
        <h1>API de Restaurantes</h1>

        <table>
            <thead>
                <tr>
                    <th>Método</th>
                    <th>Ruta</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><span class="method get">GET</span></td>
                    <td>/api/restaurantes</td>
                    <td>Lista de restaurantes</td>
                </tr>
                <tr>
                    <td><span class="method get">GET</span></td>
                    <td>/api/restaurantes/{id}</td>
                    <td>Ver un restaurante</td>
                </tr>
                <tr>
                    <td><span class="method post">POST</span></td>
                    <td>/api/restaurantes</td>
                    <td>Crear nuevo restaurante</td>
                </tr>
                <tr>
                    <td><span class="method put">PUT</span></td>
                    <td>/api/restaurantes/{id}</td>
                    <td>Actualizar restaurante</td>
                </tr>
                <tr>
                    <td><span class="method patch">PATCH</span></td>
                    <td>/api/restaurantes/{id}</td>
                    <td>Actualizar parcialmente</td>
                </tr>
                <tr>
                    <td><span class="method delete">DELETE</span></td>
                    <td>/api/restaurantes/{id}</td>
                    <td>Eliminar restaurante</td>
                </tr>
            </tbody>
        </table>

        <p class="btn-container">
            <a href="{{ url('/docs/api') }}" class="btn">Ver documentación</a>
        </p>
    </div>
</body>
</html>
