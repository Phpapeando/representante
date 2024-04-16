
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Seja um Representante - Sistema Traz Valor</title>
  <meta name='author' content='Sistema Traz Valor - www.sistematrazvalor.com.br'/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <link rel="icon" type="image/png" href="https://www.sistematrazvalor.com.br/imagens/icone/trazvalor.png" />


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('representante-assets/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href=" {{ asset('representante-assets/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('representante-assets/lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('representante-assets/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('representante-assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('representante-assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

  

  <meta name="csrf-token" content="{{ csrf_token() }}" >
  

  <!-- Main Stylesheet File -->
  <link href="{{ asset('representante-assets/css/style.css') }}" rel="stylesheet">

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>

  <script src="https://www.google.com/recaptcha/api.js"></script> 

  <script type="text/javascript">
    jQuery(function($){
       $("#celular").mask("(99)99999-9999");
       $("#data_nascimento").mask("99/99/9999");
       $("#cep").mask("99999-999");   
    });
    
    var $input    = document.getElementById('arquivo'),
        $fileName = document.getElementById('file-name');
    
    $input.addEventListener('change', function(){
      $fileName.textContent = this.value;
    });
    </script>
      

<script type="text/javascript">
  $(document).ready(function() {
  
      function limpa_formulário_cep() {
          // Limpa valores do formulário de cep.
          $("#endereco").val("");
          $("#bairro").val("");
          $("#cidade").val("");
          $("#uf").val("");
          $("#ibge").val("");
      }
      
      //Quando o campo cep perde o foco.
      $("#cep").blur(function() {
  
          //Nova variável "cep" somente com dígitos.
          var cep = $(this).val().replace(/\D/g, '');
  
          //Verifica se campo cep possui valor informado.
          if (cep != "") {
  
              //Expressão regular para validar o CEP.
              var validacep = /^[0-9]{8}$/;
  
              //Valida o formato do CEP.
              if(validacep.test(cep)) {
  
                  //Preenche os campos com "..." enquanto consulta webservice.
                  $("#endereco").val("...");
                  $("#bairro").val("...");
                  $("#cidade").val("...");
                  $("#uf").val("...");
                  $("#ibge").val("...");
  
                  //Consulta o webservice viacep.com.br/
                  $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
  
                      if (!("erro" in dados)) {
                          //Atualiza os campos com os valores da consulta.
                          $("#endereco").val(dados.logradouro);
                          $("#bairro").val(dados.bairro);
                          $("#cidade").val(dados.localidade);
                          $("#uf").val(dados.uf);
                          $("#ibge").val(dados.ibge);
                      } //end if.
                      else {
                          //CEP pesquisado não foi encontrado.
                          limpa_formulário_cep();
                          alert("CEP não encontrado.");
                      }
                  });
              } //end if.
              else {
                  //cep é inválido.
                  limpa_formulário_cep();
                  alert("Formato de CEP inválido.");
              }
          } //end if.
          else {
              //cep sem valor, limpa formulário.
              limpa_formulário_cep();
          }
      });
  });
  </script>


<script>
  function validaPost() {
    //Verifica se o Recaptcha foi selecionado
    if(grecaptcha.getResponse() != "") return true;
  
    alert("Preencha a caixa de Não sou um Robô");
    return false;
  }
</script>



   
  



  <!-- =======================================================
    Theme Name: BizPage
    Theme URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="" class="pull-left">
        <!--<h1><a href="#intro" class="scrollto">Sistema Traz Valor</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="#intro"><img src="{{ asset('representante-assets/img/logo-sistema-traz-valor.jpeg') }}" height="40" alt="" title="Sistema Traz Valor" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Home</a></li>
          <li><a href="#about">Sobre Nós</a></li>
          <li><a href="#call-to-action">Processo de Seleção</a></li>          
          <li><a href="#contact">Seja um Representante</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url('{{ asset('representante-assets/img/intro-carousel/3.jpg') }}');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 >Seja um representante Traz Valor</h2>
                <h4 style="color: white">Tenha sucesso profissionalmente em uma empresa<br> que vem crescendo e inovando no setor de software.</h4>
                <a href="#contact" class="btn-get-started scrollto">Inscreva-se</a>
              </div>
            </div>
          </div>
        </div>

    

          
  </section> 
  
  <!-- #intro -->

  <main id="main">

    <!--==========================
      Featured Services Section
    ============================-->
    <section id="featured-services">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 box">
            
           <!--  <i class="ion-ios-bookmarks-outline"></i> -->
            <h3 class="title"><a href="">Horários Flexíveis</a></h3>
            
            <h5 class="description" style="color: white; text-align: ">Você fará seu horário. Isso não quer dizer que trabalhará pouco ou poderá dormir até tarde, mas poderá controlar seu horário e programar caso precise, de tempo livre para ir ao médico, fazer alguma compra ou viajar com a família. Você será o dono da sua agenda e organizará seu horário de trabalho como desejar.</h5>
          </div>

          <div class="col-lg-6 box ">
            
            <h3 class="title"><a href="">O Produto</a></h3>
            
            <h5 class="description" style="color: white; text-align: ">Você terá disponível a seu favor o melhor argumento para venda junto ao seu cliente, “o produto”; a Traz Valor tem sua marca registrada por inovar e trazer produtos especiais para as necessidades do cliente.</h5>
          </div>

          <div class="col-lg-6 pt-2 box ">
            
            <h3 class="title"><a href="">Flexibilidade de Clientes</a></h3>
            
            <h5 class="description" style="color: white; text-align: ">O Sistema Traz Valor pode ser vendido para diversas clientelas: órgãos públicos, privados, grandes frotistas, entre outros.</h5>
          </div>

          <div class="col-lg-6 pt-2 box ">
            
            <h3 class="title"><a href="">Seu Salário Depende Só de Você</a></h3>
            <h5 class="description" style="color: white; text-align: ">A remuneração dos representantes será por Comissões, e só dependerá de você a quantidade de vendas que fará.</h5>
          </div>

        </div>
      </div>
    </section><!-- #featured-services -->

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        

        <div class="row about-cols">
        

          <div class="col-md-6 wow fadeInUp" >
            <div class="">
              <div class="img">
                <img src="{{ asset('representante-assets/img/foto_luis_1.jpg') }}" alt="" class="">
                
              </div>
              
            </div>
          </div>
          
          <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="" style="text-align: justify">
              
              <h2 class=""><strong>Sobre Nós</strong></h2>

              <p>O Sistema Traz Valor nasceu em 2013 com a finalidade de trazer transparência e economia para o processo de compras do setor público e privado, auxiliando no processo de compras de peças automotivas, gerenciamento de frotas e monitoramento veicular.</p>

              <p>O Sistema é dividido em três produtos, “ALL IN”, ALL MOEDA e ALL MERCA”; cada um voltado para um cliente específico, como órgãos públicos, privados: autopeças, seguradoras, frotistas, entre outros.</p>

              
              
              <h2 class=""><strong> Sobre o Proprietário</strong></h2>
              <p>Luis Ricardo de Magalhães com apenas 21 anos de idade se destacou, criando um projeto único e inovador no Brasil, registrado e patenteado como Sistema Traz Valor.</p>

              <p>Com graduação acadêmica em Arquitetura e Urbanismo e Análise de Sistemas, deixou a vida de arquiteto para desenvolver uma plataforma de sistema de gerenciamento e balizamento de preços para órgãos públicos e privados, visto que possuía uma vasta experiência por ter trabalhado com seu pai e mentor desde os 12 anos de idade no setor de autopeças.</p>

              <p>Fruto de trabalho e competência o Sistema Traz Valor coleciona alguns prêmios e exclusividades que só uma empresa inovadora e séria poderia alcançar.</p>
              
            </div>
          </div>

          

        </div>

      </div>
    </section><!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container">

        <header class="section-header wow fadeInUp">
          <h3>Características necessárias para ser um representante Traz Valor</h3>
          
        </header>

        <div class="row">

          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
                       
            <h4 class="title"><a href="#services">Bom relacionamento interpessoal:</a></h4>
            <h3 class="description">saber se relacionar positivamente com diferentes profissionais e entidades públicas e privadas. Como exemplo: gerenciar com cortesia e presteza as expectativas e interesses de um fabricante e seus consumidores quando estiver entre eles. Simpatia, cordialidade, interesse pelas necessidades do cliente, empatia, fazer networking com outros profissionais e clientes, saber quais assuntos conversar e evitar os desnecessários são alguns exemplos de qualidades para um representante.</h3>
          </div>

          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            
            <h4 class="title"><a href="#services">Poder de argumentação:</a></h4>
            <h3 class="description">argumentar não significa citar somente os benefícios de um produto ou comparar suas características com outro, mas também desenvolver um raciocínio lógico que convença o interlocutor, no caso, o cliente. Para isso, é primordial ter respeito pela opinião do cliente, saber apresentar seu entendimento e demonstrar autoridade no assunto, atualizar-se com as mudanças que ocorrem no mercado, trazer estatísticas e números que comprovem seu argumento, que, para o setor e profissionais da área, têm grande valor e potencial de convencimento.</h3>
          </div>

          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            
            <h4 class="title"><a href="#services">Aprendizado continuo:</a></h4>
            <h3 class="description">Além de se preparar para a função de representante comercial, o profissional, vindo de outro setor de negócio ou não, deve saber que sua nova área está em constante evolução. Com novas ferramentas, métodos de abordagem comercial, tecnologia de automação e venda, une seus esforços junto ao setor de marketing para otimizar suas ações e resultados.</h3><br/>
            <h3 class="description">As necessidades e comportamento dos clientes mudam a todo tempo, por isto, é essencial criar uma rotina pessoal para sua constante evolução profissional, assim, o seu o desempenho comercial será compatível com seus esforços.</h3>
          </div>

        </div>

      </div>
    </section><!-- #services -->

    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeIn">
      <div class="container ">
        <h2 class="mb-4 text-center" style="color: white;"><strong>O processo de seleção de um novo representante <br/> se da em 3 etapas:<strong></h2>
        <h4 style="text-align: justify; color: white">1º Envio de informações e documentos por parte do candidato.</h4>

         <h4 style=" color: white">2º Caso o candidato seja aceito, o setor responsável da traz valor ira entrar em contato para esclarecimentos 
          demais informações de como funciona, a venda, pagamentos, responsabilidades e entre outros.</h4>
          
          <h4 style="text-align: justify; color: white">3º Formalização do contrato entre ambas as partes.</h4>

          <div class="text-center">
            <a href="#contact" class="cta-btn" >Enviar Documentação</a>
          </div>
      </div>
    </section><!-- #call-to-action -->

        <!--==========================
      Facts Section
    ============================-->
    <section id="facts"  class="wow fadeIn">
      <div class="container">

        <header class="section-header">
          <h3>Nossos Números</h3>
          
        </header>

        <div class="row ">

  				<div class="col-lg-3 col-6 mt-2">
            
            <h1><strong data-toggle="counter-up" style="color: #18d26e">200</strong>k</h1>
            <h4>+ Peças</h4>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            
            <h1><strong data-toggle="counter-up" style="color: #18d26e">215</strong>k</h1>
            <h4>+ Pedidos</h4>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            
            <h1><strong data-toggle="counter-up" style="color: #18d26e">80</strong>k</h1>
            <h4>+ Sol. Manual</h4>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            
            <h1><strong data-toggle="counter-up" style="color: #18d26e">270</strong></h1>
            <h4>+ Clientes</h4>
  				</div>

          

  			</div>

        <div class="facts-img">
          <img src="" alt="" class="img-fluid">
        </div>

      </div>
    </section><!-- #facts -->

    <!--==========================
      Skills Section
    ============================-->
    

    <!--==========================
      Facts Section
    ============================-->
    
    <!--==========================
      Clients Section
    ============================-->
    

    <!--==========================
      Clients Section
    ============================-->
   

    <!--==========================
      Team Section
    ============================-->
    

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg ">
      <div class="container">

        <div class="section-header">

          <h3>Preencha o formulário abaixo:</h3>
          <p>E logo após prossiga para a próxima etapa, onde será solicitado algumas documentações</p>

          @if (session('success'))
          <div class="alert alert-success text-center">
            Olá {{ session('success') }}!<br>Obrigado por preencher nosso formulário.<br>Em breve entraremos em contato para mais informações...
          </div>
          @endif

          @if (session('error'))
          <div class="alert alert-danger text-center">
            {{ session('error') }}
          </div>
          @endif
         

          
          @if ($errors->any())
          <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
          </div>
          @endif

        </div>

        
        
        <div class="form">
          
          <div id="sendmessage">Your message has been sent. Thank you!</div>

          <div id="errormessage"></div>
          
          
          <form action="{{ route('representante-enviar') }}" method="POST" role="form" class="">
            @csrf
            <div class="form-row">

              <div class="form-group col-md-6">
                <input type="text" name="nome" value="{{ old('nome') }}" class="form-control" id="nome" placeholder="Nome*" required="" />
                <div class="validation"></div>
              </div>

              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="Email*" data-rule="email" required="" />
                <div class="validation"></div>
              </div>

            </div>

            <div class="form-row">

              <div class="form-group col-md-6">
                <input type="text" class="form-control" name="data_nascimento" value="{{ old('data_nascimento') }}" id="data_nascimento" placeholder="Data Nascimento *" required="" />
                <div class="validation"></div>
              </div>

              <div class="form-group col-md-6">
                <input type="text" class="form-control" name="celular" id="celular" placeholder="(99) 99999-9999 *" required="" />
                <div class="validation"></div>
              </div>

            </div>

            <div class="form-row">

              <div class="form-group col-md-4">
                <input type="text" name="cep" class="form-control" id="cep" placeholder="CEP*" required=""/>
                <div class="validation"></div>
              </div>

              <div class="form-group col-md-8">
                <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereço*" required="" />
                <div class="validation"></div>
              </div>

            </div>

            <div class="form-row">

              <div class="form-group col-md-6">
                <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro *" required="" />
                <div class="validation"></div>
              </div>

              <div class="form-group col-md-6">
                <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade *" required="" />
                <div class="validation"></div>
              </div>

            </div>

            <div class="form-group">
              <input type="text" name="complemento" class="form-control" id="complemento" placeholder="Complemento" />
              <div class="validation"></div>
            </div>

            

            

              <div class="form-group">
                <label>Me conte um pouco sobre você: *</label>
                <input type="text" name="resposta-1" class="form-control" id="resposta-1" required="" />
                <div class="validation"></div>
              </div>

              <div class="form-group">
                <label>Me conte um pouco sobre sua trajetória profissional: *</label>
                <input type="text" name="resposta-2" class="form-control" id="resposta-2" required=""/>
                <div class="validation"></div>
              </div>

              <div class="form-group">
                <label>O que você almeja para sua carreira em médio prazo? *</label>
                <input type="text" name="resposta-3" class="form-control" id="resposta-3" required="" />
                <div class="validation"></div>
              </div>

              <div class="form-group">
                <label>Como você se descreveria? *</label>
                <input type="text" name="resposta-4" class="form-control" id="resposta-4" required="" />
                <div class="validation"></div>
              </div>

              <div class="form-group">
                <label>O que te interessou nessa oportunidade? *</label>
                <input type="text" name="resposta-5" class="form-control" id="resposta-5" required="" />
                <div class="validation"></div>
              </div>


              <!--
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>RG/CNH</label><br/>
                <label for="arquivo" class="btn btn-default"><i class="fa fa-cloud-upload"></i> <strong>JPG/PNG/PDF</strong></label>
                <input id="arquivo" type='file' class="input" name="arquivo[]" >
                <span id='file-name'></span>
              </div>
              <div class="form-group col-md-4">
                  <label>CPF</label><br/>
                  <label for="arquivo1" class="btn btn-default"><i class="fa fa-cloud-upload"></i> <strong>JPG/PNG/PDF</strong></label>
                  <input id="arquivo1" type='file' class="input" name="arquivo[]" >
              </div>
              <div class="form-group col-md-4">
                  <label>Comprovante de Endereço</label><br/>
                  <label for="arquivo2" class="btn btn-default"><i class="fa fa-cloud-upload"></i> <strong>JPG/PNG/PDF</strong></label>
                  <input id="arquivo2" type='file' class="input" name="arquivo[]" >
              </div>
            </div>
          -->

            <div class="form-group">
              <label>Me conte um pouco sobre seu conhecimento na área comercial</label>
              <input type="text" name="conhecimento" class="form-control" id="conhecimento"/>
              <div class="validation"></div>
            </div>

            <div class="form-group">
              <label>Me conte um pouco sobre a estrutura de sua empresa, quantos funcionários, etc</label>
              <input type="text" name="funcionarios" class="form-control" id="funcionarios"/>
              <div class="validation"></div>
            </div>

            <div class="form-group">
              <label>Me informe no minimo 3 referênciais comerciais</label>
              <input type="text" name="referencia-1" class="form-control" id="referencia-1" placeholder="Referência 1" /><br>
              <input type="text" name="referencia-2" class="form-control" id="referencia-2" placeholder="Referência 2" /><br>
              <input type="text" name="referencia-3" class="form-control" id="referencia-3" placeholder="Referência 3" /><br>
              <div class="validation"></div>
            </div>

           
          
            

            <br><br><h4 style="text-align: center;">A Traz Valor compromete-se a manter sigilo das informações recebidas confidenciais a que tiver acesso, utilizando somente para fins de analise do processo.</h4>

            <!--
            <div class="form-group col-md-4">
              <div class="g-recaptcha" data-sitekey="6LeGpLIbAAAAANuf0S_vmnUiLVPVaARKI9r9TieF"></div>
            </div>
          -->


          
            <div class="text-center"><button type="submit">Próxima Etapa</button></div>

          </form>
        </div>

       

       


     

      </div>
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    
      <div class="container">
        <div class="row">

          

          

          

          

        </div>
      </div>
    

      <div class="container">
        <div class="credits mt-5">
          <p> Copyright &copy;2024  Sistema Traz Valor. Todos os direitos reservados</p>
        </div>
  
        <!--<div class="credits">
          
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
          
         Best <a href="https://bootstrapmade.com/">Bootstrap Templates</a> by BootstrapMade 
        </div> -->
  
      </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  

  <!-- JavaScript Libraries -->
  
  <script src="{{ asset('representante-assets/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('representante-assets/lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('representante-assets/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('representante-assets/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('representante-assets/lib/superfish/hoverIntent.js') }}"></script>
  <script src="{{ asset('representante-assets/lib/superfish/superfish.min.js') }}"></script>
  <script src="{{ asset('representante-assets/lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('representante-assets/lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ asset('representante-assets/lib/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('representante-assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('representante-assets/lib/isotope/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('representante-assets/lib/lightbox/js/lightbox.min.js') }}"></script>
  <script src="{{ asset('representante-assets/lib/touchSwipe/jquery.touchSwipe.min.js') }}"></script>

  

  

  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('representante-assets/contactform/contactform.js') }}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset('representante-assets/js/main.js') }}"></script>

  
  

</body>

  

</html>



