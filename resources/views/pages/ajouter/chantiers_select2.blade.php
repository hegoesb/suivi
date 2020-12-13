{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')


<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">{{$titre}}</h3>
        <div class="card-toolbar">
            <div class="example-tools justify-content-center">
                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
            </div>
        </div>
    </div>
    <!--begin::Form-->
    {!! Form::open(['url' => url('ajouter/'.$entreprise->id.'/chantiers'), 'id'=>'form_validation']) !!}
        <div class="card-body">
            <div class="form-group mb-8">
                <div class="alert alert-custom alert-default" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                    <div class="alert-text">
                        {{$descriptif}}
                    </div>
                </div>
            </div>
            {!!Form::validation_text_maxLength_value('identifiant', 'Identifiant',$entreprise->prefixe_chantier,50,true,6)!!}
            {!!Form::validation_text_maxLength('libelle', 'Libellé',50,true,6)!!}
            {!!Form::validation_select($clients, 'client_id', 'Client',true,4)!!}
            {!!Form::validation_date('date_debut', 'Date début',true,4)!!}
        </div>
        {!!Form::valider()!!}
    </form>
    <!--end::Form-->
</div>


@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
