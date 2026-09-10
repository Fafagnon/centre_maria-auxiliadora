@extends('layouts.app')

@section('title', 'CFTP-MA — Centre de Formation Technique et Professionnelle Maria Auxiliadora | Lomé')
@section('meta_description', 'Le CFTP-MA forme depuis 1989 les jeunes de 16 à 25 ans à Lomé aux métiers techniques : électricité, construction métallique, informatique, esthétique et plus. Diplômes CAP et BT reconnus par l\'État.')

@section('content')
  <!-- ============ HERO ============ -->
  <section class="hero">
    <div class="wrap">
      <div class="hero-text">
        <span class="kicker">Centre de formation technique et professionnelle</span>
        <h1>Apprendre un métier,<br>construire son avenir</h1>
        <p class="lead">Depuis 1989, le CFTP-MA forme à Lomé les jeunes de 16 à 25 ans aux métiers techniques et tertiaires, avec des diplômes d'État reconnus et un encadrement issu de la tradition salésienne.</p>
        <div class="hero-ctas">
          <a class="btn btn-primary" href="https://wa.me/22893007790?text=Bonjour%2C%20je%20souhaite%20candidater%20au%20CFTP-MA" target="_blank" rel="noopener">Candidater maintenant</a>
          <a class="btn btn-outline" href="#formations">Découvrir nos formations</a>
        </div>
      </div>
      <div class="hero-figure">
        <div class="img-frame radius-a">
          <span class="img-frame__label">Photo à ajouter<br><code>images/hero-apprenants.jpg</code></span>
          <img src="{{ asset('images/hero-apprenants.jpg') }}" alt="Apprenants du CFTP-MA en atelier" fetchpriority="high" decoding="async" onerror="this.style.display='none'">
        </div>
      </div>
    </div>
  </section>

  <!-- ============ NOTRE HISTOIRE ============ -->
  <section class="section">
    <div class="wrap histoire-grid reveal">
      <div class="histoire-figure">
        <div class="img-frame radius-b">
          <span class="img-frame__label">Photo à ajouter<br><code>images/histoire-atelier.jpg</code></span>
          <img src="{{ asset('images/histoire-atelier.jpg') }}" alt="Atelier de formation au CFTP-MA" loading="lazy" decoding="async" onerror="this.style.display='none'">
        </div>
      </div>
      <div class="histoire-text">
        <span class="kicker">Notre histoire</span>
        <h2 class="section-title">Un centre né de l'engagement <span class="accent-word">salésien</span></h2>
        <p>Le CFTP-MA voit le jour le 19 septembre 1989 à Akodésséwa, sous le nom de Centre d'Apprentissage Maria Auxiliadora. Sa création s'inscrit dans l'action des Salésiens de Don Bosco au Togo, avec l'appui de la coopération allemande.</p>
        <p>Depuis, le centre accompagne chaque année des jeunes de 16 à 25 ans dans une formation exigeante et concrète, fondée sur la pratique en atelier, la discipline et le respect de la personne — des valeurs qui restent au cœur de notre pédagogie aujourd'hui.</p>
      </div>
    </div>
  </section>

  <!-- ============ POURQUOI NOUS ============ -->
  <section class="section dark">
    <div class="wrap">
      <div class="section-head reveal">
        <span class="kicker on-dark">Pourquoi le CFTP-MA</span>
        <h2 class="section-title">Une formation pratique, reconnue par l'État</h2>
      </div>
      <div class="stats-grid reveal">
        <div class="stat"><span class="num">1500+</span><span class="lbl">Jeunes formés depuis 1989</span></div>
        <div class="stat"><span class="num">1200+</span><span class="lbl">Diplômés en emploi</span></div>
        <div class="stat"><span class="num">50+</span><span class="lbl">Entreprises partenaires</span></div>
        <div class="stat"><span class="num">6</span><span class="lbl">Filières certifiantes</span></div>
        <div class="stat"><span class="num">–</span><span class="lbl">Reconnu par l'État et le secteur</span></div>
      </div>
      <p class="stats-note">Chiffres provisoires à titre d'exemple de mise en page — à remplacer par les données réelles du centre.</p>
    </div>
  </section>

  <!-- ============ FORMATIONS ============ -->
  <section class="section cream" id="formations">
    <div class="wrap">
      <div class="section-head reveal">
        <span class="kicker">Nos formations</span>
        <h2 class="section-title">Parcours de formation au CFTP-MA</h2>
      </div>

      <div class="cycle-toggle reveal reveal-delay-1" role="tablist" aria-label="Cycle de formation">
        <button class="toggle-btn is-active" data-cycle="long" role="tab" aria-selected="true">Cycle long</button>
        <button class="toggle-btn" data-cycle="court" role="tab" aria-selected="false">Cycle court</button>
      </div>

      <!-- Cycle long : tabs -->
      <div class="filiere-nav reveal reveal-delay-2" data-cycle-group="long">
        <div class="filiere-track">
          <button class="filiere-tab is-active" data-target="p-elec-equip">Électricité d'équipement</button>
          <button class="filiere-tab" data-target="p-construction">Construction métallique</button>
          <button class="filiere-tab" data-target="p-electrotechnique">Électrotechnique</button>
          <button class="filiere-tab" data-target="p-maintenance">Maintenance informatique et réseau</button>
        </div>
        <div class="filiere-indicator"></div>
      </div>

      <!-- Cycle court : tabs -->
      <div class="filiere-nav reveal reveal-delay-2" data-cycle-group="court" hidden>
        <div class="filiere-track">
          <button class="filiere-tab is-active" data-target="p-esthetique">Esthétique</button>
          <button class="filiere-tab" data-target="p-decoration">Décoration d'intérieur</button>
          <button class="filiere-tab" data-target="p-secretariat">Secrétariat bureautique</button>
          <button class="filiere-tab" data-target="p-informatique">Initiation à l'informatique</button>
        </div>
        <div class="filiere-indicator"></div>
      </div>

      <!-- Cycle long : panels -->
      <div class="filiere-panels reveal reveal-delay-3" data-cycle-group="long">
        <article class="filiere-panel is-active" id="p-elec-equip">
          <div class="img-frame radius-c">
            <span class="img-frame__label">Photo à ajouter<br><code>images/filiere-elec-equip.jpg</code></span>
            <img src="{{ asset('images/filiere-elec-equip.jpg') }}" alt="Filière Électricité d'équipement" loading="lazy" decoding="async" onerror="this.style.display='none'">
          </div>
          <div>
            <div class="filiere-meta"><span class="tag">CAP</span><span class="tag">3 ans + stage</span></div>
            <h3>Électricité d'équipement</h3>
            <p>Installation, câblage et maintenance des équipements électriques domestiques et industriels. La formation associe cours théoriques et longues heures d'atelier, suivies de trois mois de stage en entreprise.</p>
          </div>
        </article>

        <article class="filiere-panel" id="p-construction">
          <div class="img-frame radius-c">
            <span class="img-frame__label">Photo à ajouter<br><code>images/filiere-construction.jpg</code></span>
            <img src="{{ asset('images/filiere-construction.jpg') }}" alt="Filière Construction métallique" loading="lazy" decoding="async" onerror="this.style.display='none'">
          </div>
          <div>
            <div class="filiere-meta"><span class="tag">CAP</span><span class="tag">3 ans + stage</span></div>
            <h3>Construction métallique</h3>
            <p>Chaudronnerie, soudure et fabrication d'ouvrages métalliques, de la lecture de plan à la réalisation. Un métier de précision, très demandé dans le bâtiment et l'industrie locale.</p>
          </div>
        </article>

        <article class="filiere-panel" id="p-electrotechnique">
          <div class="img-frame radius-c">
            <span class="img-frame__label">Photo à ajouter<br><code>images/filiere-electrotechnique.jpg</code></span>
            <img src="{{ asset('images/filiere-electrotechnique.jpg') }}" alt="Filière Électrotechnique" loading="lazy" decoding="async" onerror="this.style.display='none'">
          </div>
          <div>
            <div class="filiere-meta"><span class="tag">BT</span><span class="tag">3 ans + stage</span></div>
            <h3>Électrotechnique (électricité industrielle)</h3>
            <p>Une formation de niveau technicien centrée sur les installations électriques industrielles : distribution, automatismes simples et maintenance des équipements de production.</p>
          </div>
        </article>

        <article class="filiere-panel" id="p-maintenance">
          <div class="img-frame radius-c">
            <span class="img-frame__label">Photo à ajouter<br><code>images/filiere-maintenance.jpg</code></span>
            <img src="{{ asset('images/filiere-maintenance.jpg') }}" alt="Filière Maintenance informatique et réseau" loading="lazy" decoding="async" onerror="this.style.display='none'">
          </div>
          <div>
            <div class="filiere-meta"><span class="tag">BT</span><span class="tag">3 ans + stage</span></div>
            <h3>Maintenance informatique et réseau</h3>
            <p>Installation et dépannage de matériel informatique, bases des réseaux et de la maintenance système — des compétences directement utiles dans les entreprises comme en indépendant.</p>
          </div>
        </article>
      </div>

      <!-- Cycle court : panels -->
      <div class="filiere-panels reveal reveal-delay-3" data-cycle-group="court" hidden>
        <article class="filiere-panel is-active" id="p-esthetique">
          <div class="img-frame radius-c">
            <span class="img-frame__label">Photo à ajouter<br><code>images/filiere-esthetique.jpg</code></span>
            <img src="{{ asset('images/filiere-esthetique.jpg') }}" alt="Filière Esthétique" loading="lazy" decoding="async" onerror="this.style.display='none'">
          </div>
          <div>
            <div class="filiere-meta"><span class="tag">Modulaire</span><span class="tag">6 mois + stage</span></div>
            <h3>Esthétique</h3>
            <p>Soins du visage et du corps, techniques de base de la coiffure et du maquillage : une formation courte pour démarrer rapidement une activité dans un secteur en croissance à Lomé.</p>
          </div>
        </article>

        <article class="filiere-panel" id="p-decoration">
          <div class="img-frame radius-c">
            <span class="img-frame__label">Photo à ajouter<br><code>images/filiere-decoration.jpg</code></span>
            <img src="{{ asset('images/filiere-decoration.jpg') }}" alt="Filière Décoration d'intérieur" loading="lazy" decoding="async" onerror="this.style.display='none'">
          </div>
          <div>
            <div class="filiere-meta"><span class="tag">Modulaire</span><span class="tag">6 mois + stage</span></div>
            <h3>Décoration d'intérieur</h3>
            <p>Principes d'agencement, de couleurs et de finitions pour concevoir des espaces intérieurs soignés — une base solide pour travailler auprès de particuliers ou d'entreprises.</p>
          </div>
        </article>

        <article class="filiere-panel" id="p-secretariat">
          <div class="img-frame radius-c">
            <span class="img-frame__label">Photo à ajouter<br><code>images/filiere-secretariat.jpg</code></span>
            <img src="{{ asset('images/filiere-secretariat.jpg') }}" alt="Filière Secrétariat bureautique" loading="lazy" decoding="async" onerror="this.style.display='none'">
          </div>
          <div>
            <div class="filiere-meta"><span class="tag">Modulaire</span><span class="tag">6 mois + stage</span></div>
            <h3>Secrétariat bureautique</h3>
            <p>Traitement de texte, gestion de documents, accueil et organisation administrative : les compétences de base recherchées dans tout bureau, quel que soit le secteur.</p>
          </div>
        </article>

        <article class="filiere-panel" id="p-informatique">
          <div class="img-frame radius-c">
            <span class="img-frame__label">Photo à ajouter<br><code>images/filiere-informatique.jpg</code></span>
            <img src="{{ asset('images/filiere-informatique.jpg') }}" alt="Filière Initiation à l'informatique" loading="lazy" decoding="async" onerror="this.style.display='none'">
          </div>
          <div>
            <div class="filiere-meta"><span class="tag">Modulaire</span><span class="tag">6 mois + stage</span></div>
            <h3>Initiation à l'informatique</h3>
            <p>Prise en main de l'ordinateur, outils bureautiques et usages numériques courants — une porte d'entrée vers les autres formations techniques du centre.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ============ PARTENAIRES ============ -->
  <section class="section">
    <div class="wrap">
      <div class="section-head reveal">
        <span class="kicker">Nos partenaires</span>
        <h2 class="section-title">Ils accompagnent le CFTP-MA</h2>
      </div>
      <div class="partners-row reveal reveal-delay-1">
        <div class="partner-slot"><div class="img-frame"><span class="img-frame__label">Logo à ajouter<br><code>images/partenaire-1.png</code></span><img src="{{ asset('images/partenaire-1.png') }}" alt="Partenaire du CFTP-MA" loading="lazy" decoding="async" onerror="this.style.display='none'"></div></div>
        <div class="partner-slot"><div class="img-frame"><span class="img-frame__label">Logo à ajouter<br><code>images/partenaire-2.png</code></span><img src="{{ asset('images/partenaire-2.png') }}" alt="Partenaire du CFTP-MA" loading="lazy" decoding="async" onerror="this.style.display='none'"></div></div>
        <div class="partner-slot"><div class="img-frame"><span class="img-frame__label">Logo à ajouter<br><code>images/partenaire-3.png</code></span><img src="{{ asset('images/partenaire-3.png') }}" alt="Partenaire du CFTP-MA" loading="lazy" decoding="async" onerror="this.style.display='none'"></div></div>
        <div class="partner-slot"><div class="img-frame"><span class="img-frame__label">Logo à ajouter<br><code>images/partenaire-4.png</code></span><img src="{{ asset('images/partenaire-4.png') }}" alt="Partenaire du CFTP-MA" loading="lazy" decoding="async" onerror="this.style.display='none'"></div></div>
        <div class="partner-slot"><div class="img-frame"><span class="img-frame__label">Logo à ajouter<br><code>images/partenaire-5.png</code></span><img src="{{ asset('images/partenaire-5.png') }}" alt="Partenaire du CFTP-MA" loading="lazy" decoding="async" onerror="this.style.display='none'"></div></div>
        <div class="partner-slot"><div class="img-frame"><span class="img-frame__label">Logo à ajouter<br><code>images/partenaire-6.png</code></span><img src="{{ asset('images/partenaire-6.png') }}" alt="Partenaire du CFTP-MA" loading="lazy" decoding="async" onerror="this.style.display='none'"></div></div>
      </div>
    </div>
  </section>

  <!-- ============ ENSEMBLE (arc + CTA) ============ -->
  <section class="section dark ensemble">
    <div class="wrap">
      <div class="arc reveal">
        <div class="arc-item"><div class="img-frame"><img src="{{ asset('images/ensemble-1.jpg') }}" alt="" loading="lazy" decoding="async" onerror="this.style.display='none'"></div></div>
        <div class="arc-item"><div class="img-frame"><img src="{{ asset('images/ensemble-2.jpg') }}" alt="" loading="lazy" decoding="async" onerror="this.style.display='none'"></div></div>
        <div class="arc-item"><div class="img-frame"><img src="{{ asset('images/ensemble-3.jpg') }}" alt="" loading="lazy" decoding="async" onerror="this.style.display='none'"></div></div>
        <div class="arc-item"><div class="img-frame"><img src="{{ asset('images/ensemble-4.jpg') }}" alt="" loading="lazy" decoding="async" onerror="this.style.display='none'"></div></div>
        <div class="arc-item"><div class="img-frame"><img src="{{ asset('images/ensemble-5.jpg') }}" alt="" loading="lazy" decoding="async" onerror="this.style.display='none'"></div></div>
        <div class="arc-item"><div class="img-frame"><img src="{{ asset('images/ensemble-6.jpg') }}" alt="" loading="lazy" decoding="async" onerror="this.style.display='none'"></div></div>
        <div class="arc-item"><div class="img-frame"><img src="{{ asset('images/ensemble-7.jpg') }}" alt="" loading="lazy" decoding="async" onerror="this.style.display='none'"></div></div>
      </div>
      <div class="ensemble-content reveal reveal-delay-2">
        <h2>Construisons ensemble l'avenir de nos jeunes</h2>
        <p>Parents, entreprises, formateurs : la réussite d'un apprenant se construit à plusieurs. Rejoignez une formation qui prépare concrètement à l'emploi.</p>
        <a class="btn btn-gold" href="https://wa.me/22893007790?text=Bonjour%2C%20je%20souhaite%20candidater%20au%20CFTP-MA" target="_blank" rel="noopener">Candidater maintenant</a>
      </div>
    </div>
  </section>

  <!-- ============ ACTUALITÉS DYNAMIQUES ============ -->
  @if($latestArticles->count() > 0)
  <section class="section cream">
    <div class="wrap">
      <div class="section-head reveal">
        <span class="kicker">Actualités</span>
        <h2 class="section-title">Ce qui se passe au centre</h2>
      </div>
      <div class="news-grid reveal reveal-delay-1">
        @foreach($latestArticles as $article)
        <article class="news-card">
          <div class="img-frame radius-c">
            <span class="img-frame__label">Photo à ajouter<br><code>{{ $article->cover_image ? 'storage/'.$article->cover_image : 'articles/'.$article->slug.'.jpg' }}</code></span>
            @if($article->cover_image_url)
              <img src="{{ $article->cover_image_url }}" alt="{{ $article->title }}" loading="lazy" decoding="async" onerror="this.style.display='none'">
            @endif
          </div>
          <span class="news-date">{{ $article->published_at ? $article->published_at->translatedFormat('d F Y') : 'Date à préciser' }}</span>
          <h3>{{ $article->title }}</h3>
          <p>{{ $article->excerpt ?? Str::limit(strip_tags($article->body), 120) }}</p>
          <a class="read-more" href="{{ route('articles.show', $article->slug) }}">Lire la suite</a>
        </article>
        @endforeach
      </div>
    </div>
  </section>
  @endif
@endsection

@push('scripts')
<script>
(function(){
  // filiere tabs + sliding indicator, per cycle group
  function setupGroup(cycle){
    var nav = document.querySelector('.filiere-nav[data-cycle-group="'+cycle+'"]');
    var panels = document.querySelector('.filiere-panels[data-cycle-group="'+cycle+'"]');
    if(!nav || !panels) return;
    var tabs = nav.querySelectorAll('.filiere-tab');
    var indicator = nav.querySelector('.filiere-indicator');

    function moveIndicator(tab){
      if(!tab || !indicator) return;
      indicator.style.width = tab.offsetWidth + 'px';
      indicator.style.transform = 'translateX(' + tab.offsetLeft + 'px)';
    }

    tabs.forEach(function(tab){
      tab.addEventListener('click', function(){
        tabs.forEach(function(t){ t.classList.remove('is-active'); });
        tab.classList.add('is-active');
        moveIndicator(tab);

        var targetId = tab.getAttribute('data-target');
        panels.querySelectorAll('.filiere-panel').forEach(function(p){
          p.classList.toggle('is-active', p.id === targetId);
        });
      });
    });

    // expose for later resize / activation
    nav._moveIndicatorToActive = function(){
      var active = nav.querySelector('.filiere-tab.is-active') || tabs[0];
      if(active) moveIndicator(active);
    };
    nav._moveIndicatorToActive();
  }

  setupGroup('long');
  setupGroup('court');

  // cycle toggle
  var cycleButtons = document.querySelectorAll('.toggle-btn');
  cycleButtons.forEach(function(btn){
    btn.addEventListener('click', function(){
      var cycle = btn.getAttribute('data-cycle');
      cycleButtons.forEach(function(b){
        b.classList.toggle('is-active', b === btn);
        b.setAttribute('aria-selected', b === btn ? 'true' : 'false');
      });
      document.querySelectorAll('.filiere-nav').forEach(function(nav){
        var isTarget = nav.getAttribute('data-cycle-group') === cycle;
        nav.hidden = !isTarget;
        if(isTarget && nav._moveIndicatorToActive) nav._moveIndicatorToActive();
      });
      document.querySelectorAll('.filiere-panels').forEach(function(p){
        p.hidden = p.getAttribute('data-cycle-group') !== cycle;
      });
    });
  });

  window.addEventListener('resize', function(){
    document.querySelectorAll('.filiere-nav').forEach(function(nav){
      if(!nav.hidden && nav._moveIndicatorToActive) nav._moveIndicatorToActive();
    });
  });
})();
</script>
@endpush
