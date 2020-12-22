@extends('layouts.home')

@section('content')
    <div class="col-md-12 mb-4">
        <div class="card text-left">
            <div class="card-body">
                <h4 class="card-title mb-3">Zero configuration</h4>
                <p>DataTables has most features enabled by default, so all you need to do to use it with your own ables is
                    to call the construction function: $().DataTable();.</p>
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
                                                style="width: 117px;">Data da Nascimento</th>
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
                                        @foreach ($students as $student)

                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{ $student->person->name }}</td>
                                                <td class="">{{ $student->person->cpf }}</td>
                                                <td class="">{{ $student->born_date }}</td>
                                                <td class="">{{ $student->status }}</td>
                                                <td class="">{{ $student->created_at }}</td>
                                                <td class="">
                                                    <a class="btn btn-outline-info m-1"
                                                        href="{{ route('students.edit', $student) }}" type="button">Editar
                                                        Dados do Aluno</a>

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">Nome</th>
                                            <th rowspan="1" colspan="1">CPF</th>
                                            <th rowspan="1" colspan="1">Data da Nascimento</th>
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
                                    aria-live="polite">Mostrando de 1 até {{ $students->count() }} de
                                    {{ $students->total() }} {{ $students->total() == 1 ? 'registro' : 'registros' }}
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers"
                                    id="zero_configuration_table_paginate">
                                    @if ($students->hasPages())

                                        <ul class="pagination">
                                            @if ($students->onFirstPage())
                                                <li class="paginate_button page-item previous disabled"
                                                    id="deafult_ordering_table_previous"><a href="#" disabled
                                                        aria-controls="deafult_ordering_table" data-dt-idx="0" tabindex="0"
                                                        class="page-link">Anterior</a></li>
                                            @else
                                                <li class="paginate_button page-item previous"
                                                    id="zero_configuration_table_previous"><a
                                                        href="{{ $students->previousPageUrl() }}"
                                                        aria-controls="zero_configuration_table" data-dt-idx="0"
                                                        tabindex="0" class="page-link">Anterior</a></li>
                                            @endif
                                            @foreach ($students as $student)
                                                @if (is_string($student))
                                                    <li class="paginate_button page-item active"><a href="#"
                                                            aria-controls="zero_configuration_table"
                                                            data-dt-idx="{{ $student }}" tabindex="0"
                                                            class="page-link">{{ $student }}</a></li>
                                                @endif
                                                @if (is_array($student))
                                                    @foreach ($student as $page => $url)
                                                        @if ($page == $students->currentPage())
                                                            <li class="paginate_button page-item active"><a href="#"
                                                                    aria-controls="deafult_ordering_table" data-dt-idx="1"
                                                                    tabindex="0" class="page-link">{{ $page }}</a></li>
                                                        @else
                                                            <li class="paginate_button page-item"><a href="{{ $url }}"
                                                                    aria-controls="deafult_ordering_table" data-dt-idx="1"
                                                                    tabindex="0" class="page-link">{{ $page }}</a></li>
                                                        @endif
                                                    @endforeach
                                                @endif

                                            @endforeach

                                            @if ($students->hasMorePages())
                                                <li class="paginate_button page-item next" id="deafult_ordering_table_next">
                                                    <a href="{{ $students->nextPageUrl() }}"
                                                        aria-controls="deafult_ordering_table" data-dt-idx="3" tabindex="0"
                                                        class="page-link">Proxima</a>
                                                </li>
                                            @else
                                                <li class="paginate_button page-item next disabled"
                                                    id="zero_configuration_table_next"><a href="#"
                                                        aria-controls="zero_configuration_table" data-dt-idx="7"
                                                        tabindex="0" class="page-link">Proxima</a></li>
                                            @endif

                                        </ul>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
