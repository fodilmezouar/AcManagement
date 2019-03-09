@extends('layouts.master',['active'=>'Enseignants'])
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


                    <div class="table-responsive">
                        <div class="remove-messagesEns"></div>
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

                                    <div class="form-group">
                                        <label for=""> Filliere</label>
                                        <select class="form-control" id="filiereModal">
                                            @foreach($modules as $module)
                                                <option value="{{$module->id}}">{{$module->libelle}}</option>
                                            @endforeach
                                        </select>
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
            <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="editEnseignantData" role="dialog" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Ensignant
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form id="formEdit" action="" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <h5 class="form-header">
                                    Modifier Ensignant
                                </h5>
                                <div id="edit-ens-messages"></div>
                                <fieldset class="form-group">

                                    <div class="row" id="body-editEnse">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Nom</label><input name="nameEdit" id="nameEdit" class="form-control" data-error="Please input your First Name" placeholder="Nom" required="required" type="text">
                                                <div class="help-block form-text with-errors form-control-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Prénom</label><input name="prenomEdit" id="prenomEdit" class="form-control" data-error="Please input your Last Name" placeholder="Prénom" required="required" type="text">
                                                <div class="help-block form-text with-errors form-control-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for=""> Email address</label><input name="emailEdit" id="emailEdit" class="form-control" data-error="Your email address is invalid" placeholder="Enter email" required="required" type="email">
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    <div class="form-group">

                                        <label for=""> Image</label><input name="imageEdit" id="imageEdit" class="form-control" data-error="Inserer votre image" placeholder="Enter image"  type="file" accept=".png, .jpg, .jpeg">

                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for=""> Grade</label>
                                                <select name="gradeEdit" id="gradeEdit" class="form-control">
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
                                                <label for=""> Date De Naissance</label><input name="dateNaisEdit" id="dateNaisEdit" class="single-daterange form-control" placeholder="Date of birth" type="text" value="04/12/1978">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" id="filiereModalEdit">
                                            @foreach($modules as $module)
                                                <option value="{{$module->id}}">{{$module->libelle}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </fieldset>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-dismiss="modal" type="button"> Fermer</button><button class="btn btn-primary" id="EditEnseigantbtn" type="submit">Modifier</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

                <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="removeEnsModal" role="dialog" tabindex="-1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content"  id="body-removeEns">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    Supprimer Ensignant
                                </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        </div>
                        <div class="modal-body" >
                            <p>Etes vous sur ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="ion-ios-trash"></i> Fermer</button>
                            <button type="button" class="btn btn-primary" id="removeEns" data-loading-text="Loading..."> <i class="ion-android-done"></i> Supprimer</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

        </div>
    </div>

    <div class="display-type"></div>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('js/enseignant.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.print.min.js"></script>
@endsection
