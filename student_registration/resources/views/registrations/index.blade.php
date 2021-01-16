@extends('layouts.home')

@section('content')
<div class="col-md-12 mb-4">
    <div class="card text-left">
        <div class="card-body">
            <h4 class="card-title mb-3">Lista de matriculas</h4>

            <div class="table-responsive">
                <div id="zero_configuration_table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    {{-- <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="zero_configuration_table_length"><label>Show <select
                                        name="zero_configuration_table_length" aria-controls="zero_configuration_table"
                                        class="form-control form-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div id="zero_configuration_table_filter" class="dataTables_filter"><label>Search:<input
                                        type="search" class="form-control form-control-sm" placeholder=""
                                        aria-controls="zero_configuration_table"></label></div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="display table table-striped table-bordered dataTable"
                                id="zero_configuration_table" style="width:100%" role="grid"
                                aria-describedby="zero_configuration_table_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="zero_configuration_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Name: activate to sort column descending" aria-sort="ascending"
                                            style="width: 200px;">Nome</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero_configuration_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Position: activate to sort column ascending"
                                            style="width: 100px;">CPF</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero_configuration_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Office: activate to sort column ascending"
                                            style="width: 117px;">Ano Letivo</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero_configuration_table"
                                            rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending"
                                            style="width: 100px;">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero_configuration_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Start date: activate to sort column ascending"
                                            style="width: 160px;">Data da mátricula</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero_configuration_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Salary: activate to sort column ascending"
                                            style="width: 350px;">Mais informações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registrations as $registration)

                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $registration->student->person->name }}</td>
                                        <td class="">{{ $registration->student->person->cpf }}</td>
                                        <td class="">{{ \Carbon\Carbon::parse($registration->school_year)->format('Y')}}
                                        </td>
                                        <td class="">{{ $registration->student->status }}</td>
                                        <td class="">
                                            {{ \Carbon\Carbon::parse($registration->created_at)->format('d/m/Y')}}</td>
                                        <td class="">
                                            <a class="btn btn-outline-info m-1"
                                                href="{{ route('registrations.edit',$registration) }}"
                                                type="button">Editar Dados do Aluno</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Nome</th>
                                        <th rowspan="1" colspan="1">CPF</th>
                                        <th rowspan="1" colspan="1">Ano Letivo</th>
                                        <th rowspan="1" colspan="1">Status</th>
                                        <th rowspan="1" colspan="1">Data da mátricula</th>
                                        <th rowspan="1" colspan="1">Mais informações</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="zero_configuration_table_info" role="status"
                                aria-live="polite">Mostrando de 1 até {{ $registrations->count() }} de
                                {{ $registrations->total() }}
                                {{ $registrations->total() == 1 ? 'registro' : 'registros' }}
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers"
                                id="zero_configuration_table_paginate">
                                {{$registrations->links()}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
