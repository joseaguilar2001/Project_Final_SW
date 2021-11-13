<section class="hero is-link is-large is-large-with-navbar has-text-centered">
    <div class="hero-body">
            <h1 class="title">
                ¡Bienvenido!
            </h1>
            <h2 class="subtitle">
                ¡Esperamos que tengas un buen día!
            </h2>
    </div>
</section>
<section class="info-tiles">
    <div class="tile is-ancestor has-text-centered">
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title"><?php echo $area; ?></p>
                <p class="subtitle">Areas</p>
            </article>
        </div>
    </div>
</section>
<div class="box has-text-centered">
        <h1 class="title"> Áreas </h1>
        <p>
            En está parte encontrará las diferentes áreas que se trabajan en la empresa, aquí es para que usted puede tener un excelente descripción de que se trata cadea una.
        </p>
    </div>
    <div id="app" class="row columns is-multiline">
    <?php foreach($consult as $c): ?>
    
          <div v-for="card in cardData" key="card.id" class="column is-4">
            <div class="card large">
              <div class="card-image">
                <figure class="image is-16by9">
                  <img src="/imagen.jpg" alt="Image">
                </figure>
              </div>
              <div class="card-content">
                <div class="media">
                  <div class="media-content">
                    <p class="title is-4 no-padding"><?php echo $c -> NombreArea; ?></p>

                  </div>
                </div>
                <div class="content">
                  <?php echo $c -> DescAreas; ?>
                  <div class="background-icon"><span class="icon-twitter"></span></div>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach ?>
    </div>