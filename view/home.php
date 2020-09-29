<!DOCTYPE html>
<html>

<head>
    <title>Formulário de Contato</title>
    <?php include('includes/css_files.html'); ?>
</head>

<body>
    <header>
        <?php include('includes/header.html'); ?>
    </header>

    <section class="container">
        <div class="row">
            <div class="col-12">
                <h1>Formulário de contato</h1>
            </div>
        </div>
        <form action="?action=store" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6">
                    <label for="name">Nome</label>
                    <input class="form-control" type="text" name="name" id="name" required maxlength="255">
                </div>
                <div class="col-6">
                    <label for="email">E-mail</label>
                    <input class="form-control" type="email" name="email" id="email" required maxlength="255">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="telefone">Telefone</label>
                    <input class="form-control" type="tel" name="telefone" id="telefone" required maxlength="255">
                </div>
                <div class="col-6">
                    <label for="file">Anexo</label>
                    <input class="form-control" type="file" name="file" id="file" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="message">Mensagem</label>
                    <textarea class="form-control" name="message" id="message" rows="7"></textarea>
                </div>
            </div>
            <div class="row py-5">
                <div class="col-12">
                    <center><input class="btn btn-success btn-lg center" type="submit" value="Enviar"></center>
                </div>
            </div>
        </form>
    </section>

    <footer>
        <?php include('includes/footer.html'); ?>
    </footer>
    <?php include('includes/js_files.html'); ?>
</body>

</html>