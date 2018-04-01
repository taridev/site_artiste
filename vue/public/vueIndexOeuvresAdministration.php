<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include("include/head.php"); ?>
</head>

<body>
    <?php 
        
    include("include/header.php"); 
    if( isset($messages) && count($messages)>0 ) { ?>
    <div class="alert alert-success">
        <ul>
            <?php foreach( $messages as $message ) { ?>
            <li>
                <?php print $message; ?>
            </li>
            <?php } ?>
        </ul>

    </div>
    <?php }

    if( isset($errors) && count($errors)>0 ) { ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach( $errors as $error ) { ?>
            <li>
                <?php print $error; ?>
            </li>
            <?php } ?>
        </ul>
    </div>
    <?php } ?>


    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h4>Bootstrap Snipp for Datatable</h4>
                <div class="table-responsive">

                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" id="checkall" />
                                </th>
                                <th>Id</th>
                                <th>titre</th>
                                <th>année</th>
                                <th>technique</th>
                                <th>support</th>
                                <th>largeur</th>
                                <th>hauteur</th>
                                <th>prix</th>
                                <th>petiteImage</th>
                                <th>grandeImage</th>

                                <th>options</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach( $lesOeuvres as $ligne ) print $ligne->toTableRow(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="12" style="display: flex; justify-content: space-around;">
                                    <button data-title=\"Nouveau\" id="add" class="btn-add btn btn-primary btn-xs" data-toggle="modal" data-target="#new">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </button>
                                    <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete-multiple" id="multiple-delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </td>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>

        <!-- ADD -->
        <div class="modal fade" id="new" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                        <h4 class="modal-title custom_align" id="Heading-new">Ajoute d'une oeuvre</h4>
                    </div>

                    <form action="indexSwitch.php?indexOeuvresAdministration=1" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="titre">Titre:</label>
                                <input type="text" class="form-control" name="titre" id="titre-new">
                            </div>
                            <div class="form-group">
                                <label for="technique">Technique:</label>
                                <input type="text" class="form-control" name="technique" id="technique-new">
                            </div>
                            <div class="form-group">
                                <label for="support">Support:</label>
                                <input type="text" class="form-control" name="support" id="support-new">
                            </div>
                            <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-content: stretch;">
                                <div class="form-group">
                                    <label for="largeur">Largeur:</label>
                                    <input type="text" class="form-control" name="largeur" id="largeur-new">
                                </div>
                                <div class="form-group">
                                    <label for="hauteur">Hauteur:</label>
                                    <input type="text" class="form-control" name="hauteur" id="hauteur-new">
                                </div>
                                <div class="form-group">
                                    <label for="annee">Annee:</label>
                                    <input type="text" class="form-control" name="annee" id="annee-new">
                                </div>
                                <div class="form-group">
                                    <label for="fileToUpload">Image:</label>
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                </div>
                                <div class="form-group">
                                    <label for="prix">Prix:</label>
                                    <input type="text" class="form-control" name="prix" id="prix-new">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer ">
                            <input type="submit" class="btn btn-primary btn-lg" style="width: 100%;" name="create" value="Nouveau">
                        </div>

                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- FIN ADD -->


        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                        <h4 class="modal-title custom_align" id="Heading">Edition de l'oeuvre</h4>
                    </div>

                    <form action="indexSwitch.php?indexOeuvresAdministration=1" method="post">
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="titre">Titre:</label>
                                <input type="text" class="form-control" name="titre" id="titre">
                            </div>
                            <div class="form-group">
                                <label for="technique">Technique:</label>
                                <input type="text" class="form-control" name="technique" id="technique">
                            </div>
                            <div class="form-group">
                                <label for="support">Support:</label>
                                <input type="text" class="form-control" name="support" id="support">
                            </div>
                            <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-content: stretch;">
                                <div class="form-group">
                                    <label for="largeur">Largeur:</label>
                                    <input type="text" class="form-control" name="largeur" id="largeur">
                                </div>
                                <div class="form-group">
                                    <label for="hauteur">Hauteur:</label>
                                    <input type="text" class="form-control" name="hauteur" id="hauteur">
                                </div>
                                <div class="form-group">
                                    <label for="annee">Annee:</label>
                                    <input type="text" class="form-control" name="annee" id="annee">
                                </div>
                                <div class="form-group">
                                    <label for="prix">Prix:</label>
                                    <input type="text" class="form-control" name="prix" id="prix">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer ">
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="petiteImage" id="petiteImage">
                            <input type="hidden" name="grandeImage" id="grandeImage">
                            <input type="submit" class="btn btn-warning btn-lg" style="width: 100%;" name="update" value="Mettre à jour">

                        </div>

                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>



        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                        <h4 class="modal-title custom_align" id="Heading-delete">Suppression de l'oeuvre</h4>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-danger">
                            <span class="glyphicon glyphicon-warning-sign"></span>&nbsp;Êtes vous sûr de vouloir supprimer cette oeuvre ?</div>

                    </div>
                    <div class="modal-footer ">
                        <form action="indexSwitch.php?indexOeuvresAdministration=1" method="post" id="delete-form">
                            <input type="hidden" name="id" id="id-delete">
                            <button type="submit" form="delete-form" name="delete" class="btn btn-success">
                                <span class="glyphicon glyphicon-ok-sign"></span>&nbsp;Oui</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                <span class="glyphicon glyphicon-remove"></span>&nbsp;Non</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="delete-multiple" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                        <h4 class="modal-title custom_align" id="Heading-delete-multiple">Suppression Multiple</h4>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-danger">
                            <span class="glyphicon glyphicon-warning-sign"></span>&nbsp;Êtes vous sûr de vouloir supprimer ces oeuvres ?</div>

                    </div>
                    <div class="modal-footer ">
                        <form action="indexSwitch.php?indexOeuvresAdministration=1" method="post" id="delete-multiple-form">
                            <div id="delete-ids" style="display: none;">
                            
                            </div>
                            <button type="submit" form="delete-multiple-form" name="delete-multiple" class="btn btn-success">
                                <span class="glyphicon glyphicon-ok-sign"></span>&nbsp;Oui</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                <span class="glyphicon glyphicon-remove"></span>&nbsp;Non</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>


    </div>

    <script>
        $(document).ready(function () {
            // Réaction au click sur le checkbox checkall
            $("#mytable #checkall").click(function () {
                // Si on "check" on "check" tous les éléments
                if ($("#mytable #checkall").is(':checked')) {
                    $("#mytable input[type=checkbox]").each(function () {
                        $(this).prop("checked", true);
                    });
                // Sinon on "uncheck" tout
                } else {
                    $("#mytable input[type=checkbox]").each(function () {
                        $(this).prop("checked", false);
                    });
                }
            });

            // Réaction au click sur delete-multiple
            $('#multiple-delete').click(function () {
                html = '';
                // Pour chaque element checked: on ajoute le checkbox correspondant 
                // dans le formulaire de la boite modale correspondante
                $('[name=ids]:checked').each(function() {
                    html += '<input type="checkbox" name="ids[]" value="'+ $(this).val() +'" checked>';
                });
                console.log(html);
                $('#delete-ids').html(html);
            });

            // Réaction au click sur un bouton "delete-single"
            $('button[id^=delete-]').click(function () {
                // on parse l'id du bouton pour obtenir l'id de la ligne
                var id = parseInt($(this).attr('id').split('-')[1]);
                // on attribue cette id à la valeur de l'input:hidden
                // de la modale correspondante
                $('#id-delete').val(id);
            });

            // Réaction au click sur un bouton "edit-single"
            $('[id^=edit-]').click(function () {
                // on parse l'id du bouton pour obtenir l'id de la ligne
                var id = parseInt($(this).attr('id').split('-')[1]);
                // On renseigne la valeur de chaque champ par la valeur
                // qui lui correspond aux valeurs de la ligne du tableau
                $('#titre').val($('[id=titre-' + id + ']').text());
                $('#technique').val($('[id=technique-' + id + ']').text());
                $('#support').val($('[id=support-' + id + ']').text());
                $('#largeur').val($('[id=largeur-' + id + ']').text());
                $('#hauteur').val($('[id=hauteur-' + id + ']').text());
                $('#annee').val($('[id=annee-' + id + ']').text());
                $('#prix').val($('[id=prix-' + id + ']').text());
                $('#id').val($('[id=id-' + id + ']').text());
                $('#petiteImage').val($('[id=petiteImage-' + id + ']').attr('src').split('/')[1]);
                $('#grandeImage').val($('[id=grandeImage-' + id + ']').attr('src').split('/')[1]);
            });

            // Création des tooltips
            $('[data-toggle=tooltip]').tooltip();
        });
    </script>
</body>

</html>