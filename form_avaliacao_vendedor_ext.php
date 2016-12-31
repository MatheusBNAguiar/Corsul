<?php
session_start();
require_once 'functions/process_user_login.php';
send_to_the_right_place("ger");
if(isset($_POST['get_out'])){
    destroy_session_and_data();
}

require_once 'functions/show_areas_that_can_be_used.php';
require_once('functions/process_and_send_form_data.php');
if(isset($_POST['enviar_formulario'])&& isset($_POST['avaliado_name'])){
        $espaco    = " ";
        $travessao = "-";
        $data_aleatoria="03";

        $id_manager  = $_SESSION['ID'];
        $id_worker   = $_POST['avaliado_name'];
        $date        = "{$_POST['ano_envio']}{$travessao}{$_POST['mes_envio']}{$travessao}{$data_aleatoria}";


        $preparacao    ="{$_POST['question1_1'] }{$espaco}{$_POST['question2_1'] }{$espaco}{$_POST['question3_1'] }{$espaco}{$_POST['question4_1'] }{$espaco}";
        $abordagem ="{$_POST['question1_2'] }{$espaco}{$_POST['question2_2'] }";
        $necessidades ="{$_POST['question1_3'] }{$espaco}{$_POST['question2_3'] }{$espaco}{$_POST['question3_3'] }{$espaco}{$_POST['question4_3'] }";
        $proposta ="{$_POST['question1_4'] }{$espaco}{$_POST['question2_4'] }{$espaco}{$_POST['question3_4'] }";
        $negociacao ="{$_POST['question1_5'] }{$espaco}{$_POST['question2_5'] }{$espaco}{$_POST['question3_5'] }";
        $finalizacao ="{$_POST['question1_6'] }{$espaco}{$_POST['question2_6'] }{$espaco}{$_POST['question3_6'] }";

        $money="{$_POST['meta_money']}{$espaco}{$_POST['faturamento_money']}";
        $comentario = $_POST['comentario'];
        $area= $_POST['area_de_trabalho'];
        add_data($area,$id_manager,$id_worker,$date,$preparacao,$abordagem,$necessidades,$proposta,$negociacao,$finalizacao,$money,$comentario);
    }
    ?>
<html lang="pt-br">
<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

	    <title>Login</title>
	    <link type="text/css" rel="stylesheet" href="templates/style_structure_of_pages.css">
        <link type="text/css" rel="stylesheet" href="templates/style_avaliacoes_create.css">
	    <link type="text/css" rel="stylesheet" href="templates/font-awesome-4.5.0/css/font-awesome.min.css">
	    <link type="text/css" rel="stylesheet" href="templates/bootstrap-3.3.6-dist/css/bootstrap.min.css">
	</head>
	<body>
        <div class="container-fluid row">
          <?php show_correct_bars($_SESSION['Cargo']);?>
                    <div class="col-md-10 col-xs-12 content ">
                        <h2>Avaliação Performance Vendedores Externos</h2>
                        <form method="post" action="">
                            <input type="hidden" value="vendedor_ext" name="area_de_trabalho">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-md-6 col-xs-12 pergunta">
                                        <p>Nome do Avaliado</p>
                                        <div class="col-xs-12 ">
                                            <select name="avaliado_name" class="form-control">
                                                <?php get_workers("vendedor_ext",$_SESSION['ID']);?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xs-12 pergunta">
                                        <p>Nome do Gestor</p>
                                        <p><?php echo $_SESSION['Nome'];?></p>
                                    </div>

                                    <div class=" col-xs-12 col-md-6 pergunta">
                                        <p>Mês</p>
                                        <div class="col-xs-12 col-sm-6 ">

                                            <select name="mes_envio" class="form-control">
                                                <option value="01">Jan</option>
                                                <option value="02">Fev</option>
                                                <option value="03">Mar</option>
                                                <option value="04">Abr</option>
                                                <option value="05">Mai</option>
                                                <option value="06">Jun</option>
                                                <option value="07">Jul</option>
                                                <option value="08">Ago</option>
                                                <option value="10">Set</option>
                                                <option value="09">Out</option>
                                                <option value="11">Nov</option>
                                                <option value="12">Dez</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class=" col-xs-12 col-md-6 pergunta">
                                        <p>Ano</p>
                                        <div class="col-xs-12 col-sm-6">
                                            <input name="ano_envio" type="number" min="2000" max="2999" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">Preparação e Planejamento</div>
                                <div class="panel-body">

                                    <div class="col-xs-12 pergunta">
                                        <p>1. Planejou as ligações do dia? Organiza bem o tempo?</p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question1_1" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>2. Analisa o histórico do cliente antes da ligação?</p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question2_1" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>3. Leu algum artigo de vendas essa semana? </p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question3_1" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>4. Demonstrou interesse e curiosidade em conhecer melhor os clientes que atendeu?</p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question4_1" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>



                                </div>

                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">Abordagem</div>
                                <div class="panel-body">

                                    <div class="col-xs-12 pergunta">
                                        <p>1. A saudação foi feita com energia? Cumprimentou o cliente? </p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select  name="question1_2" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>2. Se apresentou de forma clara? Percebe-se sorriso na voz? </p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question2_2" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>

                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">Levantamento de necessidades </div>
                                <div class="panel-body">

                                    <div class="col-xs-12 pergunta">
                                        <p>1.Você descobriu pelo menos 3 das 8 principais informações usando a metolologia SEPAPIAG: Situação, Expectativas, Problemas, Aprofundamento, Preocupações, Irritadores, Alternativos e Ganhos?  </p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select  name="question1_3" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>2. Alternou entre perguntas abertas e fechadas?</p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question2_3" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>3. Fez as perguntas de acordo com as respostas que foram dadas pelo cliente? </p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question3_3" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>4. Fez as perguntas suficientes pra entender as necessidades do cliente? </p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question4_3" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>



                                </div></div>

                            <div class="panel panel-default">
                                <div class="panel-heading">Proposta de Valor </div>
                                <div class="panel-body">

                                    <div class="col-xs-12 pergunta">
                                        <p>1. Você focou mais em benefícios do que em características do produto? </p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select  name="question1_4"class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>2. Evitou a discussão sobre preço no momento errado? Você mostrou benefícios em detrimento de descontos? </p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question2_4"class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>3. Demonstrou conhecimento de produtos e serviços? Tentou implantar novo produto no cliente? </p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question3_4"class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">Negociação </div>
                                <div class="panel-body">

                                    <div class="col-xs-12 pergunta">
                                        <p>1. Evitou levar a orçamento a somente uma discussão sobre preços? </p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select  name="question1_5"class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>2. Antes de refazer um orçamento, buscou incluir mais itens na proposta? Ao ouvir objeções fez perguntas? </p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question2_5"class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>3. Tentou implantar mais itens na proposta? </p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question3_5"class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">Fechamento</div>
                                <div class="panel-body">

                                    <div class="col-xs-12 pergunta">
                                        <p>1. Buscou o fechamento da proposta? </p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select  name="question1_6"class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>2. Agendou com cliente retorno para orçamento? Deu data limite para o orçamento? </p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question2_6"class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>3. Sabe sua taxa de conversão ou positivação de orçamentos?  </p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question3_6"class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="panel panel-default">
                                <div class="panel-body">

                                <div class="col-xs-12 col-md-6">
                                    <p>Meta</p>
                                    <input type="number" class="form-control" name="meta_money">
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <p>Faturamento</p>
                                    <input type="number" class="form-control" name="faturamento_money">
                                </div><div class="col-xs-12">
                                    <p>Comentários</p>
                                    <textarea name="comentario"class="form-control" rows="4">


                                    </textarea>

                                    </div>
                                    <button class="btn btn-primary" name="enviar_formulario">Confirmar Envio</button>
                                    </div>



                            </div>
                        </form>





                    </div>
                </div>
            </div>


        </div>


            </div>
        </div>
	</body><?php show_footer();?>
</html>
