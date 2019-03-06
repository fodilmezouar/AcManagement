@extends('layouts.master')
@section('content')

    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="index.html">G - Préliminaire</a>
        </li>
        <li class="breadcrumb-item">
            <span>Enseignant</span>
        </li>
    </ul>
    <!--------------------
    END - Breadcrumbs
    -------------------->

    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">
                    Data Tables
                </h6>
                <div class="element-box">
                    <h5 class="form-header">
                        Enseignants
                    </h5>
                    <div class="row">

                        <div class="col-sm-6">
                            <button class="mr-2 mb-4 btn btn-outline-info" data-target="#addEnseignant" data-toggle="modal" type="button">Download listes</button>

                        </div>

                    </div>

                    <div class="table-responsive">

                        <table id="tableEnseignant" width="100%" class="table table-striped table-lightfont">
                            <thead>
                            <tr>
                                <th>Nom</th><th>Prenom</th><th>Date Naissance</th><th>Grade</th><th>Email</th><th>Options</th></tr></thead><tfoot><tr><th>Nom</th><th>Prenom</th><th>Date Naissance</th><th>Grade</th><th>Email</th><th>Options</th></tr>
                            </tfoot><tbody>

                            </tbody></table>
                    </div>
                </div>
                <div class="floated-chat-btn" data-target="#addEnseignant" data-toggle="modal">
                    <i class="os-icon os-icon-plus"></i>
                </div>
            </div>

            <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="addEnseignant" role="dialog" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Ensignant
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form id="formValidate" action="" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <h5 class="form-header">
                                    Ajouter Ensignant
                                </h5>
                                <div id="add-ens-messages"></div>
                                <fieldset class="form-group">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Nom</label><input name="name" id="name" class="form-control" data-error="Please input your First Name" placeholder="Nom" required="required" type="text">
                                                <div class="help-block form-text with-errors form-control-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Prénom</label><input name="prenom" id="prenom" class="form-control" data-error="Please input your Last Name" placeholder="Prénom" required="required" type="text">
                                                <div class="help-block form-text with-errors form-control-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for=""> Email address</label><input name="email" id="email" class="form-control" data-error="Your email address is invalid" placeholder="Enter email" required="required" type="email">
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for=""> Image</label><input name="image" id="image" class="form-control" data-error="Inserer votre image" placeholder="Enter image"  type="file" accept=".png, .jpg, .jpeg">
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for=""> Grade</label>
                                                <select name="grade" id="grade" class="form-control">
                                                    <option>{{old('grade')}}</option>
                                                    <option>MAA</option>
                                                    <option>MAB</option>
                                                    <option>MCA</option>
                                                    <option>MCB</option>
                                                    <option>Doctorant</option>
                                                    <option>Professeur</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for=""> Date De Naissance</label><input name="dateNais" id="datenais" class="single-daterange form-control" placeholder="Date of birth" type="text" value="04/12/1978">
                                            </div>
                                        </div>
                                    </div>


                                </fieldset>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-dismiss="modal" type="button"> Fermer</button><button class="btn btn-primary" id="createEnseigantbtn" type="submit">Ajouter</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="display-type"></div>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('js/enseignant.js')}}"></script>
@endsection
