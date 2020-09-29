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
        <div class="row py-4">
            <div class="col-12">
                <center>
                    <?php if (isset($_GET['success'])) : ?>
                        <h2>Contato Salvo com Sucesso</h2>
                    <?php elseif (isset($_GET['fail'])) : ?> 
                        <h2>Falha ao Salvar Contato</h2>
                    <?php elseif (isset($_GET['failEmail'])) : ?>
                        <h2>Falha ao Enviar Email</h2>
                    <?php elseif (isset($_GET['failUpload'])) : ?>
                        <h2>Falha ao Salvar Anexo</h2>
                    <?php endif; ?>

                    <a href="?action=home" class="btn btn-success btn-lg">Voltar</a>
                </center>
            </div>
        </div>
    </section>
    <footer>
        <?php include('includes/footer.html'); ?>
    </footer>
    <?php include('includes/js_files.html'); ?>
</body>

</html>