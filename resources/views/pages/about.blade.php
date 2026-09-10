@extends('layouts.app')

@section('title', 'À propos — CFTP-MA | Centre de Formation Technique et Professionnelle Maria Auxiliadora')
@section('meta_description', 'L\'histoire, la mission et les valeurs du CFTP-MA à Lomé : un centre salésien dédié à la formation technique et professionnelle des jeunes depuis 1989.')

@section('content')
  <!-- ============ HERO ============ -->
  <section class="page-hero">
    <div class="wrap">
      <div class="page-hero-text">
        <span class="kicker">À propos</span>
        <h1>Notre engagement pour la jeunesse de Lomé</h1>
        <p class="lead">Le CFTP-MA forme depuis plus de trois décennies des jeunes de 16 à 25 ans aux métiers techniques et tertiaires, dans l'esprit de l'éducation salésienne : rigueur, pratique et accompagnement de chacun.</p>
      </div>
      <div class="page-hero-figure">
        <div class="img-frame radius-a">
          <span class="img-frame__label">Photo à ajouter<br><code>images/about-hero.jpg</code></span>
          <img src="{{ asset('images/about-hero.jpg') }}" alt="Façade ou atelier du CFTP-MA" loading="lazy" onerror="this.style.display='none'">
        </div>
      </div>
    </div>
  </section>

  <!-- ============ HISTOIRE / TIMELINE ============ -->
  <section class="section cream">
    <div class="wrap">
      <div class="section-head">
        <span class="kicker">Notre histoire</span>
        <h2 class="section-title">Trois décennies au service des jeunes</h2>
      </div>
      <div class="timeline">
        <div class="tl-item">
          <div class="tl-year">19 septembre 1989</div>
          <p>Création du Centre d'Apprentissage Maria Auxiliadora (CAMA) à Akodésséwa, à l'initiative des Salésiens de Don Bosco au Togo, avec l'appui de la coopération allemande.</p>
        </div>
        <div class="tl-item">
          <div class="tl-year">Les années suivantes</div>
          <p>Le centre élargit progressivement son offre : aux filières techniques de cycle long s'ajoutent des formations modulaires plus courtes, ouvertes à un public plus large.</p>
        </div>
        <div class="tl-item">
          <div class="tl-year">Aujourd'hui</div>
          <p>Devenu le CFTP-MA, le centre accompagne chaque année de nouveaux apprenants vers un diplôme d'État ou une qualification modulaire, avec un ancrage fort dans le tissu économique local.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ MISSION & VALEURS ============ -->
  <section class="section">
    <div class="wrap">
      <div class="section-head">
        <span class="kicker">Notre mission</span>
        <h2 class="section-title">Ce qui guide notre pédagogie</h2>
      </div>
      <div class="values-grid">
        <div class="value-row">
          <span class="value-idx">01</span>
          <h3>Apprendre en faisant</h3>
          <p>La majorité du temps de formation se passe en atelier. Les gestes techniques s'acquièrent par la pratique répétée, encadrée par des formateurs expérimentés.</p>
        </div>
        <div class="value-row">
          <span class="value-idx">02</span>
          <h3>Accompagner chaque jeune</h3>
          <p>Dans la tradition salésienne, chaque apprenant est suivi individuellement — au-delà du seul geste technique, dans son parcours personnel et professionnel.</p>
        </div>
        <div class="value-row">
          <span class="value-idx">03</span>
          <h3>Exiger la discipline</h3>
          <p>Ponctualité, rigueur et respect du matériel font partie intégrante de la formation, à l'image des attentes du monde du travail.</p>
        </div>
        <div class="value-row">
          <span class="value-idx">04</span>
          <h3>Préparer à l'emploi</h3>
          <p>Chaque filière du cycle long inclut un stage en entreprise, pensé comme un premier pas concret vers l'insertion professionnelle.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ PÉDAGOGIE ============ -->
  <section class="section cream">
    <div class="wrap ped-grid">
      <div class="ped-text">
        <span class="kicker">Notre pédagogie</span>
        <h2 class="section-title">Une formation concrète, encadrée de près</h2>
        <p>Les enseignements théoriques sont directement mis en application dans les ateliers du centre, sur du matériel adapté à chaque filière.</p>
        <p>Les groupes restants volontairement restreints permettent un suivi individuel, dans la continuité de l'approche éducative héritée de Don Bosco : miser sur la confiance et l'accompagnement plutôt que sur la seule sanction.</p>
      </div>
      <div class="ped-figure">
        <div class="img-frame radius-b">
          <span class="img-frame__label">Photo à ajouter<br><code>images/pedagogie-atelier.jpg</code></span>
          <img src="{{ asset('images/pedagogie-atelier.jpg') }}" alt="Formateur et apprenants en atelier" loading="lazy" onerror="this.style.display='none'">
        </div>
      </div>
    </div>
  </section>

  <!-- ============ ÉQUIPE ============ -->
  <section class="section">
    <div class="wrap">
      <div class="section-head">
        <span class="kicker">L'équipe</span>
        <h2 class="section-title">Encadrement pédagogique</h2>
      </div>
      <div class="team-grid">
        <div class="team-card">
          <div class="img-frame"><span class="img-frame__label">Photo à ajouter<br><code>images/equipe-direction.jpg</code></span><img src="{{ asset('images/equipe-direction.jpg') }}" alt="" loading="lazy" onerror="this.style.display='none'"></div>
          <h3>Direction du centre</h3>
          <span class="role">À compléter</span>
        </div>
        <div class="team-card">
          <div class="img-frame"><span class="img-frame__label">Photo à ajouter<br><code>images/equipe-pedagogie.jpg</code></span><img src="{{ asset('images/equipe-pedagogie.jpg') }}" alt="" loading="lazy" onerror="this.style.display='none'"></div>
          <h3>Responsable pédagogique</h3>
          <span class="role">À compléter</span>
        </div>
        <div class="team-card">
          <div class="img-frame"><span class="img-frame__label">Photo à ajouter<br><code>images/equipe-ateliers.jpg</code></span><img src="{{ asset('images/equipe-ateliers.jpg') }}" alt="" loading="lazy" onerror="this.style.display='none'"></div>
          <h3>Chefs d'atelier</h3>
          <span class="role">À compléter</span>
        </div>
        <div class="team-card">
          <div class="img-frame"><span class="img-frame__label">Photo à ajouter<br><code>images/equipe-secretariat.jpg</code></span><img src="{{ asset('images/equipe-secretariat.jpg') }}" alt="" loading="lazy" onerror="this.style.display='none'"></div>
          <h3>Secrétariat</h3>
          <span class="role">À compléter</span>
        </div>
      </div>
      <p class="section-note">Noms, photos et intitulés exacts à fournir — cette grille est prête à recevoir les fiches de l'équipe réelle.</p>
    </div>
  </section>

  <!-- ============ INFRASTRUCTURES ============ -->
  <section class="section cream">
    <div class="wrap">
      <div class="section-head">
        <span class="kicker">Le centre</span>
        <h2 class="section-title">Des ateliers pensés pour la pratique</h2>
      </div>
      <div class="fac-grid">
        <div class="fac-item">
          <div class="img-frame radius-a"><span class="img-frame__label">Photo à ajouter<br><code>images/infra-1.jpg</code></span><img src="{{ asset('images/infra-1.jpg') }}" alt="" loading="lazy" onerror="this.style.display='none'"></div>
        </div>
        <div class="fac-item">
          <div class="img-frame radius-c"><span class="img-frame__label">Photo à ajouter<br><code>images/infra-2.jpg</code></span><img src="{{ asset('images/infra-2.jpg') }}" alt="" loading="lazy" onerror="this.style.display='none'"></div>
        </div>
        <div class="fac-item">
          <div class="img-frame radius-c"><span class="img-frame__label">Photo à ajouter<br><code>images/infra-3.jpg</code></span><img src="{{ asset('images/infra-3.jpg') }}" alt="" loading="lazy" onerror="this.style.display='none'"></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ CTA FINALE ============ -->
  <section class="section dark cta-band">
    <div class="wrap">
      <h2>Envie de rejoindre le CFTP-MA ?</h2>
      <p>Découvrez les conditions d'admission et les étapes pour déposer votre candidature.</p>
      <div class="cta-band-actions">
        <a class="btn btn-gold" href="{{ route('admissions') }}">Voir les admissions</a>
        <a class="btn btn-outline on-dark" href="https://wa.me/22893007790?text=Bonjour%2C%20je%20souhaite%20candidater%20au%20CFTP-MA" target="_blank" rel="noopener">Écrire sur WhatsApp</a>
      </div>
    </div>
  </section>
@endsection
