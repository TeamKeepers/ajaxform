<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AJAX | Formulaire</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

    <section id="result">
    </section>

    <section class="container col-6">
        <form method="post" action="insert_company.php" id="insert_company">
            <div class="form-group">
                <label for="firstname">Prénom</label>
                <input type="text" class="form-control" id="firstname" name="firstname">
                <div class="invalid-feedback">
                    Veuillez renseigner votre prénom.
                </div>
            </div>
            <div class="form-group">
                <label for="lastname">Nom</label>
                <input type="text" class="form-control" id="lastname" name="lastname">
                <div class="invalid-feedback">
                    Veuillez renseigner votre nom.
                </div>
            </div>
            <div class="form-group">
                <label for="gender">Sexe</label>
                <select class="form-control" id="gender" name="gender">
                    <option value="m">Homme</option>
                    <option value="f">Femme</option>
                </select>
            </div>
            <div class="form-group">
                <label for="department">Département</label>
                <input type="text" class="form-control" id="department" name="department">
            </div>
            <div class="form-group">
                        <label for="recruitment_date" class="col-form-label">Date de recrutement</label>
                        <input class="form-control" type="date" name="recruitment_date" id="recruitment_date">
                    </div>
            <div class="form-group">
                <label for="salary">Salaire</label>
                <input type="text" class="form-control" id="salary" name="salary">
                <div class="invalid-feedback">
                    Veuillez renseigner votre salaire.
                </div>
            </div>
            <button type="submit" class="btn btn-primary" id="submit">Inscription</button>
            <!-- EN FIN DE PROJET, NE LAISSER QU'UN BOUTON EN DUPLIQUANT ID VERS TYPE SUBMIT
            <button type="button" class="btn btn-warning" id="submit">Inscription (AJAX)</button> -->
            <span id="spinner">
                <img src="spinner.gif" width="50" height="50">
            </span>
        </form>
    </section>
    
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="assets/js/ajax.js"></script>
</body>
</html>