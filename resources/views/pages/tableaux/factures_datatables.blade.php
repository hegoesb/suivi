{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">{{$titre}}
                    <div class="text-muted pt-2 font-size-sm">{{$descriptif}}</div>
                </h3>
            </div>
        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover js-exportable" id="kt_datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Numéro</th>
                        <th>Chantier</th>
                        <th>Client</th>
                        <th>Géré par</th>
                        <th>Type</th>
                        <th>Etat</th>
                        <th>Total HT</th>
                        <th>Date Création</th>
                        <th>Date Echéance</th>
                        <th>Date Payé</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $value)
                        {{-- <tr class="gradeX {{ $value['justificatif']==1 ? '' : 'text-danger' }}"> --}}
                        <tr class="gradeX">
                            <td>{{$value['id']}}</td>
                            <td>{{$value['numero']}}</td>
                            <td>{{$value['lot']}}</td>
                            <td>{{$value['chantier']['identifiant']}}</td>
                            <td data-toggle="tooltip" data-theme="dark" title="{{$value['client']['nom_display']}}">{{$value['client']['nom']}}</td>
                            <td data-toggle="tooltip" data-theme="dark" title="{{$value['collaborateur']['nom_display']}}">{{$value['collaborateur']['nom']}}</td>
                            <td>{{$value['type_devi']['nom_display']}}</td>
                            <td>{{$value['etat_devi']['nom_display']}}</td>
                            <td>{{$value['date_envoie']}}</td>
                            <td>{{$value['date_signature']}}</td>
                            <td>{{$value['progbox_sauve']}}</td>
                            <td>{{$value['total_ht']}}</td>
                            <td>1</td>
                            <td>payé</td>
                            <td>50%</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Numéro</th>
                        <th>Chantier</th>
                        <th>Client</th>
                        <th>Géré par</th>
                        <th>Type</th>
                        <th>Etat</th>
                        <th>Total HT</th>
                        <th>Date Création</th>
                        <th>Date Echéance</th>
                        <th>Date Payé</th>
                    </tr>
                </tfoot>

            </table>

        </div>

    </div>

@endsection

{{-- Styles Section --}}
@section('styles')

    {{-- datatable --}}
    <link href="{{ asset('https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
        {{-- boutton --}}
        <link href="{{ asset('https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
        {{-- Responsive --}}
        <link href="{{ asset('https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
    {{-- <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/> --}}
@endsection


{{-- Scripts Section --}}
@section('scripts')
    {{-- datatable --}}
    <script src="{{ asset('https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
        {{-- boutton --}}
        <script src="{{ asset('https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js') }}" type="text/javascript"></script>
        {{-- Responsive --}}
        <script src="{{ asset('https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js') }}" type="text/javascript"></script>
        {{-- Page length --}}
        {{-- <script src="{{ asset('https://code.jquery.com/jquery-3.5.1.js') }}" type="text/javascript"></script> --}}




    {{-- page scripts --}}
    {{-- <script src="{{ asset('js/pages/crud/datatables/basic/basic.js') }}" type="text/javascript"></script> --}}
    {{-- <script src="{{ asset('js/app.js') }}" type="text/javascript"></script> --}}
    {{-- tooltips --}}
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/tooltipster/4.2.8/js/tooltipster.bundle.min.js') }}" type="text/javascript"></script>

    <script>
        $(function () {
            //Exportable table
            $('.js-exportable').DataTable({
                dom: 'Bfrltip',
                responsive: true,
                buttons: [

                    {extend: 'copy', title: '{{$titre}}' },
                    {extend: 'csv', title: '{{$titre}}' },
                    {extend: 'excel', title: '{{$titre}}' },
                    {extend: 'pdf', title: '{{$titre}}'},
                    {extend: 'print', title: '{{$titre}}'}

                ],
                "lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]],
                "order": [[ {{$colonne_order}}, '{{$ordre}}' ]],
                // "order": [[ 1, "asc" ]],
                "columnDefs": [
                    // { "orderable": false ,    "targets": [4]},
                    // { "width": "54px", "targets": 8 },
                ],
                "oLanguage": {
                  "sUrl": "//cdn.datatables.net/plug-ins/1.10.16/i18n/French.json"
                },
                initComplete: function () {
                    this.api().columns([1,2,3,4,5,6,7,10,12,14]).every( function () {
                        var column = this;
                        var select = $('<select><option value=""></option></select>')
                            .appendTo( $(column.footer()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                            } );

                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        } );
                    } );
                }
            });
        });
        $('[data-toggle="tooltip"]').tooltip({container:"body"})
    </script>


@endsection
