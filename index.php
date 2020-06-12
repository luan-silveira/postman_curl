<?php

require_once 'autoload.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="app/css/app.css">
    <script src="app/js/app.js"></script>

    <title>Postman cURL - PHP</title>
</head>

<body>
    <div class="container">
        <div class="header jumbotron">
            <div class="title">
                <h4>Postman cURL</h4>
                <h6>Requisições HTTP via PHP</h6>
            </div>
            <label>Requisição: </label>
            <div class="card">
                <form>
                    <div class="form-group">
                        <div class="card-body row">
                            <div class="col-md-2">
                                <select class="form-control" name="method" id="method">
                                    <option>GET</option>
                                    <option>POST</option>
                                    <option>PUT</option>
                                    <option>DELETE</option>
                                </select>
                            </div>
                            <div class="col-md -9">
                                <input required class="form-control" type="text" placeholder="Digite o URL" name="url" id="url">
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-primary" type="submit">Enviar</button>
                            </div>

                        </div>
                    </div>

                    <div class="request-data">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#headers" data-toggle="tab" class="nav-link active">Cabeçalho (Headers)</a>
                            </li>
                            <li class="nav-item">
                                <a href="#body" data-toggle="tab" class="nav-link">Corpo da Requisição</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="headers">
                                <table style="margin-top: 15px;" class="table table-bordered" data-name="header">
                                    <thead style="font-size: 8pt;">
                                        <tr>
                                            <th style="width: 30px;" scope="col"></th>
                                            <th scope="col">CHAVE</th>
                                            <th style="border-right: none" scope="col">VALOR</th>
                                            <th style="width: 20px; border-left: none" scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-row">
                                            <th scope="col" style="text-align: center; vertical-align: middle">
                                                <input class="check" type="checkbox" style="display: none;" name="header-check[]">
                                            </th>
                                            <td class="td-key">
                                                <input class="form-control form-control-sm input-key" type="text" name="header-key[]" placeholder="Chave">
                                            </td>
                                            <td class="td-value">
                                                <input class="form-control form-control-sm input-value" type="text" name="header-key[]" placeholder="Valor">
                                            </td>
                                            <td class="td-delete">
                                                <a href="#" class="btn-delete" style="display: none;"><img class="img-delete"></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="body">
                                <div class="form-group" id="request-body" style="padding: 10px">
                                    <div class="form-check form-check-inline">
                                        <input type="radio" data-target="#tab-none" checked class="form-check-input" name="type" id="type1" value="0">
                                        <label for="type1" class="form-check-label">nenhum</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" data-target="#tab-raw" class="form-check-input" name="type" id="type2" value="1">
                                        <label for="type2" class="form-check-label">texto (raw)</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" data-target="#tab-url" class="form-check-input" name="type" id="type3" value="2">
                                        <label for="type3" class="form-check-label">x-www-form-urlencoded</label>
                                    </div>

                                    <div class="tab-content" style="margin-top: 10px;">
                                        <div class="tab-pane active" id="tab-none"></div>
                                        <div class="tab-pane" id="tab-raw">
                                            <div class="form-group">
                                                <select class="form-control" name="raw-type" id="raw-type" style="width: 100px;">
                                                    <option value="TEXT">Texto</option>
                                                    <option>JSON</option>
                                                    <option>XML</option>
                                                    <option>HTML</option>
                                                </select>
                                            </div>
                                            <div class="code-editor" id="raw-editor" style="margin-top: 10px;"></div>
                                        </div>
                                        <div class="tab-pane" id="tab-url">
                                            <table style="margin-top: 15px;" class="table table-bordered" data-name="body">
                                                <thead style="font-size: 8pt;">
                                                    <tr>
                                                        <th style="width: 30px;" scope="col"></th>
                                                        <th scope="col">CHAVE</th>
                                                        <th style="border-right: none" scope="col">VALOR</th>
                                                        <th style="width: 20px; border-left: none" scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="table-row">
                                                        <th scope="col" style="text-align: center; vertical-align: middle">
                                                            <input class="check" type="checkbox" style="display: none;" name="header-check[]">
                                                        </th>
                                                        <td class="td-key">
                                                            <input class="form-control form-control-sm input-key" type="text" name="header-key[]" placeholder="Chave">
                                                        </td>
                                                        <td class="td-value">
                                                            <input class="form-control form-control-sm input-value" type="text" name="header-key[]" placeholder="Valor">
                                                        </td>
                                                        <td class="td-delete">
                                                            <a href="#" class="btn-delete" style="display: none;"><img class="img-delete"></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <label style="margin-top: 15px">Resposta:</label>
            <div class="card">
                <div class="card-body">
                    <div id="no-response">
                        <span>Clique em <b>Enviar</b> para exibir a resposta do servidor</span>
                    </div>
                    <div id="overlay"  style="display: none;">
                        <div class="overlay-group">
                            <img src="app/img/loader.gif">
                            <p>Enviando requisição...</p>
                        </div>

                    </div>
                    <div id="response"  style="display: none;">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#response-raw" data-toggle="tab" class="nav-link active">Somente Texto (Raw)</a>
                            </li>
                            <li class="nav-item">
                                <a href="#preview" data-toggle="tab" class="nav-link">Preview</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="response-raw">
                                <div class="code-editor">
                                    <pre>dsfsdfsdf</pre>
                                </div>
                            </div>
                            <div class="tab-pane" id="response-preview">
                                <iframe id="frame-response" src="about:blank" frameborder="0" style="width: 100%; height: 400px;"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

<link rel="stylesheet" href="app/plugins/codemirror/lib/codemirror.css">
<script src="app/plugins/codemirror/lib/codemirror.js"></script>
<script src="app/plugins/codemirror/mode/javascript/javascript.js"></script>
<script src="app/plugins/codemirror/mode/xml/xml.js"></script>
<script>
  

    $(function(){
        $('#url').focus();
    })
</script>

</html>