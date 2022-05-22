@extends('layouts.priv')

@section('title', 'Perfil')

@section('container')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">email</th>
                <th scope="col">status</th>
                <th scope="col">Activar</th>
                <th scope="col">Desactivar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collFlyerQR as $flyerQR)
                <tr>
                    <td>{{ $flyerQR->email }}</td>
                    <td>{{ $flyerQR->contractStatus }}</td>
                    <td>

                        <form action="{{ route('FQRAdminChangeStatus') }}" method="post">
                            @csrf
                            <input type="hidden" name="status" value='A'>
                            <input type="hidden" name="email" value='{{ $flyerQR->email }}'>
                            <button class="btn btn-primary">Aprobar</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('FQRAdminChangeStatus') }}" method="post">
                            @csrf
                            <input type="hidden" name="status" value='DM'>
                            <input type="hidden" name="email" value='{{ $flyerQR->email }}'>
                            <button class="btn btn-danger">Desactivar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
