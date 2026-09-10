@extends('layouts.app')

@section('title', 'Galerie — CFTP-MA | Centre de Formation Technique et Professionnelle Maria Auxiliadora')
@section('meta_description', 'Découvrez la vie au CFTP-MA à Lomé en images : ateliers de formation, vie quotidienne des apprenants, équipements et événements du centre.')

@section('content')
  <!-- ============ HERO ============ -->
  <section class="page-hero">
    <div class="wrap">
      <span class="kicker">Galerie</span>
      <h1>La vie du centre en images</h1>
      <p class="lead">Ateliers, filières, temps forts et quotidien du CFTP-MA — un aperçu du centre à Akodésséwa.</p>
    </div>
  </section>

  <!-- ============ GALERIE ============ -->
  <section class="section">
    <div class="wrap">
      <div class="gal-nav">
        <div class="gal-track" role="tablist" aria-label="Filtrer la galerie">
          <button class="gal-tab is-active" data-filter="all">Tout</button>
          <button class="gal-tab" data-filter="ateliers">Ateliers</button>
          <button class="gal-tab" data-filter="filieres">Filières</button>
          <button class="gal-tab" data-filter="vie">Vie du centre</button>
          <button class="gal-tab" data-filter="evenements">Événements</button>
        </div>
        <div class="gal-indicator"></div>
      </div>

      <div class="gallery-grid" id="galleryGrid">
        @forelse($photos as $photo)
        <figure class="gallery-item {{ $photo->tile_size && $photo->tile_size !== 'normal' ? $photo->tile_size : '' }}" data-category="{{ $photo->category }}" data-caption="{{ $photo->caption }}">
          <span class="gal-tag">
            {{ match($photo->category) {
                'ateliers' => 'Ateliers',
                'filieres' => 'Filières',
                'vie' => 'Vie du centre',
                'evenements' => 'Événements',
                default => ucfirst($photo->category),
            } }}
          </span>
          <div class="img-frame">
            <span class="img-frame__label">Photo à ajouter<br><code>{{ $photo->image_path ? 'storage/'.$photo->image_path : 'gallery/photo-'.$photo->id.'.jpg' }}</code></span>
            @if($photo->image_url)
              <img src="{{ $photo->image_url }}" alt="{{ $photo->caption ?? '' }}" loading="lazy" onerror="this.style.display='none'">
            @endif
          </div>
        </figure>
        @empty
        {{-- If no photos exist in DB at all, the emptyNote will display below --}}
        @endforelse
      </div>

      <p class="empty-note" id="emptyNote" style="{{ $photos->isEmpty() ? 'display:block;' : 'display:none;' }}">Aucune photo dans cette catégorie pour le moment.</p>
    </div>
  </section>

  <!-- ============ CTA FINALE ============ -->
  <section class="section dark cta-band">
    <div class="wrap">
      <h2>Envie de voir le centre de plus près ?</h2>
      <p>Contactez-nous pour organiser une visite ou obtenir plus d'informations sur nos formations.</p>
      <div class="cta-band-actions">
        <a class="btn btn-gold" href="{{ route('contact') }}">Nous contacter</a>
        <a class="btn btn-outline on-dark" href="{{ route('admissions') }}">Voir les admissions</a>
      </div>
    </div>
  </section>

  <!-- ============ LIGHTBOX ============ -->
  <div class="lightbox" id="lightbox" aria-hidden="true">
    <div class="lb-inner">
      <button class="lb-close" id="lbClose" aria-label="Fermer">&times;</button>
      <button class="lb-prev" id="lbPrev" aria-label="Photo précédente">&larr;</button>
      <div class="img-frame lb-frame" id="lbFrame">
        <span class="img-frame__label" id="lbLabel"></span>
      </div>
      <button class="lb-next" id="lbNext" aria-label="Photo suivante">&rarr;</button>
      <p class="lb-caption" id="lbCaption"></p>
    </div>
  </div>
@endsection

@push('scripts')
<script>
(function(){
  /* ---- filter tabs ---- */
  var tabs = document.querySelectorAll('.gal-tab');
  var indicator = document.querySelector('.gal-indicator');
  var items = Array.prototype.slice.call(document.querySelectorAll('.gallery-item'));
  var emptyNote = document.getElementById('emptyNote');

  function moveIndicator(tab){
    if(!tab || !indicator) return;
    indicator.style.width = tab.offsetWidth + 'px';
    indicator.style.transform = 'translateX(' + tab.offsetLeft + 'px)';
  }
  var activeTab = document.querySelector('.gal-tab.is-active');
  if(activeTab) moveIndicator(activeTab);

  function applyFilter(filter){
    var visibleCount = 0;
    items.forEach(function(item){
      var match = filter === 'all' || item.getAttribute('data-category') === filter;
      item.classList.toggle('is-hidden', !match);
      if(match) visibleCount++;
    });
    if(emptyNote){
      emptyNote.style.display = visibleCount === 0 ? 'block' : 'none';
    }
  }

  tabs.forEach(function(tab){
    tab.addEventListener('click', function(){
      tabs.forEach(function(t){ t.classList.remove('is-active'); });
      tab.classList.add('is-active');
      moveIndicator(tab);
      applyFilter(tab.getAttribute('data-filter'));
    });
  });

  window.addEventListener('resize', function(){
    var currentActive = document.querySelector('.gal-tab.is-active');
    if(currentActive) moveIndicator(currentActive);
  });

  /* ---- lightbox ---- */
  var lightbox = document.getElementById('lightbox');
  var lbLabel = document.getElementById('lbLabel');
  var lbCaption = document.getElementById('lbCaption');
  var lbFrame = document.getElementById('lbFrame');
  var currentIndex = 0;
  var catNames = {ateliers:'Ateliers', filieres:'Filières', vie:'Vie du centre', evenements:'Événements'};

  function openLightbox(index){
    if(!items.length) return;
    currentIndex = index;
    var item = items[currentIndex];
    var img = item.querySelector('img');
    var code = item.querySelector('code') ? item.querySelector('code').textContent : '';
    var cat = catNames[item.getAttribute('data-category')] || '';
    var customCaption = item.getAttribute('data-caption');

    var existingImg = lbFrame.querySelector('img');
    if(existingImg) existingImg.remove();
    if(img && img.style.display !== 'none'){
      var clone = document.createElement('img');
      clone.src = img.getAttribute('src');
      clone.alt = img.getAttribute('alt') || '';
      clone.onerror = function(){ this.style.display = 'none'; };
      lbFrame.appendChild(clone);
    }
    lbLabel.innerHTML = 'Photo à ajouter<br><code>' + code + '</code>';
    lbCaption.textContent = customCaption ? customCaption + (cat ? ' (' + cat + ')' : '') : cat;
    lightbox.classList.add('is-open');
    lightbox.setAttribute('aria-hidden', 'false');
  }

  function closeLightbox(){
    lightbox.classList.remove('is-open');
    lightbox.setAttribute('aria-hidden', 'true');
  }

  function showRelative(delta){
    if(!items.length) return;
    var next = (currentIndex + delta + items.length) % items.length;
    openLightbox(next);
  }

  items.forEach(function(item, index){
    item.addEventListener('click', function(){ openLightbox(index); });
  });
  var btnClose = document.getElementById('lbClose');
  var btnPrev = document.getElementById('lbPrev');
  var btnNext = document.getElementById('lbNext');
  if(btnClose) btnClose.addEventListener('click', closeLightbox);
  if(btnPrev) btnPrev.addEventListener('click', function(){ showRelative(-1); });
  if(btnNext) btnNext.addEventListener('click', function(){ showRelative(1); });
  if(lightbox) lightbox.addEventListener('click', function(e){ if(e.target === lightbox) closeLightbox(); });
  document.addEventListener('keydown', function(e){
    if(!lightbox || !lightbox.classList.contains('is-open')) return;
    if(e.key === 'Escape') closeLightbox();
    if(e.key === 'ArrowLeft') showRelative(-1);
    if(e.key === 'ArrowRight') showRelative(1);
  });
})();
</script>
@endpush
