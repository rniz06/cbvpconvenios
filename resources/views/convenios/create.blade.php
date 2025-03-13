@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Convenios')
@section('content_header_title', 'Convenios')
@section('content_header_subtitle', 'Registrar')

{{-- Content body: main page content --}}

@section('content_body')
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Registrar Convenio</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('convenios.store') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
                @method('POST')
            <div class="card-body">

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Titulo:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="titulo" value="{{ old('titulo') }}"
                            placeholder="Convenio...">
                        @error('titulo')
                            <p class="text-danger">*{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Institución:</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="institucion_id" id="institucion_id" required>
                            <option value="">Seleccionar...</option>
                            @foreach ($instituciones as $institucion)
                                <option value="{{ $institucion->id_institucion }}">{{ $institucion->nombre ?? 'N/A' }}
                                </option>
                            @endforeach
                        </select>
                        @error('institucion_id')
                            <p class="text-danger">*{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Estado:</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="estado_id" required>
                            @foreach ($estados as $estado)
                                <option value="{{ $estado->idconvenio_estado }}">{{ $estado->estado ?? 'N/A' }}
                                </option>
                            @endforeach
                        </select>
                        @error('estado_id')
                            <p class="text-danger">*{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha de Suscripción:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="fecha_suscrito"
                            value="{{ old('fecha_suscrito') }}">
                        @error('fecha_suscrito')
                            <p class="text-danger">*{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha Finalización:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="fecha_fin" value="{{ old('fecha_fin') }}">
                        @error('fecha_fin')
                            <p class="text-danger">*{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">CBVP Presidente:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="presidente_id" value="507">
                        @error('presidente_id')
                            <p class="text-danger">*{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">CBVP Secretaria:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="secretario_id" value="497">
                        @error('secretario_id')
                            <p class="text-danger">*{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Otros:</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="otros_id" id="otros_id" required>
                            <option value="">Seleccionar...</option>
                            <option value="">A...</option>
                            <option value="">B...</option>
                            <option value="">C...</option>
                            <option value="">D...</option>
                        </select>
                        @error('otros_id')
                            <p class="text-danger">*{{ $message }}</p>
                        @enderror
                    </div>
                </div> --}}

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Archivo:</label>
                    <div class="col-sm-10">
                        {{-- <input type="file" class="form-control" name="archivo"> --}}
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="archivo" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Subir archivo aqui...</label>
                        </div>
                        @error('archivo')
                            <p class="text-danger">*{{ $message }}</p>
                        @enderror
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Registrar</button>
                <a href="{{ route('convenios.index') }}" class="btn btn-secondary float-right">Volver</a>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
@stop

@section('plugins.Select2', true)
@section('plugins.bsCustomFileInput', true)

{{-- Push extra CSS --}}

@push('css')
    <style>
        /* Corrige estilos del select2 */
        .selection span {
            height: 38px !important;
        }
    </style>
@endpush

{{-- Push extra scripts --}}

@push('js')
    <script>
        $(document).ready(function() {
            $('#institucion_id').select2({
                placeholder: 'Seleccionar...',
                language: "es",
            });
        });
    </script>

    <script src="{{ asset('vendor/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endpush
