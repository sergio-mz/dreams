<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DREAMS GLAMPING</title>
    <link
      rel="stylesheet"
      href="./css/bootstrap.min.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./css/styles.css" />
        <!-- Enlace al archivo CSS personalizado -->
        

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- ANIMACIONES EXTRA -->

    <style>
      .logo {
        width: 150px; /* Ajusta el ancho del logo según tus necesidades */
        /* height: auto; Ajusta la altura del logo según tus necesidades */
        margin-left: 27%;
      }
    </style>
  </head>
  <body>
    <!-- Encabezado  -->
    <header>
      <br />
      <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <p class="titulo">DREAMS GLAMPING</p>
          </div>
          <div class="col-sm-3">
            <img
              src="./img/logo.png"
              alt="Logo del Hotel Glamping"
              class="logo"
            />
          </div>
        </div>
      </div>
    </header>

    <!-- Menú desplegable -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#"></a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#quienes-somos">Quienes Somos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#domos">Domos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#planes">Planes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#servicios">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contacto">Contactenos</a>
          </li>
        </ul>
        <a class="btn btn-primary ml-auto" href="{{route('home')}}">INGRESAR</a>
      </div>
    </nav>

    <!-- Slider de imágenes -->
    <div
      id="carouselExampleSlidesOnly"
      class="carousel slide"
      data-ride="carousel"
    >
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./img/slide1.jpg" class="d-block w-100" alt="Imagen 1" />
        </div>
        <div class="carousel-item">
          <img src="./img/slide2.jpg" class="d-block w-100" alt="Imagen 2" />
        </div>
        <div class="carousel-item">
          <img src="./img/slide3.jpg" class="d-block w-100" alt="Imagen 3" />
        </div>
        <div class="carousel-item">
          <img src="./img/slide4.jpg" class="d-block w-100" alt="Imagen 3" />
        </div>
        <div class="carousel-item">
          <img src="./img/slide5.jpg" class="d-block w-100" alt="Imagen 3" />
        </div>
        <div class="carousel-item">
          <img src="./img/slide6.jpg" class="d-block w-100" alt="Imagen 3" />
        </div>
      </div>
    </div>

    <!-- Sección Quienes Somos -->
    <section id="quienes-somos">
      <div class="container">
        <h2>Quienes Somos</h2>
        <br />
        <p>
          En el Hotel Glamping, nos enorgullece ofrecerte una experiencia única
          de alojamiento en medio de la naturaleza. Ubicados en un entorno
          impresionante, nuestro objetivo es brindarte comodidad, lujo y
          aventura en un solo lugar.
        </p>
        <p>
          Nuestro glamping combina la belleza del camping con las comodidades y
          el estilo de un hotel de primera categoría. Cada una de nuestras
          habitaciones en forma de domos ha sido cuidadosamente diseñada para
          proporcionarte el máximo confort y privacidad, sin comprometer la
          conexión con la naturaleza que nos rodea.
        </p>
        <p>
          Además de nuestros alojamientos excepcionales, ofrecemos una amplia
          gama de actividades para que disfrutes durante tu estancia. Desde
          emocionantes caminatas y paseos a caballo, hasta relajantes sesiones
          de spa y yoga al aire libre, siempre encontrarás algo que se ajuste a
          tus gustos y preferencias.
        </p>
        <p>
          En el Hotel Glamping, nos esforzamos por brindarte un servicio
          personalizado y atención al detalle. Nuestro amable personal estará
          encantado de ayudarte en todo momento y asegurarse de que tu
          experiencia sea inolvidable.
        </p>
      </div>
    </section>

    <!-- Sección Domos -->
    <section id="domos">
      <div class="container"  data-aos="flip-left">
        <h2>Domos</h2>
        <br />
        <div class="row">
          <div class="col-md-4"data-aos="fade-up" >
            <h3>Domos de Lujo</h3>
            <br />
            <p>
              Disfruta de una experiencia de lujo en nuestros domos exclusivos.
              Estos espaciosos domos están equipados con todas las comodidades
              que puedas imaginar. Con un diseño elegante y moderno, ofrecen
              vistas panorámicas impresionantes de la naturaleza circundante.
              Relájate y sumérgete en la tranquilidad de nuestro entorno
              mientras te entregamos un servicio de primera categoría.
            </p>
            <img src="./img/d_lujo.jpg" alt="Domo de Lujo" class="img-fluid" data-aos="fade-up"/>
            <br /><br />
          </div>
          <div class="col-md-4" data-aos="fade-up">
            <h3>Domos Familiares</h3>
            <br />
            <p>
              Vive momentos inolvidables con tu familia en nuestros domos
              familiares. Estos domos están diseñados para ofrecer el máximo
              confort y espacio para todos. Con amplias áreas de descanso y un
              ambiente acogedor, proporcionan el entorno perfecto para compartir
              tiempo de calidad en familia. Además, ofrecemos una variedad de
              actividades divertidas para niños y adultos.
            </p>
            <img
              src="./img/d_familiar.jpg"
              alt="Domo Familiar"
              class="img-fluid"
              data-aos="fade-up"
            />
            <br /><br />
          </div>
          <div class="col-md-4" data-aos="fade-up">
            <h3>Domos Temáticos</h3>
            <br />
            <p>
              Sumérgete en un mundo de fantasía y aventura en nuestros domos
              temáticos. Cada uno de estos domos está cuidadosamente decorado y
              diseñado para ofrecerte una experiencia única y especial. Puedes
              elegir entre diferentes temas, como la selva, el desierto o la
              playa, cada uno con su propio estilo y ambiente. Descubre un nuevo
              nivel de relajación y diversión mientras te sumerges en la magia.
            </p>
            <img
              src="./img/d_tematico.jpg"
              alt="Domo Temático"
              class="img-fluid"
              data-aos="fade-up"
            />
          </div>
        </div>
      </div>
    </section>

    <!-- Sección "Servicios" -->
    <section id="servicios"data-aos="fade-up-left">
      <div class="container">
        <h2>Servicios</h2>
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <img
                src="./img/s_caminata.jpg"
                class="card-img-top"
                alt="Caminatas"
                data-aos="fade-up-left"
              />
              <div class="card-body">
                <h3 class="card-title">Caminatas</h3>
                <p class="card-text text-justify" >
                  Explora los hermosos senderos naturales que nos rodean con
                  nuestras emocionantes rutas de caminatas. Descubre vistas
                  panorámicas, flora y fauna exótica, y sumérgete en la
                  tranquilidad de la naturaleza que desafia tus sentidos al limite.
                </p>
              </div>
            </div>
            <br /><br />
          </div>

          <div class="col-md-4">
            <div class="card">
              <img
                src="./img/s_cabalgata.jpg"
                class="card-img-top"
                alt="Cabalgata"
              />
              <div class="card-body">
                <h3 class="card-title">Cabalgata</h3>
                <p class="card-text text-justify">
                  Embárcate en una emocionante aventura a caballo y explora los
                  hermosos paisajes circundantes. Nuestras cabalgatas son
                  guiadas por expertos y ofrecen una experiencia para
                  conectarte con la naturaleza y la libertad en
                  movimiento.
                </p>
              </div>
            </div>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div class="card">
              <img src="./img/s_spa.jpg" class="card-img-top" alt="Spa" />
              <div class="card-body">
                <h3 class="card-title">Spa y Relajación</h3>
                <p class="card-text text-justify">
                  Relájate y rejuvenece en nuestro exclusivo spa. Disfruta de
                  una variedad de tratamientos y terapias relajantes, desde
                  masajes y faciales hasta baños de vapor y jacuzzis. Permítete
                  consentirte y recargar energías en un entorno sereno y
                  tranquilo.
                </p>
              </div>
            </div>
            <br /><br />
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <img
                src="./img/s_excursiones.jpg"
                class="card-img-top"
                alt="Excursiones"
                data-aos="fade-up-left"
              />
              <div class="card-body">
                <h3 class="card-title">Excursiones</h3>
                <p class="card-text text-justify">
                  Embárcate en emocionantes excursiones guiadas para descubrir
                  los tesoros ocultos de la región. Nuestros guías te
                  llevarán a lugares impresionantes, como cascadas, miradores
                  panorámicos y sitios históricos. Disfruta de la aventura y
                  aprende sobre la historia mientras exploras
                  lugares fascinantes.
                </p>
              </div>
            </div>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div class="card">
              <img
                src="./img/s_gastronomico.jpg"
                class="card-img-top"
                alt="Gastronomía"
                data-aos="fade-up-left"
              />
              <div class="card-body">
                <h3 class="card-title">Exp. Gastronómica</h3>
                <p class="card-text text-justify">
                  Sumérgete en una experiencia culinaria única en nuestro
                  restaurante gourmet. Nuestro talentoso equipo de chefs utiliza
                  ingredientes frescos y locales para crear platos exquisitos
                  que deleitarán tu paladar. Disfruta de una fusión de sabores,
                  texturas y presentaciones en un ambiente elegante y acogedor.
                </p>
              </div>
            </div>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div class="card">
              <img
                src="./img/p_aventura.jpg"
                class="card-img-top"
                alt="Aventura"
                data-aos="fade-up-left"
              />
              <div class="card-body">
                <h3 class="card-title">Aventura Extrema</h3>
                <p class="card-text text-justify">
                  Si buscas emociones fuertes, nuestros paquetes de aventura
                  extrema son para ti. Desde recorridos en tirolesa y escalada
                  en roca hasta descensos en rápidos y paracaidismo, te
                  ofrecemos la oportunidad de desafiar tus límites y vivir
                  experiencias inolvidables llenas de adrenalina.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Sección Planes -->
    <!-- Sección "Planes" -->
    <section id="planes">
      <div class="container">
        <h2>Planes</h2>
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <img
                src="./img/p_aventura.jpg"
                class="card-img-top"
                alt="Plan Aventura"
              />
              <div class="card-body">
                <h3 class="card-title">Plan Aventura</h3>
                <p class="card-text text-justify">
                  Disfruta de una emocionante aventura con nuestro Plan
                  Aventura. Incluye una jornada de caminatas, una cabalgata a
                  través de los paisajes más impresionantes y una experiencia de
                  tirolesa llena de adrenalina. ¡Vive la naturaleza al máximo!
                </p>
                <p class="card-text">Servicios incluidos:</p>
                <ul class="card-text">
                  <li>Caminatas</li>
                  <li>Cabalgata</li>
                  <li>Aventura en extrema</li>
                </ul>
              </div>
            </div>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div class="card">
              <img
                src="./img/p_romantico.jpg"
                class="card-img-top"
                alt="Plan Romántico"
              />
              <div class="card-body">
                <h3 class="card-title">Plan Romántico</h3>
                <p class="card-text text-justify">
                  Sorprende a tu pareja con nuestro Plan Romántico. Incluye una
                  cena gourmet bajo las estrellas, un masaje relajante en pareja
                  y una noche en uno de nuestros exclusivos domos. Celebra el
                  amor en un entorno único y mágico.
                </p>
                <p class="card-text">Servicios incluidos:</p>
                <ul class="card-text">
                  <li>Cena gourmet</li>
                  <li>Masaje en pareja</li>
                  <li>Noche en un domo exclusivo</li>
                </ul>
              </div>
            </div>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div class="card">
              <img
                src="./img/p_familiar.jpg"
                class="card-img-top"
                alt="Plan Familia"
              />
              <div class="card-body">
                <h3 class="card-title">Plan Familia</h3>
                <p class="card-text text-justify">
                  Comparte momentos inolvidables en familia con nuestro Plan
                  Familia. Incluye actividades para todas las edades,
                  como paseos en bicicleta, juegos al aire libre y una fogata
                  nocturna con cuentos. ¡Crea recuerdos para toda
                  la vida!
                </p>
                <p class="card-text">Servicios incluidos:</p>
                <ul class="card-text">
                  <li>Paseos en bicicleta</li>
                  <li>Juegos al aire libre</li>
                  <li>Fogata nocturna con cuentos</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Agrega aquí más planes con los servicios correspondientes -->
        </div>
      </div>
    </section>

    <br /><br />
    <!-- Sección "Formulario de Contacto" -->
    <section id="contacto">
      <div class="container">
        <h2>Contactenos</h2>
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <form>
              <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input
                  type="text"
                  class="form-control"
                  id="nombre"
                  placeholder="Ingrese su nombre"
                  required
                />
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  placeholder="Ingrese su email"
                  required
                />
              </div>
              <div class="form-group">
                <label for="mensaje">Mensaje:</label>
                <textarea
                  class="form-control"
                  id="mensaje"
                  rows="5"
                  placeholder="Ingrese su mensaje"
                  required
                ></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <br /><br />
    <!-- Botón para ir a la app de reservas -->
    
  

    <div class="container">
      <div class="row">
        <div class="col-md-4 text-left">
          <a href="https://wa.me/573042501848/?text=hola%20quiero%20reservar" target="_blank">
            <img src="./img/logowpp.png" width="87" height="72">
         </a>
         <br><br><br>
          <p>Correo: dreamsglamping2023@gmail.com</p>
          <p>Todos los derechos reservados ©2023 Lotus Glamping.</p>
        
        </div>

        <div class="col-md-4 text-center">
           <h3>POLÍTICAS</h3>
          <p>Política de tratamiento de datos</p>
          <p>Cookies</p>
          <p>PQRS</p>
          <p>Políticas de devolución</p>
        
        </div>

           <div class="col-md-4 text-center text-justify" >
            
          <h3>UBICACIÓN</h3>
          <img src="img/ubicacion.png" width="300" height="130" >
        
        </div>
        
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>
